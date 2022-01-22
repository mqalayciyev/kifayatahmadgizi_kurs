@extends('admin.layouts.app')
@section('title', __('admin.Category Manager'))

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="float-left">Ölkələr</h1>
    <div class="float-right">
        <button class="btn btn-success" id="add_data">
            <i class="fa fa-plus"></i> Yeni Ölkə
        </button>
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
                    <div class="">
                        <div class="modal fade" id="form_modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" id="form">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            <h4 class="modal-title">Yeni Ölkə</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>

                                        </div>
                                        <div class="modal-body">
                                            <span id="form_output"></span>
                                            <div class="form-group">
                                                <label for="country_name">Ölkə adı</label> <br>
                                                <input type="text" name="country_name" class="form-control"
                                                    id="country_name" placeholder="Ölkə adı"
                                                    value="{{ old('country_name') }}">
                                                <input type="hidden" name="id" value="" id="id">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="country_name">Ana Səhifədə</label> <br>

                                                <select name="country_view" class="form-control" id="country_view" value="{{ old('country_view') }}">
                                                    <option value="0">Göstərmə</option>
                                                    <option value="1">Göstər</option>
                                                </select>
                                            </div> --}}
                                            <div class="form-group">
                                                <img id="country_image_view" width="100" height="100"><br>
                                                <div>
                                                    <label for="country_image_delete"><input type="checkbox" name="country_image_delete" value="" id="country_image_delete"> Şəkli sil</label>

                                                </div>
                                                <div>
                                                    <label for="country_name">Ölkə şəkli</label> <br>
                                                    <input type="file" name="country_image" value="" id="country_image">
                                                </div>
                                            </div>
                                            <div class="form-group" style="visibility: hidden">
                                                <label for="slug">@lang('admin.Slug')</label> <br>
                                                <input type="text" name="slug" class="form-control" id="slug"
                                                    placeholder="@lang('admin.Slug')" value="{{ old('slug') }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="button_action" id="button_action" value="insert" />
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Ləğv et</button>
                                            <input type="submit"  name="submit" id="action"
                                                class="btn btn-success" value="Saxla" />
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="index_table" class="table table-bordered table-striped table-hover display"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Ölkə</th>
                                    <th></th>
                                    <th>

                                        <button type="button"  title="@lang('admin.Select and Delete')"
                                            name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i
                                                class="fa fa-trash"></i></button>
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
        $(function() {

            $('#index_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.country.index_data') }}',
                columns: [
                    {
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false
                    },
                    {
                        data: 'country_name'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'checkbox',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            $('#add_data').click(function() {
                $('#form_modal').modal('show');
                $('#form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Saxla');
                $('.modal-title').text('Yeni Ölkə');
            });

            $('#form').on('submit', function(event) {
                event.preventDefault();
                var form_data = new FormData($(this)[0]);
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.country.post_data') }}',
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[
                                    count] + '</div>';
                            }
                            $('#form_output').html(error_html).hide().fadeIn('slow');
                        } else {
                            $('#form_output').html(data.success).hide().fadeIn('slow').fadeTo(
                                5000, 0.50);
                            $('#form')[0].reset();
                            $('#action').val('Saxla');
                            $('.modal-title').text('Yeni Ölkə');
                            $('#button_action').val('insert');
                            $('#form_modal').modal('hide');
                            window.location.reload();
                        }
                    }
                });
                // $(document).ajaxStop(function() {
                //
                // });
            });

            $(document).on('click', '.edit', function() {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('admin.country.fetch_data') }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#top_id').val(data.top_id);
                        $('#country_name').val(data.country_name);
                        $('#country_view').val(data.country_view);
                        $('#country_image_view').attr('src', data.country_image_view);
                        $('#slug').val(data.slug);
                        $('#id').val(id);
                        $('#form_modal').modal('show');
                        $('#action').val('Düzəlt');
                        $('.modal-title').text(data.country_name);
                        $('#button_action').val('update');
                    }
                });
            });

            $(document).on('click', '.delete', function() {
                var id = $(this).attr('id');
                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {
                    $.ajax({
                        url: '{{ route('admin.country.delete_data') }}',
                        method: 'GET',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            alert(data);
                            $('#index_table').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

            $(document).on('click', '#bulk_delete', function() {
                var id = [];
                if (confirm('{{ __('admin.Are you sure you want to delete this data?') }}')) {
                    $('.checkbox:checked').each(function() {
                        id.push($(this).val());
                    });
                    if (id.length > 0) {
                        $.ajax({
                            url: '{{ route('admin.country.mass_remove') }}',
                            method: 'GET',
                            data: {
                                id: id
                            },
                            success: function(data) {
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
            $("input[name=name]").change(function() {

                var val = $(this).val();
                $("input[name=slug]").val(val);
            });

        });
    </script>
@endsection
