@extends('user.layouts.app')

@section('content')

<section class="unlimited_possibilities">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <video class="w-100" controls src="{{ asset('media/video.mp4') }}"></video>
            </div>
            <div class="col-12 col-sm-6">
                <img src="{{ asset('images/banner/Heydr-liyev.jpg') }}" >
            </div>
        </div>
    </div>
</section><!-- End Unlimited Possibilities -->

    <section class="unlimited_possibilities">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="sub_title">
                        <h2>@lang('content.Our advantages')</h2>
                    </div><!-- ends: .section-header -->
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="single_item single_item_first">
                        <div class="icon_wrapper">
                            <i class="flaticon-student"></i>
                        </div>
                        <div class="blog_title">
                            <h3><a href="#" title="">@lang('content.Section 1 title')</a></h3>
                            <p>@lang('content.Section 1 text')</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="single_item single_item_center">
                        <div class="icon_wrapper">
                            <i class="fi-rr-clock"></i>
                        </div>
                        <div class="blog_title">
                            <h3><a href="#" title="">@lang('content.Section 2 title')</a></h3>
                            <p>@lang('content.Section 2 text')</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="single_item single_item_last">
                        <div class="icon_wrapper">
                            <i class="flaticon-diploma"></i>
                        </div>
                        <div class="blog_title">
                            <h3><a href="#" title="">@lang('content.Section 3 title')</a></h3>
                            <p>@lang('content.Section 3 text')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Unlimited Possibilities -->




    <section class="popular_courses" id="popular_courses_2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="sub_title">
                        <h2>@lang('content.Our Popular Courses')</h2>
                        {{-- <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p> --}}
                    </div><!-- ends: .section-header -->
                </div>
                @foreach ($courses as $item)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="single-courses">
                            @php
                                $arr = explode(' ', $item->name);
                                $slug = join('-', $arr);
                                $slug = strtolower($slug);
                                $slug = preg_replace('/[^\x20-\x7E]/','', $slug);

                            @endphp
                            <div class="courses_banner_wrapper">
                                <div class="courses_banner"><a href={{ route('cours', [$slug, $item->id]) }}>
                                    <img
                                            src={{ asset('images/courses/' . $item->image) }} alt=""
                                            class="img-fluid"></a></div>
                                <div class="purchase_price {{ ($item->price == '') ? 'd-none' : '' }}">
                                    <a class="read_more-btn">{{ $item->price }}&#8380;</a>
                                </div>
                            </div>
                            <div class="courses_info_wrapper">
                                <div class="courses_title">
                                    <h3><a href={{ route('cours', [$slug, $item->id]) }}>{{ $item->name }}</a></h3>
                                </div>
                                <div class="courses_info">
                                    <ul class="list-unstyled">
                                        {{ $item->student_count ? '<li><i class="fas fa-user"></i>'. $item->student_count . __('content.Student') . '</li>' : '' }}
                                        {{ $item->term ? '<li><i class="fas fa-calendar-alt"></i>'. $item->term . __('content.Day') . '</li>' : '' }}
                                    </ul>
                                    <a href={{ route('cours', [$slug, $item->id]) }} class="cart_btn">@lang('content.More')</a>
                                </div>
                            </div>
                        </div><!-- Ends: .single courses -->
                    </div><!-- Ends: . -->
                @endforeach

            </div>
        </div>
        <div class="shape_bg">
            <span class="shape_1"></span>
            <span class="shape_2"></span>
            {{-- <span class="shape_3"></span> --}}
        </div>
    </section> <!-- ./ End Courses Area section -->



    <section class="register_area p-0">
        <div class="blur" style="background-color: rgba(0, 0, 0, 0.4); height: 100%; padding: 130px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                    <div class="row">
                        <div class="form-full-box">
                            <div class="form_title">
                                <h2>@lang('content.Get free information')</h2>
                                {{-- <p>Get Instant access to <span>5000+ </span>Video courses </p> --}}
                            </div>
                            <form action={{route('leads')}} method="POST">
                                @csrf
                                <div class="register-form">
                                    <div class="row">
                                        <div class="col-12">

                                            @include('common.errors.validate_admin')
                                            @include('common.alert')
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="fas fa-user"></i></label>
                                                <input class="form-control" name="first_name" placeholder="@lang('content.Firstname')" required=""
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="fas fa-user"></i></label>
                                                <input class="form-control" name="last_name" placeholder="@lang('content.Lastname')" required=""
                                                    type="text">
                                            </div>
                                        </div>

                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="flaticon-email"></i></label>
                                                <input class="form-control" name="email" placeholder="@lang('content.Email')" required=""
                                                    type="email">
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="fas fa-mobile-alt"></i></label>
                                                <input class="form-control" name="mobile" placeholder="@lang('content.Mobile')" required=""
                                                    type="tel">
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-12 col-md-12 register-btn-box">
                                            <button class="register-btn" type="submit">@lang('content.Send')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-7 form-content">
                    <h3>@lang('content.Form content text 1')</h3>
                    <h2>@lang('content.Form content text 2')</h2>
                    <p>@lang('content.Form content text 3')</p>
                    <div class="count_student">
                        <div class="single_count">
                            <span class="counter">{{ old('books', $about->books) }}</span>
                            <span class="department_name">@lang('content.Our book')</span>
                        </div>
                        <div class="single_count">
                            <span class="counter">{{ old('courses', $about->courses) }}</span>
                            <span class="department_name">@lang('content.Programs & Courses')</span>
                        </div>
                        <div class="single_count">
                            <span class="counter">{{ old('experience', $about->experience) }}</span>
                            <span class="department_name">@lang('content.Years of Experience')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- ./ End Register Area section -->



    <section class="latest_news_2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="sub_title">
                        <h2>@lang('content.Latest news')</h2>
                        {{-- <p>Lorem ipsum dolor sit amet mollis felis dapibus arcu donec viverra. Pede phasellus eget. Etiam maecenas vel vici quis dictum rutrum nec nisi et.</p> --}}
                    </div><!-- ends: .section-header -->
                </div>
                @foreach ($news as $item)
                    @php
                        $pattern = ["'ə'", "'é'", "'è'", "'ë'", "'ê'", "'É'", "'È'", "'Ë'", "'Ê'", "'á'", "'à'", "'ä'", "'â'", "'å'", "'Á'", "'À'", "'Ä'", "'Â'", "'Å'", "'ó'", "'ò'", "'ö'", "'ô'", "'Ó'", "'Ò'", "'Ö'", "'Ô'", "'í'", "'ì'", "'ï'", "'î'", "'Í'", "'Ì'", "'Ï'", "'Î'", "'ú'", "'ù'", "'ü'", "'û'", "'Ú'", "'Ù'", "'Ü'", "'Û'", "'ý'", "'ÿ'", "'Ý'", "'ø'", "'Ø'", "'œ'", "'Œ'", "'Æ'", "'ç'", "'Ç'"];

                        $replace = ['e', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'I', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'Y', 'o', 'O', 'a', 'A', 'A', 'c', 'C'];

                        $arr = explode(' ', $item->title);
                        $slug = join('-', $arr);

                        $slug = strtolower($slug);
                        $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                        $image = App\Models\NewsImages::find($item->image);
                    @endphp
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="single_item">
                            <div class="item_wrapper">
                                <div class="blog-img">
                                    <a href={{route('news.single', [$slug, $item->id])}} title=""><img src={{ asset('images/news/' . $image->image) }} alt=""
                                            class="img-fluid"></a>
                                </div>
                                <h3><a href={{route('news.single', [$slug, $item->id])}} title="">{{$item->title}}</a></h3>
                                <br>
                                <p class="truncate px-3">
                                    {{ strip_tags($item->text) }}
                                </p>
                                <div class="px-3 pb-3 text-left">
                                    <strong><a href={{route('news.single', [$slug, $item->id])}} title="" class="text-uppercase text-dark">@lang('content.More')</a></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section><!-- End Blog -->



    <section class="teamgroup">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0">
                    <div class="teamgroup_info_wrapper">
                        <h2>@lang('content.Start now and turn your knowledge into a profitable online course')</h2>
                        <a href={{ route('apply') }} title="" class="srtarte_btn">@lang('content.Get started now')</a>
                    </div>
                    <div class="teamgroup_info_banner">
                        <img src="images/banner/bottombanner.jpg" alt="" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Team Group -->

@endsection
