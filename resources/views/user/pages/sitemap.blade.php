@extends('user.layouts.app')
@section('content')
<section class="blog_wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12">
                <h2 class="pb-3">Menu</h2>
                <div class="col-12 sitemap">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('courses') }}">Courses</a></li>
                        <li><a href="{{ route('tests') }}">Tests</a></li>
                        <li>
                            <a href="#">Information</a>
                            <ul>
                                <li><a href="{{ route('news') }}">News</a></li>
                                <li><a href="{{ route('events') }}">Events</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">About us</a>
                            <ul>
                                <li><a href="{{ route('method') }}">Method</a></li>
                                <li><a href="{{ route('studies') }}">Studies</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
