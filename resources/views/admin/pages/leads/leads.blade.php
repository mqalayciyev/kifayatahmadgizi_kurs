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
                            <a href={{ route('admin.leads.new') }} class="btn btn-success float-right">Əlavə et</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="index_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Ad Soyad</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Yaradıldı</th>
                                        <th></th>
                                        <th class="text-center"><button type="button"
                                                title="@lang('admin.Select and Delete')" name="bulk_delete" id="bulk_delete"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span class="leads-name"></span> - Qeydlər</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form id="add_note" action={{ route('admin.leads.add') }} method="POST">
                            <textarea id="summernote" class="form-control" name="text"></textarea>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row align-items-center">
                                        <label class="col-sm-2 col-from-label">Tarix:</label>
                                        <div class="col-sm-9">
                                            <input type="datetime-local" name="datetime" class="form-control">
                                        </div>
                                        <div class="col p-0">
                                            <i class="fas fa-info-circle text-info" style="font-size: 26px"
                                                data-toggle="tooltip" data-placement="right"
                                                title="Hazırki tarix üçün xananı boş qoyun"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button class="btn btn-primary mb-2" name="add" type="submit"">Əlavə et</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <hr>
                            <div class=" leads_notes"></div>
                            </div>
                    </div>
                </div>
            </div>
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
                        ajax: '{{ route('admin.leads.index_data') }}',
                        columns: [{
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'email'
                            },
                            {
                                data: 'mobile'
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
                                url: "{{ route('admin.leads.delete_data') }}",
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
                                    url: "{{ route('admin.leads.mass_remove') }}",
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
                    $(document).ready(function() {
                        $('#summernote').summernote();
                    });
                    $(function() {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
                    function notes(id) {
                        $.ajax({
                            url: "{{ route('admin.leads.get_notes') }}",
                            method: 'GET',
                            data: {id},
                            success: function(data) {
                                $(".leads_notes").html(data)
                            }
                        });
                    }
                    $(document).on('click', '.notes', function() {
                        let id = $(this).attr('data-id')
                        $("#add_note").attr('data-id', id)
                        notes(id)
                    })
                    $(document).on('click', '.delete_note', function() {
                        let id = $(this).attr('data-id')
                        let leads = $("#add_note").attr('data-id')
                        $.ajax({
                            url: "{{ route('admin.leads.delete_note') }}",
                            method: 'GET',
                            data: {id},
                            success: function(data) {
                                console.log(data)
                                notes(leads)
                            }
                        });
                    })

                    $("#add_note").submit(function(event) {
                        event.preventDefault();
                        let note = $("#summernote").summernote('code')
                        let id = $(this).attr('data-id')
                        let datetime = $('input[name="datetime"]').val()
                        $.ajax({
                            url: "{{ route('admin.leads.add') }}",
                            type: "POST",
                            data: {
                                "_token" : "{{ csrf_token() }}",
                                note,
                                id,
                                datetime
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == 'success'){
                                    notes(id)
                                    $("#summernote").summernote('code', '')
                                }
                                else{
                                    alert('Qeyd əlavə edilmədi')
                                    console.log(data.message)
                                }

                            }
                        });
                    })

                    // BILINMIR
                    $("input[name=name]").change(function() {
                        var val = $(this).val();
                        alert(val)
                        $("input[name=slug]").val(val);
                    });
                });



            </script>
        @endsection
