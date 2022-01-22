@extends('admin.layouts.app')
@section('title', __('admin.university adminr'))
@section('head')
    <style>
        .panel{
            margin-top: 25px;
        }
        .images{
            margin: 5px;
            width: max-content;
            border: 1px solid silver;
            padding: 5px;
            border-radius: 5px;
            position: relative;
            float: left;
        }
        .images > img{
            height: 100px;
            width: 100px;
        }
        .images > span{
            font-size: 20px;
            font-weight: bold;
            position: absolute;
            left: -6px;
            top: -13px;
            cursor: pointer;
        }
        .mt-3{
            margin-top: 1rem;
        }
        .images:hover::before{
            content: " ";
            width: 110px;
            height: 110px;
            border-radius: 5px;
            position: absolute;
            top: 0px;
            left: 0px;
            background-color: white;
            opacity: 0.7;
        }
        .cover{
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 110px;
            height: 25px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            background-color: silver;
            text-align: center;
            padding: 5px;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            card-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
@endsection
@section('content')

    <form id="university-form" action="{{ route('admin.university.save', @$entry->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <section class="content-header">
            <h1 class="float-left">{{ old('university_name', $entry->university_name) }}</h1>
            <div class="float-right">
                @if($entry->id>0)
                    <a href="{{ route('admin.university.new') }}"
                       class="btn btn-success"> Yeni Universitet</a>
                    <button type="submit"  class="btn btn-info"><i
                                class="fa fa-refresh"></i>Yenilə</button>
                @else
                    <a href="{{ route('admin.university') }}"
                       class="btn btn-default"> Ləğv et</a>
                    <button type="submit"  class="btn btn-success"><i
                                class="fa fa-plus"></i> Saxla</button>
                @endif
            </div>
            <div class="clearfix"></div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-body card-primary">
                        @include('common.errors.validate_admin')
                        @include('common.alert')
                        <div class="container">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="university_name">Universitet adı</label>
                                                    <input type="text" class="form-control" id="university_name"
                                                           placeholder="Universitet adı"
                                                           name="university_name"
                                                           value="{{ old('university_name', $entry->university_name) }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="visibility: hidden">
                                                <div class="form-group">
                                                    <label for="slug">@lang('admin.Slug')</label>
                                                    <input type="hidden" name="original_slug"
                                                           value="{{ old('slug', $entry->slug) }}">
                                                    <input type="text" class="form-control" id="slug"
                                                           placeholder="@lang('admin.Slug')"
                                                           name="slug"
                                                           value="{{ old('slug', $entry->slug) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="meta-view" class="panel panel-default" style="border-radius: 0px;">
                                            <div class="panel-body">
                                                <p class="title" style="margin: 0; color: blue;"></p>
                                                <p class="url" style="word-wrap: break-word; color: green; font-size: 15px; font-weight: 200; margin: 0;">
                                                    https://inova.az/az/home/27-.html?adtoken=1cd9fc99265bc7693e8c7b34e66df7c8&ad=admin123&id_employee=1&preview=1</p>
                                                <small class="discription"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="meta-title">Meta title</label>
                                                    <input type="text" id="meta-title" name="meta_title" class="form-control" value="{{ old('meta_title', $entry->meta_title) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="meta-description">Meta keywords</label>
                                                    <input type="text" id="meta-keywords" name="meta_discription" class="form-control" value="{{ old('meta_title', $entry->meta_discription) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="countries">Ölkələr</label>
                                                    <select name="countries" id="countries"
                                                            class="form-control select2"
                                                            style="width: 100%;">
                                                        @foreach($countries as $country)
                                                            <option class="text text-primary" value="{{ $country->id }}" {{ collect(old('countries', $university_countries))->contains($country->id) ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <p><i class="fa fa-info-circle text-info"></i> Tövsiyyə edilən şəkil ölçüsü 300x300</p>
                                                    <label for="university_images">Şəkillər</label>
                                                    <br>
                                                    <input type="file" id="university_images" name="university_images[]" multiple="true">
                                                    <br>
                                                    <div id="all_images" class="py-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-right">
                            @if($entry->id>0)
                                <a href="{{ route('admin.university.new') }}"
                                   class="btn btn-success"> Yeni Universitet</a>
                                <button type="submit"  class="btn btn-info"><i
                                            class="fa fa-refresh"></i> Yenilə</button>
                            @else
                                <a href="{{ route('admin.university') }}"
                                   class="btn btn-default"> Ləğv et</a>
                                <button type="submit"  class="btn btn-success"><i
                                            class="fa fa-plus"></i> Saxla</button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
@section('script')
    <script>



        $(function () {
            if($("#meta-title").val().trim() !== '' || $("#meta-keywords").val().trim() !== ''){
                let metaView = $("#meta-view")
                $(metaView).find(".title").html($("#meta-title").val().trim())
                $(metaView).find(".discription").html($("#meta-keywords").val().trim())
            }

            $("#meta-title").on('keyup', function(event){
                let title = $(event.target).val()
                let metaView = $("#meta-view")
                $(metaView).find(".title").html(title)
            })
            $("#meta-keywords").on('keyup', function(event){
                let discription = $(event.target).val()
                let metaView = $("#meta-view")
                $(metaView).find(".discription").html(discription)
            })

            load_images();

            function load_images() {
                var id = {{ $entry->id }}
                $.ajax({
                    url: "{{ route('admin.university.load_images') }}",
                    method: "POST",
                    data: {id, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        $('#all_images').html(data);
                    }
                });
            }
            $(document).on('click', '.btn_close', function () {
                var id = $(this).attr('id');
                if (confirm('Şəkli silmək istəyirsiniz?')) {
                    $.ajax({
                        url: '{{ route('admin.university.remove_image') }}',
                        method: 'POST',
                        data: {id, "_token": "{{ csrf_token() }}"},
                        success: function () {
                            load_images();
                            alert('Şəkil silindi');
                        }
                    });

                } else {
                    return false;
                }
            });



            // $('input[type="file"]').imageuploadify();
            // $('.imageuploadify-message').text('{{ __('admin.Drag&Drop Your File(s)Here To Upload') }}');
            // $('.btn_file_upload').text('{{ __('admin.or select file to upload') }}');


        });

    </script>
@endsection
