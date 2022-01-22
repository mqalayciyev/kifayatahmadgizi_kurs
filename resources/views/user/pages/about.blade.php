@extends('user.layouts.app')
@section('content')
    <section class="blog_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('images/about/about-1.jpg') }}" alt="about-1.jpg">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/about/about-2.jpg') }}" alt="about-2.jpg">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/about/about-3.jpg') }}" alt="about-3.jpg">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('images/about/about-4.jpg') }}" alt="about-4.jpg">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    {!! old('text_' . LaravelLocalization::getCurrentLocale(), $about['text_' . LaravelLocalization::getCurrentLocale()]) !!}
                </div>
            </div>
        </div>
    </section>
@endsection
