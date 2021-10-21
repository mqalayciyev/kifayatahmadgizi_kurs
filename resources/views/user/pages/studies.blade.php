@extends('user.layouts.app')
@section('content')
<section class="blog_wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12">
               {!! old('text', $studies->text) !!}
            </div>
        </div>
    </div>
</section>
@endsection
