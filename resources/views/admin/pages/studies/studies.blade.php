@extends('admin.layouts.app')
@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">

          <div class="col-12">

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @include('common.errors.validate_admin')
                            @include('common.alert')
                        </div>
                    </div>

                    <form action="{{ route('admin.studies.save', @$entry->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <h3>English</h3>
                            <div class="col-12" style="max-height: 350px; overflow: auto; ">
                                <textarea id="summernote_en" name="text_en"  class="summernote form-control">{{ old('text_en', $entry['text_en']) }}</textarea>
                            </div>
                            <h3>Azərbaycan</h3>
                            <div class="col-12" style="max-height: 350px; overflow: auto; ">
                                <textarea id="summernote_az" name="text_az"  class="summernote form-control">{{ old('text_az', $entry['text_az']) }}</textarea>
                            </div>
                            <h3>Русский</h3>
                            <div class="col-12" style="max-height: 350px; overflow: auto; ">
                                <textarea id="summernote_ru" name="text_ru"  class="summernote form-control">{{ old('text_ru', $entry['text_ru']) }}</textarea>
                            </div>
                            <div class="col-12 clearfix mt-2">
                                <button type="submit" class="btn btn-success float-right">Saxla</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
      </div>
    </div>
 </section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
