@extends('user.layouts.app')
@section('content')

<!--Start Courses Area Section-->
<section class="popular_courses" id="popular_courses_page">
    <div class="container">
        <div class="row">

            @foreach ($tests as $item)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-courses">
                        @php
                            $arr = explode(" ", $item->name);
                            $slug = join("-", $arr);
                            $slug = strtolower($slug);
                            $slug = iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $slug);
                         @endphp
                        <div class="courses_banner_wrapper">
                            <div class="courses_banner"><a href={{route('test', [$slug, $item->id])}}><img src={{asset('images/tests/'. $item->image)}} alt="" class="img-fluid"></a></div>
                        </div>
                        <div class="courses_info_wrapper">
                            <div class="courses_title">

                                <h3><a href={{route('test', [$slug, $item->id])}}>{{$item->name}}</a></h3>
                            </div>
                            <div class="courses_info">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-question"></i>{{ $item->question_count }} @lang('content.Question')</li>
                                    <li><i class="fas fa-clock"></i>{{$item->term}} @lang('content.Minutes')</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- Ends: .single courses -->
                </div><!-- Ends: . -->
            @endforeach


            {!! $paginations !!}

        </div>

    </div>
</section><!-- ./ End Courses Area section -->
@endsection
