@extends('user.layouts.app')
@section('content')
<section class="blog_wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12">
               {!! old('text_' . LaravelLocalization::getCurrentLocale(), $method['text_' . LaravelLocalization::getCurrentLocale()]) !!}
            </div>
        </div>
    </div>
</section>
@endsection
