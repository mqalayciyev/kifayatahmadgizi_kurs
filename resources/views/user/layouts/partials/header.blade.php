<header class="header">
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="info_wrapper">
                            <div class="contact_info">
                                <ul class="list-unstyled">
                                    <li><i class="flaticon-phone-receiver"></i>{{ old('mobile', $about->mobile) }}</li>
                                    {{-- <li><i class="flaticon-phone-receiver"></i>{{ old('phone', $about->phone) }}</li> --}}
                                    <li><i class="flaticon-mail-black-envelope-symbol"></i>{{ old('email', $about->email) }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ old('address', $about->address) }}</li>
                                    <li><i class="fas fa-clock"></i>{{ old('start_day', $about->start_day) }}-{{ old('end_day', $about->end_day) }} {{ old('start_time', $about->start_time) }}-{{ old('end_time', $about->end_time) }}</li>
                                </ul>
                            </div>
                            <div class="login_info">
                                 <ul class="d-flex">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li class="nav-item">
                                        <a class="nav-link sign-in js-modal-show" rel="alternate" hreflang="{{ $localeCode }}" title="{{ $properties['name'] }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <img width="35" src="{{ asset('images/flag/'.$localeCode.'.png') }}" >
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="edu_nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-white bg-faded">
                    <a class="navbar-brand" href={{ route('home') }}><img style="width: 128px; height: 128px;" src={{ asset('/images/' . old('logo', $about->logo)) }} alt="logo"></a>
                    <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav nav lavalamp ml-auto menu">
                            <li class="nav-item"><a href={{ route('home') }} class="nav-link {{ url()->current() == route('home') ? 'active' : '' }}">@lang('content.Home Page')</a></li>
                            <li class="nav-item"><a href={{ route('gallery') }} class="nav-link {{ url()->current() == route('gallery') ? 'active' : '' }}">@lang('content.Gallery')</a></li>
                            <li class="nav-item"><a target="_blank" href="" class="nav-link">@lang('content.Book Store')</a></li>
                            <li class="nav-item"><a href={{ route('courses')}} class="nav-link {{ url()->current() == route('courses') ? 'active' : '' }}">@lang('content.Courses')</a>
                                <ul class="navbar-nav nav mx-auto">
                                    @foreach ($courses_nav as $item)
                                        @php
                                            $arr = explode(" ", $item->name);
                                            $slug = join("-", $arr);
                                            $slug = strtolower($slug);
                                            $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                                        @endphp
                                        <li class="nav-item"><a class="nav-link" href={{ route("cours", [$slug, $item->id]) }}>{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item"><a href={{route('tests')}} class="nav-link {{ url()->current() == route('tests') ? 'active' : '' }}">@lang('content.Tests')</a>
                                <ul class="navbar-nav nav mx-auto">
                                    @foreach ($tests_nav as $item)
                                        @php
                                            $arr = explode(" ", $item->name);
                                            $slug = join("-", $arr);
                                            $slug = strtolower($slug);
                                            $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                                        @endphp
                                        <li class="nav-item"><a class="nav-link" href={{ route("test", [$slug, $item->id]) }}>{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item"><a href="javascript:void(0)" class="nav-link {{ (url()->current() == route('news') || url()->current() == route('events'))  ? 'active' : '' }}">@lang('content.Information')</a>
                                <ul class="navbar-nav nav mx-auto">
                                    <li class="nav-item"><a href={{ route('news') }} class="nav-link {{ url()->current() == route('news') ? 'active' : '' }}">@lang('content.News')</a></li>
                                    <li class="nav-item"><a href={{ route('events') }} class="nav-link {{ url()->current() == route('events') ? 'active' : '' }}">@lang('content.Events')</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="javascript:void(0)" class="nav-link {{ ( url()->current() == route('method') || url()->current() == route('studies') || url()->current() == route('contact'))  ? 'active' : '' }}">@lang('content.About us')</a>
                                <ul class="navbar-nav nav mx-auto">
                                    <li class="nav-item"><a href={{ route('method') }} class="nav-link {{ url()->current() == route('method') ? 'active' : '' }}">@lang('content.Method')</a></li>
                                    <li class="nav-item"><a href={{ route('studies') }} class="nav-link {{ url()->current() == route('studies') ? 'active' : '' }}">@lang('content.Studies')</a></li>
                                    <li class="nav-item"><a href={{ route('contact') }} class="nav-link {{ url()->current() == route('contact') ? 'active' : '' }}">@lang('content.Contact')</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href={{ route('sitemap') }} class="nav-link {{ url()->current() == route('sitemap') ? 'active' : '' }}">@lang('content.Sitemap')</a></li>

                        </ul>
                    </div>
                    {{-- <div class="mr-auto search_area">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <i class="search_btn flaticon-magnifier"></i>
                                <div id="search">
                                    <button type="button" class="close">×</button>
                                     <form action={{ route('search') }} method="GET">
                                         <input type="search" value="" placeholder="Axtarış...."  required/>
                                     </form>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                </nav>
            </div>
        </div>
        @if (url()->current() == route('home'))
            @include('user.layouts.partials.slider')
        @else
            @include('user.layouts.partials.intro')
        @endif


    </header>
