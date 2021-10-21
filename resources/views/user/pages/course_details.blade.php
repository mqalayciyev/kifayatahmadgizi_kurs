@extends('user.layouts.app')
@section('content')

<section class="blog_wrapper" id="courses_details_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <div class="courses_details">
                    <div class="single-curses-contert">
                        <h2>{{ $cours->name }}</h2>
                        <div class="review-option">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="teacher_fee single_items {{ ($cours->price == '') ? 'd-none' : '' }}">
                                            <span>@lang('content.Price')</span>
                                            <span class="courses_price">{{ $cours->price }}&#8380;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="buy_btn single_items">
                                            <a href={{ route('apply' )}} title="">@lang('content.Apply')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="details-img-bxo">
                            <img src={{ asset('images/courses/' . $cours->image) }} alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="courses_tab_wrapper">
                        <div class="courses_details_nav_tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" href="#information" role="tab" data-toggle="tab">@lang('content.Information')</a></li>
                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab_contents tab-content">
                            <div role="tabpanel" class="tab-pane fade in active show" id="information">
                                <h3>@lang('content.Course description')<span>:</span></h3>
                                {!! $cours->note !!}
                                <div class="w-100">
                                    <a href="zoommtg://zoom.us/join"><img width="40" height="40" src="{{ asset('images/18362309891600040225-512.png') }}" alt="zoom" /> Zoom'a qoşul</a>
                                    <a href="https://zoom.us/download" class="mx-3" target="_blank"><img width="40" height="40" src="{{ asset('images/5e8ce423664eae0004085465.png') }}" alt="zoom" /> Zoom yüklə</a>
                                </div>

                                <div class="social_wrapper d-flex">
                                    <span>@lang('content.Share') : </span>
                                    <ul class="social-items d-flex list-unstyled">
                                        <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f fb_icon"></i></a></li>
                                        <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter tw_icon"></i></a></li>
                                        <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in link_icon"></i></a></li>
                                        <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram in_icon"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--End Blog Siderbar Left-->
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 blog_wrapper_right ">
                <div class="blog-right-items">



                    <div class="recent_post_wrapper popular_courses_post widget_single">
                        <div class="items-title">
                            <h3 class="title">@lang('content.Our Popular Courses')</h3>
                        </div>
                        @foreach ($courses_other as $item)
                            <div class="single-post">
                                @php
                                    $arr = explode(" ", $item->name);
                                    $slug2 = join("-", $arr);
                                    $slug = strtolower($slug2);
                                    $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                                @endphp
                                <div class="recent_img">
                                    <a href={{ route('cours' , [$slug, $item->id])}}><img src={{asset('images/courses/' . $item->image)}} alt="" class="img-fluid"></a>
                                </div>
                                <div class="post_title">
                                    <a href={{ route('cours' , [$slug, $item->id])}}>{{$item->name}}</a>
                                    <div class="courses_price {{ ($item->price == '') ? 'd-none' : '' }}">
                                        <div class="price"><span class="new_price">{{$item->price}}&#8380;</span></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
            </div> <!-- End Right Sidebar-->


        </div>
    </div>
</section><!-- ./ End  Blog Wrapper-->




<!--Start Courses Area Section-->
<section class="popular_courses" id="related_courses_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="title">
                    <h2>@lang('content.Recommended courses')</h2>
                </div><!-- ends: .section-header -->
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div id="related_courses" class="owlCarousel">
                    @foreach ($courses_other as $item)
                     @php
                                    $arr = explode(" ", $item->name);
                                    $slug2 = join("-", $arr);
                                    $slug2 = strtolower($slug2);
                                    $slug2 = preg_replace('/[^\x20-\x7E]/','', $slug2);
                                @endphp
                        <div class="single-courses">
                            <div class="courses_banner_wrapper">
                                <div class="courses_banner"><a href={{ route('cours' , [$slug2, $item->id])}}><img class="w-100" src={{ asset('images/courses/' . $item->image) }} alt="" class="img-fluid"></a></div>
                                <div class="purchase_price {{ ($item->price == '') ? 'd-none' : '' }}">
                                    <a class="read_more-btn">{{ $item->price }}<span>&#8380;</span></a>
                                </div>
                            </div>
                            <div class="courses_info_wrapper">
                                <div class="courses_title">
                                    <h3><a href={{ route('cours' , [$slug2, $item->id])}}>{{ $item->name }}</a></h3>
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
                    @endforeach
                </div><!-- Ends: .single courses -->
            </div><!-- Ends: . -->
        </div>

    </div>
</section><!-- ./ End Courses Area section -->

@endsection
