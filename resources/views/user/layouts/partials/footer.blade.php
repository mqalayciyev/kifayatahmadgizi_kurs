<!-- Footer -->
<footer class="footer_2">
    <div class="container pt-0">
        <div class="footer_top">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer_single_col footer_intro">
                        <img style="width: 128px; height: 128px;" src={{ asset('/images/' . old('logo', $about->logo)) }} alt="" class="f_logo">
                        <p>{{ old('address', $about->address) }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="footer_single_col">
                        <h3>@lang('content.Popular Courses')</h3>
                        <ul class="location_info quick_inf0">
                            @foreach ($courses_footer as $item)
                                @php
                                    $arr = explode(" ", $item->name);
                                    $slug = join("-", $arr);
                                    $slug = strtolower($slug);
                                    $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                                @endphp
                                <li><a href={{ route("cours", [$slug, $item->id]) }}>{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="footer_single_col information">
                        <h3>@lang('content.Information')</h3>
                        <ul class="quick_inf0">
                            <li><a href={{ route('news') }}>@lang('content.News')</a></li>
                            <li><a href={{ route('about') }}>@lang('content.About us')</a></li>
                            <li><a href={{ route('studies') }}>@lang('content.Studies')</a></li>
                            <li><a href={{ route('contact') }}>@lang('content.Contact')</a></li>
                            <li><a target="_blank" href="">@lang('content.Book Store')</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer_single_col contact">
                        <h3>@lang('content.Contact us')</h3>
                        <div class="contact_info">
                            <a href="tel:{{ old('mobile', $about->mobile) }}"><span>{{ old('mobile', $about->mobile) }}</span></a>
                            <a href="mailto:{{ old('email', $about->email) }}"><span class="email">{{ old('email', $about->email) }}</span></a>
                        </div>
                        <ul class="social_items d-flex list-unstyled">
                            {!! $about->facebook ? '<li><a href="' . old('facebook', $about->facebook) . '" target="_blank"><i class="fab fa-facebook-f link-icon"></i></a></li>' : '' !!}
                            {!! $about->youtube ? '<li><a href="' . old('youtube', $about->youtube) . '" target="_blank"><i class="fab fa-youtube link-icon"></i></a></li>' : '' !!}
                            {!! $about->instagram ? '<li><a href="' . old('instagram', $about->instagram) . '" target="_blank"><i class="fab fa-instagram link-icon"></i></a></li>' : '' !!}
                            {!! $about->twitter ? '<li><a href="' . old('twitter', $about->twitter) . '" target="_blank"><i class="fab fa-twitter link-icon"></i></a></li>' : '' !!}
                            <!--<li><a href={{ old('twitter', $about->twitter) }}><i class="fab fa-twitter twitt-icon"></i></a></li>-->
                        </ul>
                    </div>
                </div>
                 <div class="col-12 col-md-12 col-lg-12">
                    <div class="copyright">
                        © Copyright 2021 Kifayat Ahmad Gizi. @lang('content.All Rights Reserved')
                        <div class="mt-2">
                            @lang('content.Brand Signature', ['brand' => '<a href="https://inova.az/" target="_blank" style="vertical-align: baseline;"><img src="https://inova.az/image/logo.png" target="_blank" style="width: 50px;"></a>' ])
                        </div>
                    </div>

                 </div>
            </div>
        </div>
    </div>
    <div class="shapes_bg">
        <img src="images/shapes/testimonial_2_shpe_1.webp" alt="" class="shape_3">
        <img src="images/shapes/footer_2.webp" alt="" class="shape_1">
    </div>
</footer><!-- End Footer -->

<section id="scroll-top" class="scroll-top">
    <h2 class="disabled">Scroll to top</h2>
    <div class="to-top pos-rtive">
        <a href="#"><i class = "flaticon-right-arrow"></i></a>
    </div>
</section>

