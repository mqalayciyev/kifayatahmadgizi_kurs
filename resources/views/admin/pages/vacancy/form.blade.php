@extends('admin.layouts.app')
@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form action="{{ route('admin.vacancy.save', @$entry->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.vacancy.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.vacancy') }}" class="btn btn-default">Ləğv et</a>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="name" class="col-form-label col-sm-3">Ad</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $entry['name']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <label for="address" class="col-form-label col-sm-3">İş yeri</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="job_address" id="address" class="form-control" value="{{ old('job_address', $entry['job_address']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label for="requirements" class="col-form-label">Tələblər:</label>
                                            <textarea id="summernote1" name="requirements" class="form-control">{{ old('requirements', $entry['requirements']) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label for="information" class="col-form-label">Məlumat:</label>
                                            <textarea id="summernote2" name="information" class="form-control">{{ old('information', $entry['information']) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.vacancy.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.vacancy') }}" class="btn btn-default">Ləğv et</a>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Saxla</button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>
@endsection


@section('script')
<script>
    $(document).ready(function() {
        $('#summernote1').summernote();
    });
    $(document).ready(function() {
        $('#summernote2').summernote();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection
