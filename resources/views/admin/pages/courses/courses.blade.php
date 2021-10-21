@extends('admin.layouts.app')
@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header clearfix">
                  <a href={{ route('admin.courses.new') }} class="btn btn-success float-right">Əlavə et</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="index_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Ad</th>
                      <th>Müddət</th>
                      <th>Qiymət</th>
                      <th>Tələbə sayı</th>
                      <th>Yaradıldı</th>
                      <th  width="70px"></th>
                      <th class="text-center"><button type="button" title="@lang('admin.Select and Delete')" name="bulk_delete"
                        id="bulk_delete"
                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
            </div>
          </div>
      </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(function() {
                $('#index_table').DataTable({
                    order: [
                        [0, "desc"]
                    ],
                    processing: true,
                    serverSide: true,
                    ordering: true,
                    paging: true,
                    ajax: '{{ route('admin.courses.index_data') }}',
                    columns: [{
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                        },
                        {
                            data: 'term'
                        },
                        {
                            data: 'price'
                        },
                        {
                            data: 'student_count'
                        },
                        {
                            data: 'created_at'
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
                    language: {
                        "sEmptyTable": "Cədvəldə heç bir məlumat yoxdur",
                        "sInfo": " _TOTAL_ Nəticədən _START_ - _END_ Arası Nəticələr",
                        "sInfoEmpty": "Nəticə Yoxdur",
                        "sInfoFiltered": "(_MAX_ Nəticə İçindən Tapılanlar)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ",",
                        "sLengthMenu": "Səhifədə _MENU_ Nəticə Göstər",
                        "sLoadingRecords": "Yüklənir...",
                        "sProcessing": "Gözləyin...",
                        "sSearch": "Axtarış:",
                        "sZeroRecords": "Nəticə Tapılmadı",
                        "oPaginate": {
                            "sFirst": "İlk",
                            "sLast": "Axırıncı",
                            "sNext": "Sonraki",
                            "sPrevious": "Öncəki"
                        },
                        "oAria": {
                            "sSortAscending": ": sütunu artma sırası üzərə aktiv etmək",
                            "sSortDescending": ": sütunu azalma sırası üzərə aktiv etmək"
                        }
                    }
                });
                $(document).on('click', '.delete', function() {
                    var id = $(this).attr('id');
                    if (confirm("Bu məlumatı silmək istədiyinizə əminsiniz?")) {
                        $.ajax({
                            url: "{{ route('admin.courses.delete_data') }}",
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
                    if (confirm("Bu məlumatı silmək istədiyinizə əminsiniz?")) {
                        $('.checkbox:checked').each(function() {
                            id.push($(this).val());
                        });
                        if (id.length > 0) {
                            $.ajax({
                                url: "{{ route('admin.courses.mass_remove') }}",
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
                            alert("Zəhmət olmasa ən azı bir təsdiq qutusu seçin");
                        }
                    } else {
                        return false;
                    }
                });

                // BILINMIR
                $("input[name=name]").change(function() {
                    var val = $(this).val();
                    alert(val)
                    $("input[name=slug]").val(val);
                });
            });
  </script>
@endsection

