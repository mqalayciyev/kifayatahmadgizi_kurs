@extends('user.layouts.app')
@section('content')
<section class="blog_wrapper">
    <div class="container">
        <div class="row justify-content-center">
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
