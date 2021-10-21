<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('user.layouts.partials.head')
</head>
<body>
    {{-- <div id="app"> --}}
        @include('user.layouts.partials.header')

        <main>
            @yield('content')
        </main>

        @include('user.layouts.partials.footer')
        @include('user.layouts.partials.script')


        <div class="whatsapp-button">
            <a href="https://wa.me/{{ str_replace([' ', '+'], '', old('mobile', $about->mobile)) }}" target="_blank" class="wp-button-circle">
                <span class="text">@lang('content.Write to us')</span>
                <div class="img-button">
                    <img src="https://www.vectorico.com/download/social_media/Whatsapp-Icon.jpg" alt="" >
                </div>
            </a>
        </div>
    {{-- </div> --}}
</body>
</html>
