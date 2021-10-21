@extends('user.layouts.app')
@section('content')


<section class="event_details_wrapper blog_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <div class="event_intro">
                    <div class="text-center"><img src={{asset('images/events/' . $image->image)}} alt="" class="img-fluid"></div>
                    <div class="post_content">
                        <div class="post_by d-flex justify-content-between">
                            <span  class="date_event">{{$start}}</span>
                            <span>{{$end}}</span>
                        </div>
                        <div class="blog_post_content">
                            {!! $event->text !!}
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-12 col-sm-12 col-md-4 col-lg-4 blog_wrapper_right ">
                <div class="blog-right-items">


                    <div class="recent_post_wrapper popular_courses_post widget_single">
                        <div class="items-title">
                            <h3 class="title">@lang('content.Recent Events')</h3>
                        </div>
                        @foreach ($latest as $item)
                            @php
                                $pattern = array("'ə'", "'é'", "'è'", "'ë'", "'ê'", "'É'", "'È'", "'Ë'", "'Ê'", "'á'", "'à'", "'ä'", "'â'", "'å'", "'Á'", "'À'", "'Ä'", "'Â'", "'Å'", "'ó'", "'ò'", "'ö'", "'ô'", "'Ó'", "'Ò'", "'Ö'", "'Ô'", "'í'", "'ì'", "'ï'", "'î'", "'Í'", "'Ì'", "'Ï'", "'Î'", "'ú'", "'ù'", "'ü'", "'û'", "'Ú'", "'Ù'", "'Ü'", "'Û'", "'ý'", "'ÿ'", "'Ý'", "'ø'", "'Ø'", "'œ'", "'Œ'", "'Æ'", "'ç'", "'Ç'");

                                $replace = array('e','e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'I', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'Y', 'o', 'O', 'a', 'A', 'A', 'c', 'C');

                                $arr = explode(" ", $item->title);
                                $slug = join("-", $arr);

                                $slug = strtolower($slug);
                                $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                                $images = App\Models\EventImages::find($item->image);
                            @endphp
                            <div class="single-post">
                                <div class="recent_img">
                                    <a href={{route('event', [$slug, $item->id])}} title=""><img src={{ asset('images/events/' . $images->image) }} alt="" class="img-fluid"></a>
                                </div>
                                <div class="post_title">
                                    <a href={{route('event', [$slug, $item->id])}} title="">{{$item->title}}</a>
                                    <div class="post-date">
                                        <span>{{$item->created_at}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>


                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="location_bottom_wrapper">
                    <div class="event_details">
                        <div class="details_title">
                            <h3>@lang('content.Details of the event')</h3>
                        </div>
                        <div class="event_location_info">
                            <ul class="list-unstyled">
                                <li><p>@lang('content.Start time')</p><span>{{$start}}</span></li>
                                <li><p>@lang('content.End time')</p><span>{{$end}}</span></li>
                                <li><p>@lang('content.Email')</p><span>{{old('email', $about['email'])}}</span></li>
                                <li><p>@lang('content.Mobile')</p><span>{{old('email', $about['email'])}}</span></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><p class="hall_location">@lang('content.Address')</p></li>
                                <li>{{$event->address}}</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Event Details Wrapper -->
@endsection
