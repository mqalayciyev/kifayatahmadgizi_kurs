@extends('admin.layouts.app')
@section('title', __('admin.university adminr'))

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="float-left">Universitetlər</h1>
        <div class="float-right">
            <a href="{{ route('admin.university.new') }}" class="btn btn-success">Yeni Univresitet</a>
        </div>
        <div class="clearfix"></div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                @include('common.alert')
                @include('common.errors.validate')
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="index_table" class="table table-bordered table-striped table-hover display"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Universitet</th>
                                <th>Ölkə</th>
                                <th width="125px"></th>
                                <th>
                                    <button type="button" title="Sil" name="bulk_delete"
                                            id="bulk_delete"
                                            class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function () {

            $('#index_table').DataTable({
                // order: [[6, "desc"]],
                processing: true,
                serverSide: true,
                ordering: true,
                paging: true,
                ajax: '{{ route('admin.university.index_data')}}',
                columns: [
                    {data: 'image_name', name: 'university_image.image_name', orderable: false, searchable: false},
                    {data: 'university_name', name: 'university.university_name'},
                    {data: 'country', name: 'country'},
                    {data: 'action', orderable: false, searchable: false},
                    {data: 'checkbox', orderable: false, searchable: false},
                ],

            });

            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {
                    $.ajax({
                        url: '{{ route('admin.university.delete_data') }}',
                        method: 'GET',
                        data: {id: id},
                        success: function (data) {
                            alert(data);
                            $('#index_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            $(document).on('click', '#bulk_delete', function () {
                var id = [];
                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {
                    $('.checkbox:checked').each(function () {
                        id.push($(this).val());
                    });
                    if (id.length > 0) {
                        $.ajax({
                            url: '{{ route('admin.university.mass_remove') }}',
                            method: 'GET',
                            data: {id: id},
                            success: function (data) {
                                alert(data);
                                $('#index_table').DataTable().ajax.reload();
                            }
                        });
                    } else {
                        alert('{{ __('admin.Please select at least one checkbox') }}');
                    }
                } else {
                    return false;
                }
            });

            $("input[name=name]").change(function () {
                var val = $(this).val();
                $("input[name=slug]").val(val);
            });

        });
    </script>
@endsection
