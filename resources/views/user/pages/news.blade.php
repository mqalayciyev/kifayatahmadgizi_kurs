@extends('user.layouts.app')
@section('content')

<section class="blog_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                @foreach ($news as $item)
                    <div class="single_blog">
                        @php
                            $pattern = array("'ə'", "'é'", "'è'", "'ë'", "'ê'", "'É'", "'È'", "'Ë'", "'Ê'", "'á'", "'à'", "'ä'", "'â'", "'å'", "'Á'", "'À'", "'Ä'", "'Â'", "'Å'", "'ó'", "'ò'", "'ö'", "'ô'", "'Ó'", "'Ò'", "'Ö'", "'Ô'", "'í'", "'ì'", "'ï'", "'î'", "'Í'", "'Ì'", "'Ï'", "'Î'", "'ú'", "'ù'", "'ü'", "'û'", "'Ú'", "'Ù'", "'Ü'", "'Û'", "'ý'", "'ÿ'", "'Ý'", "'ø'", "'Ø'", "'œ'", "'Œ'", "'Æ'", "'ç'", "'Ç'");

                            $replace = array('e','e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'I', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'Y', 'o', 'O', 'a', 'A', 'A', 'c', 'C');

                            $arr = explode(" ", $item->title);
                            $slug = join("-", $arr);

                            $slug = strtolower($slug);
                           $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                            $image = App\Models\NewsImages::find($item->image);
                        @endphp
                        <div class="blog_banner text-center">
                            <a href={{route('news.single', [$slug, $item->id])}} title=""><img src={{ asset('images/news/' . $image->image) }} alt="" class="img-fluid"></a>
                        </div>
                        <div class="post_content_wrapper">
                            <div class="post_date"><p>@lang('content.Shared') : {{ $item->created_at }} </p></div>
                            <h3><a href={{route('news.single', [$slug, $item->id])}} title="">{{ $item->title }}</a></h3>
                            <p class="truncate">
                                {{ strip_tags($item->text) }}
                            </p>
                            <div class="post_by d-flex justify-content-between">
                                <strong><a href={{route('news.single', [$slug, $item->id])}} title="" class="text-uppercase text-dark">@lang('content.More')</a></strong>
                            </div>
                        </div>
                    </div>
                @endforeach



                {!! $paginations !!}
            </div> <!-- End Blog Right Side--->

            <div class="col-12 col-sm-12 col-md-4 col-lg-4 blog_wrapper_right ">
                <div class="blog-right-items">

                    <div class="become_a_teacher widget_single">
                        <div class="form-full-box">
                            <div class="form_title">
                                <h2>@lang('content.Get free information')</h2>
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
                                                <input class="form-control" name="first_name" placeholder="@lang('content.Firstname')" required="" type="text">
                                            </div>
                                        </div>

                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="fas fa-user"></i></label>
                                                <input class="form-control" name="last_name" placeholder="@lang('content.Lastname')" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="flaticon-email"></i></label>
                                                <input class="form-control" name="email" placeholder="@lang('content.Email')" required="" type="email">
                                            </div>
                                        </div>

                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group massage_text">
                                                <label><i class="fas fa-phone"></i></label>
                                                <input class="form-control" name="mobile" placeholder="@lang('content.Mobile')" required="" type="tel">
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


                    <div class="recent_post_wrapper widget_single">
                        <div class="items-title">
                            <h3 class="title">@lang('content.Recent Posts')</h3>
                        </div>
                        @foreach ($latest as $item)
                            @php
                                $pattern = array("'ə'", "'é'", "'è'", "'ë'", "'ê'", "'É'", "'È'", "'Ë'", "'Ê'", "'á'", "'à'", "'ä'", "'â'", "'å'", "'Á'", "'À'", "'Ä'", "'Â'", "'Å'", "'ó'", "'ò'", "'ö'", "'ô'", "'Ó'", "'Ò'", "'Ö'", "'Ô'", "'í'", "'ì'", "'ï'", "'î'", "'Í'", "'Ì'", "'Ï'", "'Î'", "'ú'", "'ù'", "'ü'", "'û'", "'Ú'", "'Ù'", "'Ü'", "'Û'", "'ý'", "'ÿ'", "'Ý'", "'ø'", "'Ø'", "'œ'", "'Œ'", "'Æ'", "'ç'", "'Ç'");

                                $replace = array('e','e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'I', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'Y', 'o', 'O', 'a', 'A', 'A', 'c', 'C');

                                $arr = explode(" ", $item->title);
                                $slug = join("-", $arr);

                                $slug = strtolower($slug);
                                $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                                $image = App\Models\NewsImages::find($item->image);
                            @endphp
                            <div class="single-post">
                                <div class="recent_img">
                                    <a href={{route('news.single', [$slug, $item->id])}} title=""><img src={{ asset('images/news/' . $image->image) }} alt="" class="img-fluid"></a>
                                </div>
                                <div class="post_title">
                                    <a href={{route('news.single', [$slug, $item->id])}} title="">{{$item->title}}</a>
                                    <div class="post-date">
                                        <span>{{$item->created_at}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div><!-- ./ End  Blog Right Wrapper-->

        </div>
    </div>
</section><!-- ./ End  Blog Wrapper-->
@endsection
