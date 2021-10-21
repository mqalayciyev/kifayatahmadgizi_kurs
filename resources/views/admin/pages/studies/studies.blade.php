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
                            <div class="col-12">
                                <textarea id="summernote" name="text" class="form-control">{{ old('text', $entry['text']) }}</textarea>
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
        $('#summernote').summernote();
    });
</script>
@endsection
