@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card border-0 rounded-0">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-12 text-right">
                                                    <button class="btn btn-success slides" data-type="add" data-id="0"
                                                        type="reset">Yeni</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="homeSlideRows">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="homeSlideModal" tabindex="-1" role="dialog" aria-labelledby="homeSlideModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="slider-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <input type="file" id="cover_image" name="has_image">
                            <input type="hidden" name="id" value="">
                        </div>
                        <div style="width: 100%">
                            <div class="text-center">
                                <div id="image_demo"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary crop_image">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        getSlides()

        function getSlides() {
            $.ajax({
                url: "{{ route('admin.gallery.get_slides') }}",
                type: "GET",
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        $('.homeSlideRows').html(data.output)
                    }
                }
            })
        }

        function modalFunction(modal, action, id) {
            if (action == 'edit') {
                $(modal).find('input[name="id"]').val(id)
                $.ajax({
                    url: "{{ route('admin.gallery.get_slide') }}",
                    method: "GET",
                    data: {
                        id
                    },
                    success: function(data) {
                        console.log(data)
                        $(modal).find('input[name="title_1"]').val(data.title_1)
                        $(modal).find('input[name="title_2"]').val(data.title_2)
                        image_crop.croppie('bind', {
                            url: data.image,
                        });


                    }
                })

                $(modal).modal('show');
            } else {
                $(modal).find('input[name="id"]').val(id)
                $(modal).modal('show');
            }
        }
        $(document).on('click', '.slides', function() {
            let action = $(this).attr('data-type')
            let id = $(this).attr('data-id')
            modalFunction("#homeSlideModal", action, id)

        })

        var image_crop = $('#image_demo').croppie({
            viewport: {
                width: 360,
                height: 207,
                type: 'square'
            },
            boundary: {
                width: 370,
                height: 217,
            }
        });
        /// catching up the cover_image change event and binding the image into my croppie. Then show the modal.
        let url = false;


        $('#cover_image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                image_crop.croppie('bind', {
                    url: event.target.result,
                });
                url = true
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#slider-form').submit(function(event) {
            event.preventDefault()
            let id = $("#homeSlideModal").find('input[name="id"]').val()
            let title_1 = $("#homeSlideModal").find('input[name="title_1"]').val()
            let title_2 = $("#homeSlideModal").find('input[name="title_2"]').val()
            let formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append('id', id);
            formData.append('title_1', title_1);
            formData.append('title_2', title_2);
            formData.append('url', url);


            image_crop.croppie('result', {
                type: 'blob',
                format: 'webp',
                size: "original",
                quality: 1
            }).then(function(blob) {
                if (url) {
                    formData.append('image', blob);
                }
                ajaxFormPost(formData, "{{ route('admin.gallery.save_slide') }}");
            });
        })
        /// Ajax Function
        function ajaxFormPost(formData, actionURL) {
            $.ajax({
                url: actionURL,
                type: 'POST',
                data: formData,
                cache: false,
                async: true,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response)

                    if (response['status'] === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response['message'],
                            timer: 2000
                        })
                        getSlides()
                        $('#homeSlideModal #cover_image').val("");
                        // $('#homeSlideModal #news_image').attr('src', response['url']);
                    } else {
                        let msg = "";
                        let message = response.message;
                        for (const [key, value] of Object.entries(message)) {
                            msg = msg + "<br>" + value
                        }
                        Swal.fire(
                            'Xəta',
                            msg,
                            'error'
                        )
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: msg,
                        //     timer: 2000
                        // })
                        getSlides()
                    }
                }
            });
        }
    </script>
@endsection
