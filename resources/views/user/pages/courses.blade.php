@extends('user.layouts.app')
@section('content')


<!--Start Courses Area Section-->
<section class="popular_courses" id="popular_courses_page">
    <div class="container">
        <div class="row">
            @foreach ($courses as $item)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-courses">
                        @php
                            $arr = explode(" ", $item->name);
                            $slug = join("-", $arr);
                            $slug = strtolower($slug);
                            $slug = preg_replace('/[^\x20-\x7E]/','', $slug);

                        @endphp
                        <div class="courses_banner_wrapper">
                            <div class="courses_banner"><a href={{route('cours', [$slug, $item->id])}}><img src={{ asset('images/courses/' . $item->image) }} alt="" class="img-fluid"></a></div>
                            <div class="purchase_price {{ ($item->price == '') ? 'd-none' : '' }}">
                                <a class="read_more-btn">{{ $item->price }}&#8380;</a>
                            </div>
                        </div>
                        <div class="courses_info_wrapper">
                            <div class="courses_title">

                                <h3><a href={{route('cours', [$slug, $item->id])}}>{{ $item->name }}</a></h3>
                            </div>
                            <div class="courses_info">
                                <ul class="list-unstyled">
                                    {{ $item->student_count ? '<li><i class="fas fa-user"></i>'. $item->student_count . ' Tələbə</li>' : '' }}
                                    {{ $item->term ? '<li><i class="fas fa-calendar-alt"></i>'. $item->term . ' Gün</li>' : '' }}
                                </ul>
                                <a href={{ route('cours', [$slug, $item->id]) }} class="cart_btn">@lang('content.More')</a>
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
