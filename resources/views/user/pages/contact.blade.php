@extends('user.layouts.app')
@section('content')



    <section class="contact_info_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="contact_info">
                        <h3 class="title">@lang('content.Contact information')</h3>
                        <div class="event_location_info">
                            <ul class="list-unstyled">
                                <li>
                                    <h4 class="info_title">@lang('content.Address') : </h4>
                                    <ul class="list-unstyled">
                                        <li>{{ old('address', $about['address']) }} </li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="info_title">@lang('content.Working time') :</h4>
                                    <ul class="list-unstyled">
                                        <li>{{ old('start_day', $about->start_day) }} {{ old('start_time', $about->start_time) }}</li>
                                        <li>{{ old('end_day', $about->end_day) }} {{ old('end_time', $about->end_time) }}</li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="info_title">@lang('content.Phone numbers') :</h4>
                                    <ul class="list-unstyled">
                                        <li>{{ old('mobile', $about['mobile']) }}</li>
                                        <li>{{ old('phone', $about['phone']) }}</li>
                                    </ul>
                                </li>
                                <li>
                                    <h4 class="info_title">@lang('content.Email') :</h4>
                                    <ul class="list-unstyled">
                                        <li>{{ old('email', $about['email']) }}</li>
                                    </ul>
                                </li>
                            </ul>
                            <img src="images/banner/map_shape.png" alt="" class="contact__info_shpae">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="contact_form_wrapper">
                        <h3 class="title">@lang('content.Write to us')</h3>
                        <div class="leave_comment">
                            <div class="contact_form">
                                <form action={{ route('message') }} method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            @include('common.errors.validate_admin')
                                            @include('common.alert')
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 form-group">
                                            <input type="text" class="form-control" id="name" name="first_name"
                                                placeholder="@lang('content.Firstname')">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 form-group">
                                            <input type="text" class="form-control" name="last_name" id="name"
                                                placeholder="@lang('content.Lastname')">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 form-group">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="@lang('content.Email')">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 form-group">
                                            <input type="tel" class="form-control" id="mobile" name="mobile"
                                                placeholder="@lang('content.Mobile')">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 form-group">
                                            <input type="text" class="form-control" id="subject" name="subject"
                                                placeholder="@lang('content.Subject')">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 form-group">
                                            <textarea class="form-control" id="comment" name="message"
                                                placeholder="@lang('content.Write your message here')"></textarea>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 submit-btn">
                                            <button type="submit" class="text-center">@lang('content.Send message')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- Contact Info Wrappper-->

<!--"https://maps.google.com/maps?q=caspian%20plaza&t=&z=13&ie=UTF8&iwloc=&output=embed"-->

    <section class="contact_map {{ ($about['map'] != '') ? '' : 'd-none'}}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mr-auto p-0">
                    <div class="gmap_canvas p-0" style="overflow: hidden; background: none!important;">
                        <iframe class="w-100 p-0" height="500" id="gmap_canvas"
                            src={{ old('map', $about['map']) }}
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> <!-- Ends: Google Map Area -->
@endsection
