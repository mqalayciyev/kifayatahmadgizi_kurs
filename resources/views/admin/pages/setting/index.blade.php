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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="false">Slaydlar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="level-tab" data-toggle="tab" href="#level" role="tab"
                                        aria-controls="level" aria-selected="true">Səviyyələr</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card border-0 rounded-0">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h4>Slaydlar</h4>
                                                </div>
                                                <div class="col-sm-6 text-right">
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
                                                        <th scope="col">Başlıq 1</th>
                                                        <th scope="col">Başlıq 2</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="homeSlideRows">
                                                    <tr>
                                                        <th scope="row">sekil.jpg</th>
                                                        <td>basliq 1</td>
                                                        <td>basliq 2</td>
                                                        <td><a><span class="badge badge-success">active</span></a></td>
                                                        <td class="text-right">
                                                            <a href="" class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></a>
                                                            <button class="btn btn-warning slides" data-type="edit"
                                                                data-id="1"><i class="fas fa-pencil-alt"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="level" role="tabpanel"
                                    aria-labelledby="level-tab">
                                    <div class="card border-0 rounded-0">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h4>Səviyyələr</h4>
                                                </div>
                                                <div class="col-sm-6 text-right"><button class="btn btn-success"
                                                        type="reset" data-toggle="modal"
                                                        data-target="#levelsModal">Yeni</button></div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($levels as $item)
                                                <div class="row border rounded form-group align-items-center">
                                                    <div class="col-10">
                                                        {{ $item->level }}
                                                    </div>
                                                    <div class="col-2 text-right p-2">
                                                        <a href="{{ route('admin.settings.delete_level', $item->id) }}"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        <button class="btn btn-warning edit_level"
                                                            data-id="{{ $item->id }}"><i
                                                                class="fas fa-pencil-alt"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
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
    <div class="modal fade" id="levelsModal" tabindex="-1" role="dialog" aria-labelledby="levelsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.settings.add_level') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="levelsModalLabel">Yeni level</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-12">
                                <input type="hidden" name="id" value="0">
                                <input type="text" name="level" placeholder="Səviyyə adı" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Ləğv et</button>
                        <button type="submit" class="btn btn-primary">Saxla</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <input type="text" name="title_1" id="" class="form-control" placeholder="Başlıq 1">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="title_2" id="" class="form-control" placeholder="Başlıq 2">
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
        $(document).on('click', '.edit_level', function() {
            let id = $(this).attr('data-id')
            let text = $(this).parents("div.row.border").find('.col-10').text().trim()
            $('#levelsModal').find('#levelsModalLabel').html('Düzəlt')
            $('#levelsModal').find('input[name="id"]').val(id)
            $('#levelsModal').find('input[name="level"]').val(text)
            $('#levelsModal').modal('show');
        })
        $("#level").on('click', '.btn-success', function() {
            $('#levelsModal').find('#levelsModalLabel').html('Yeni level')
            $('#levelsModal').find('input[name="id"]').val('0')
            $('#levelsModal').find('input[name="level"]').val('')
        })
        getSlides()

        function getSlides() {
            $.ajax({
                url: "{{ route('admin.settings.get_slides') }}",
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
                    url: "{{ route('admin.settings.get_slide') }}",
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
                height: 166,
                type: 'square'
            },
            boundary: {
                width: 370,
                height: 176,
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
                ajaxFormPost(formData, "{{ route('admin.settings.save_slide') }}");
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
