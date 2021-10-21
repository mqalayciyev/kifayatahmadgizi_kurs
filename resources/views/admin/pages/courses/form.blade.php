@extends('admin.layouts.app')
@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form action="{{ route('admin.courses.save', @$entry->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.courses.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.courses') }}" class="btn btn-default">Ləğv et</a>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Saxla</button>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @include('common.errors.validate_admin')
                                    @include('common.alert')
                                </div>
                            </div>
                            @if($entry->id>0)
                                <div class="row">
                                    <div class="col-12 p-2">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="row">
                                                    <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i></button>
                                                    <a href="{{ route('admin.courses.delete_image', old('id', $entry['id'])) }}" class="btn btn-danger delete_image" data-id="{{ old('id', $entry['id']) }}"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12 p-2">
                                                <img id="cours_image" style="width: 150px; height: 150px;" src={{ asset('images/courses/' . old('image', $entry['image'])) }} />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="name" class="col-sm-3 col-form-label">Ad</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $entry['name']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="count" class="col-sm-3 col-form-label">Tələbə sayı</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="student_count" id="count" min="0" class="form-control" value="{{ old('student_count', $entry['student_count']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="price" class="col-sm-3 col-form-label">Qiymət</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="price" id="price" min="0" class="form-control" placeholder="AZN" value="{{ old('price', $entry['price']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="term" class="col-sm-3 col-form-label">Müddət</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="term" id="term" class="form-control" placeholder="Nümunə: 3ay, 45gün, 1il" value="{{ old('term', $entry['term']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <label class="col-form-label">Qeyd</label>
                                    <textarea id="summernote" name="note" class="form-control">{{ strip_tags(old('note', $entry['note']), '<a>') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.courses.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.courses') }}" class="btn btn-default">Ləğv et</a>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Saxla</button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
 </section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <label for="cover_image">Şəkil seç</label><br>
                <input type="file" id="cover_image" name="has_image">
                <input type="hidden" name="id" value="{{ old('id', $entry['id']) }}">
            </div>
            <div class="text-center">
                <div id="image_demo"></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Ləğv et</button>
          <button type="button" class="btn btn-primary crop_image">Saxla</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        var image_crop = $('#image_demo').croppie({
            viewport: {
                width: 340,
                height: 340,
                type:'square'
            },
            boundary:{
                width: 350,
                height: 350
            }
        });
        /// catching up the cover_image change event and binding the image into my croppie. Then show the modal.
        let url = 0
        $('#cover_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                image_crop.croppie('bind', {
                    url: event.target.result,
                });
                url = 1
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.crop_image').click(function(event){

            let id = $("#exampleModal").find('input[name="id"]').val()
            let formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append('id', id);

            image_crop.croppie('result', {type: 'blob',format: 'jpg', size : {width: 720, height : 720}, quality: 1,}).then(function(blob) {
                formData.append('image', blob);
                console.log(blob)
                if(url){
                     ajaxFormPost(formData, "{{ route('admin.courses.upload_image') }}");
                }
                else{
                    alert('Şəkil seçilməyib.')
                }

            });
            $('#exampleModal').modal('hide');
        });
        /// Ajax Function
        function ajaxFormPost(formData, actionURL){
            $.ajax({
                url: actionURL,
                type: 'POST',
                data: formData,
                cache: false,
                async: true,
                processData: false,
                contentType: false,
                timeout: 5000,
                success: function(response) {
                    console.log(response)
                    if (response['status'] === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Şəkil yükləndi',
                            timer:2000
                        })
                        $('#cover_image').val("");
                        $('#cours_image').attr('src', response['url']);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Şəkil yüklənmədi!',
                            timer:2000
                        })
                    }
                    url = 0
                }
            });
        }
    })
</script>
@endsection
