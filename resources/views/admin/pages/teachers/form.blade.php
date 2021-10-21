@extends('admin.layouts.app')
@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form action="{{ route('admin.teachers.save', @$entry->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.teachers.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.teachers') }}" class="btn btn-default">Ləğv et</a>
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
                                                    <a href="{{ route('admin.teachers.delete_image', old('id', $entry['id'])) }}" class="btn btn-danger delete_image" data-id="{{ old('id', $entry['id']) }}"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12 p-2">
                                                <img id="teacher_image" class="rounded-circle" style="width: 130px; height: 130px;" src={{ asset('images/team/' . old('image', $entry['image'])) }} />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="first_name" class="col-sm-3 col-form-label">Ad</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="first_name" id="first-name" class="form-control" value="{{ old('first_name', $entry['first_name']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="last_name" class="col-sm-3 col-form-label">Soyad</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="last_name" id="last-name" class="form-control" value="{{ old('last_name', $entry['last_name']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="department" class="col-sm-3 col-form-label">Şöbə</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $entry['department']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="language" class="col-sm-3 col-form-label">Dil</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="language" id="language" class="form-control" value="{{ old('language', $entry['language']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row form-group">
                                        <label for="summernote" class="col-12 col-form-label">Bilikləri</label>
                                        <div class="col-12">
                                            <textarea name="skills" id="summernote" class="form-control">{{ old('skills', $entry['skills']) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.teachers.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.teachers') }}" class="btn btn-default">Ləğv et</a>
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
        /// Initializing croppie in my image_demo div
        var image_crop = $('#image_demo').croppie({
            viewport: {
                width: 200,
                height: 200,
                type:'square'
            },
            boundary:{
                width: 220,
                height: 220
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

            image_crop.croppie('result', {type: 'blob', format: 'png', quality: 1,}).then(function(blob) {
                formData.append('image', blob);
                console.log(blob)
                if(url){
                     ajaxFormPost(formData, "{{ route('admin.teachers.upload_image') }}");
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
                        $('#teacher_image').attr('src', response['url']);
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
