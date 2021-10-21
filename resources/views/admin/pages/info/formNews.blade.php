@extends('admin.layouts.app')
@section('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" />
@endsection
@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form action="{{ route('admin.news.save', @$entry->id) }}" method="POST">
            <input type="hidden" name="image">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.news.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.news') }}" class="btn btn-default">Ləğv et</a>
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
                            @if($image)
                            <div class="row">
                                <div class="col-12 p-2">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="row">
                                                <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i></button>
                                                    
                                                        <a href={{ route('admin.news.delete_image' , [old('id', $entry['id']), old('id', $image['id'])]) }} class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                
                                            </div>
                                        </div>
                                        <div class="col-12 p-2">
                                                <img id="news_image" class="w-100" style="max-width: 600px;" src={{ asset('images/news/' . old('image', $image['image'])) }} />
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="title" class="col-sm-3 col-form-label">Başlıq</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $entry['title']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="text" id="summernote" class="form-control">{{ old('text', $entry['text']) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.news.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.news') }}" class="btn btn-default">Ləğv et</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        var image_crop = $('#image_demo').croppie({
            viewport: {
                width: 450,
                height: 350,
                type:'square'
            },
            boundary:{
                width: 460,
                height: 360
            },
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

            image_crop.croppie('result', {type: 'blob', format: 'jpg', size : {width: 450, height : 350}, quality: 1,}).then(function(blob) {
                formData.append('image', blob);
                if(url){
                     ajaxFormPost(formData, "{{ route('admin.news.upload_image') }}");
                }
                else{
                    alert('Şəkil seçilməyib.')
                }

            });

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
                success: function(response) {
                    console.log(response)
                    if (response['status'] === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Şəkil yükləndi',
                            timer:2000
                        })
                        $('#cover_image').val("");
                        $('#news_image').attr('src', response['url']);
                        $('#exampleModal').modal('hide');
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
