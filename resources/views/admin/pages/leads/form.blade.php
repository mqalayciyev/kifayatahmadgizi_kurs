@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('common.errors.validate_admin')
                    @include('common.alert')
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <form action="{{ route('admin.leads.save', @$entry->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-right">
                                @if ($entry->id > 0)
                                    <a href={{ route('admin.leads.new') }} class="btn btn-success" href><i
                                            class="fas fa-plus"></i> Yeni</a>
                                    <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i>
                                        Yenilə</button>
                                @else
                                    <a href="{{ route('admin.leads') }}" class="btn btn-default">Ləğv et</a>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Saxla</button>
                                @endif

                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row form-group">
                                            <label for="first_name" class="col-form-label col-sm-3">Ad</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="first-name" id="first-name" class="form-control"
                                                    value="{{ old('first_name', $entry['first_name']) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row form-group">
                                            <label for="last_name" class="col-form-label col-sm-3">Soyad</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="last-name" id="last-name" class="form-control"
                                                    value="{{ old('last_name', $entry['last_name']) }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row form-group">
                                            <label for="email" class="col-form-label col-sm-3">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    value="{{ old('email', $entry->email) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row form-group">
                                            <label for="mobile" class="col-form-label col-sm-3">Mobile</label>
                                            <div class="col-sm-9">
                                                <input type="tel" name="mobile" id="mobile" class="form-control"
                                                    value="{{ old('mobile', $entry->mobile) }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if ($entry->id > 0)
                <form id="add_note" action={{ route('admin.leads.add') }} method="POST" data-id={{ $entry->id }}>
                    <div class=" row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4>Qeydlər</h4>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-primary">Əlavə et</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <input type="hidden" name="id" value={{ $entry->id }}>
                                            <label class="col-form-label">Qeyd yarat:</label>
                                            <textarea id="summernote" class="form-control" name="text"></textarea>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-2 col-from-label">Tarix:</label>
                                                        <div class="col-sm-9">
                                                            <input type="datetime-local" name="datetime"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-1">
                                                            <i class="fas fa-info-circle text-info fa-2x"
                                                                data-toggle="tooltip" data-placement="right"
                                                                title="Hazırki tarix üçün xananı boş qoyun"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="leads_notes">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        notes('{{ $entry->id }}')

        function notes(id) {
            $.ajax({
                url: "{{ route('admin.leads.get_notes') }}",
                method: 'GET',
                data: {
                    id
                },
                success: function(data) {
                    $(".leads_notes").html(data)
                }
            });
        }
        $(document).on('click', '.delete_note', function() {
            let id = $(this).attr('data-id')
            let leads = $("#add_note").attr('data-id')
            $.ajax({
                url: "{{ route('admin.leads.delete_note') }}",
                method: 'GET',
                data: {
                    id
                },
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
                    "_token": "{{ csrf_token() }}",
                    note,
                    id,
                    datetime
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        notes(id)
                        $("#summernote").summernote('code', '')
                    } else {
                        alert('Qeyd əlavə edilmədi')
                        console.log(data.message)
                    }

                }
            });
        })

    </script>
@endsection
