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
                            <a href={{ route('admin.tests.new') }} class="btn btn-success float-right">Əlavə et</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="index_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Ad</th>
                                        <th>Müddət</th>
                                        <th>Sual sayı</th>
                                        <th>Səviyyə</th>
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
    <div class="modal fade bd-example-modal-lg" id="addQuestionsModal" tabindex="-1" role="dialog"
        aria-labelledby="addQuestionsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionsModalLabel">Suallar</h5>
                    <button type="reset" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add_question">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Yeni Sual
                        </button>
                    </div>
                    <div class="all_questions">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="addQuestionsForm">
                    <input type="hidden" name="id" value="0">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <textarea id="summernote" name="question" class="form-control" name="text"></textarea>
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <input type="text" name="answer_true" placeholder="Düzgün cavab"
                                            class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="answer_2" placeholder="Cavab 2" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <input type="text" name="answer_3" placeholder="Cavab 3" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="answer_4" placeholder="Cavab 4" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <input type="text" name="answer_5" placeholder="Cavab 5" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Ləğv et</button>
                        <button type="submit" class="btn btn-success add">Əlavə et</button>
                    </div>
                </form>
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
                ajax: '{{ route('admin.tests.index_data') }}',
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
                        data: 'question_count'
                    },
                    {
                        data: 'level',
                        name: 'level'
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
                        url: "{{ route('admin.tests.delete_data') }}",
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
                            url: "{{ route('admin.tests.mass_remove') }}",
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
            $(document).on('click', '.add_questions', function() {
                let id = $(this).attr('data-id')
                all_questions(id)
                $('#addQuestionsModal').find('.add_question .btn-block').attr("data-id", id)
                $('#addQuestionsModal').modal('show')
            })
            $(document).on('click', '.edit_question', function() {
                let id = $(this).attr('data-id')

                $.ajax({
                    url: "{{ route('admin.tests.get_question') }}",
                    type: "GET",
                    data: {id},
                    success: function(data) {
                        console.log(data)
                        if (data.status == 'success') {
                            $('#exampleModalCenter').find('input[name="id"]').val(id)
                            let question = $('#addQuestionsForm').find('#summernote')
                                .summernote('code', data.message.question)
                            let answer_true = $('#addQuestionsForm').find(
                                'input[name="answer_true"]').val(data.message.answer_true)
                            let answer_2 = $('#addQuestionsForm').find('input[name="answer_2"]')
                                .val(data.message.answer_2)
                            let answer_3 = $('#addQuestionsForm').find('input[name="answer_3"]')
                                .val(data.message.answer_3)
                            let answer_4 = $('#addQuestionsForm').find('input[name="answer_4"]')
                                .val(data.message.answer_4)
                            let answer_5 = $('#addQuestionsForm').find('input[name="answer_5"]')
                                .val(data.message.answer_5)
                        }
                    }
                })
                $('#exampleModalCenter').modal('show')
            })
            $(document).on('click', '.delete_question', function() {
                let id = $(this).attr('data-id')

                $.ajax({
                    url: "{{ route('admin.tests.delete_question') }}",
                    type: "GET",
                    data: {id},
                    success: function(data) {
                        console.log(data)
                    }
                })
                let question_id = $('#addQuestionsModal').find('.add_question .btn-block').attr("data-id")
                all_questions(question_id)
            })

            function all_questions(id) {
                $.ajax({
                    url: "{{ route('admin.tests.all_questions') }}",
                    type: "GET",
                    data: {
                        id
                    },
                    success: function(data) {
                        // console.log(data)
                        if (data.status == 'success') {
                            $('#addQuestionsModal').find(".all_questions").html(data.message)
                        }
                    }
                })
            }
            $(".add_question").on('click', '.btn-block', function() {
                $('#exampleModalCenter').find('input[name="id"]').val('0')
                $('#addQuestionsForm').find('#summernote').summernote('code', '')
                $('#addQuestionsForm').find('input[name="answer_true"]').val('')
                $('#addQuestionsForm').find('input[name="answer_2"]').val('')
                $('#addQuestionsForm').find('input[name="answer_3"]').val('')
                $('#addQuestionsForm').find('input[name="answer_4"]').val('')
                $('#addQuestionsForm').find('input[name="answer_5"]').val('')
            })

            $("#addQuestionsForm").submit(function(event) {
                event.preventDefault();
                let id = $('#addQuestionsModal').find('.add_question .btn-block').attr("data-id")
                let question_id = $('#addQuestionsForm').find('input[name="id"]').val()
                let question = $('#addQuestionsForm').find('#summernote').summernote('code')
                let answer_true = $('#addQuestionsForm').find('input[name="answer_true"]').val()
                let answer_2 = $('#addQuestionsForm').find('input[name="answer_2"]').val()
                let answer_3 = $('#addQuestionsForm').find('input[name="answer_3"]').val()
                let answer_4 = $('#addQuestionsForm').find('input[name="answer_4"]').val()
                let answer_5 = $('#addQuestionsForm').find('input[name="answer_5"]').val()
                $.ajax({
                    url: "{{ route('admin.tests.add_question') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id,
                        question_id,
                        question,
                        answer_true,
                        answer_2,
                        answer_3,
                        answer_4,
                        answer_5,
                    },
                    success: function(data) {
                        console.log(data)
                        $('#exampleModalCenter').modal('hide')
                    }
                })
                all_questions(id)
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
