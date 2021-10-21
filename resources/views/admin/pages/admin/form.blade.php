@extends('admin.layouts.app')
@section('content')
<!-- icheck bootstrap -->
<link rel="stylesheet" href={{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form action="{{ route('admin.index.save', @$entry->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.index.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.index') }}" class="btn btn-default">Ləğv et</a>
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
                                    <div class="row from-group">
                                        <label for="first_name" class="col-form-label col-sm-3">Ad</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $entry['first_name']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row from-group">
                                        <label for="last_name" class="col-form-label col-sm-3">Soyad</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $entry['last_name']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="row from-group">
                                        <label for="email" class="col-form-label col-sm-3">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $entry['email']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row from-group">
                                        <label for="mobile" class="col-form-label col-sm-3">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="tel" name="mobile" id="mobile" class="form-control" value="{{ old('mobile', $entry['mobile']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="row from-group">
                                        <label for="password" class="col-form-label col-sm-3">Şifrə <i class="fas fa-info-circle text-info" data-toggle="tooltip" data-placement="right"
                                            title="Şifrəni dəyişmək istəmirsinizsə xananı boş qoyun"></i></label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row from-group">
                                        <div class="icheck-success col-sm-6 px-2">
                                            <input type="checkbox" name="is_active" id="active" {{ ($entry->is_active) ? 'checked' : null }}>
                                            <label for="active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="icheck-primary col-sm-6 px-2">
                                            <input type="checkbox" name="is_manage" id="manage" {{ ($entry->is_manage) ? 'checked' : null }}>
                                            <label for="manage">
                                                Manage
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if($entry->id>0)
                                <a href={{ route('admin.index.new') }} class="btn btn-success" href><i class="fas fa-plus"></i> Yeni</a>
                                <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.index') }}" class="btn btn-default">Ləğv et</a>
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
    $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
</script>
@endsection
