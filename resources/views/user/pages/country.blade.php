@extends('user.layouts.app')
@section('content')
    <section class="blog_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 gallery">
                    <div class="gallery-items card-columns"></div>

                    <div class="col-12">
                        <div class="row">
                            @foreach ($countries as $item)
                                <div class="card" style="width: 18rem;">
                                    <a href="{{ route('universities', [$item->slug]) }}">
                                        <img class="card-img-top"
                                            src="{{ $item->image->image_name ? asset('images/country/' . $item->image->image_name) : asset('images/woocommerce-placeholder-300x300.png') }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{ $item->country_name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
