@extends('user.layouts.app')
@section('content')



    <section class="teachers_profile">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 teacher-detail-left">
                    <div class="teacher_info_wrapper">
                        <div class="teacger-image text-center">
                            <img src={{ asset('images/team/' . $teacher->image) }} alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- Ends: .teacher-detail-left -->
                <div class="col-sm-8 teacher-detail-right">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="teacher-info">
                                <ul class="list-unstyled">
                                    <li>
                                        <h3>Ad :</h3>
                                        <span>{{ $teacher->first_name }} {{ $teacher->last_name }}</span>
                                    </li>
                                    <li>
                                        <h3>Şöbə :</h3>
                                        <span>{{ $teacher->department }}</span>
                                    </li>
                                    <li>
                                        <h3>Dil :</h3>
                                        <span>{{ $teacher->language }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="teacher-contact">
                                <h2>Bizimlə əlaqə</h2>
                                <form action={{route('message')}} method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            @include('common.errors.validate_admin')
                                            @include('common.alert')
                                        </div>
                                    </div>
                                    <input type="text" name="first_name" placeholder="Ad*" required>
                                    <input type="text" name="last_name" placeholder="Soyad*" required>
                                    <input type="email" name="email" placeholder="Email*" required>
                                    <input type="tel" name="mobile" placeholder="Mobil*" required>
                                    <textarea placeholder="Sizin mesajiniz" name="message"></textarea>
                                    <button type="submit">Göndər</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="courses_tab_wrapper">
                                <div class="courses_details_nav_tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" href="#information" role="tab"
                                                data-toggle="tab"><i class="flaticon-info-sign"></i>Bilikləri</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#courses" role="tab"
                                                data-toggle="tab"><i class="flaticon-portfolio"></i>Kurslar</a></li>
                                    </ul>
                                </div>

                                <!-- Tab panes -->
                                <div class="tab_contents tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active show" id="information">
                                        {!! $teacher->skills !!}
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="courses">
                                        <!--Start Courses Area Section-->
                                        <div class="popular_courses">
                                            <div class="row">
                                                @foreach ($teacher_cours as $item)
                                                    @php
                                                        $arr = explode(' ', $item->name);
                                                        $slug = join('-', $arr);
                                                        $slug = strtolower($slug);
                                                        $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                                                    @endphp
                                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="single-courses">
                                                            <div class="courses_banner_wrapper">
                                                                <div class="courses_banner"><a
                                                                        href={{ route('cours', [$slug, $item->id]) }}><img
                                                                            src={{ asset('images/courses/' . $item->image) }}
                                                                            alt="" class="img-fluid"></a></div>
                                                                <div class="purchase_price">
                                                                    <a class="read_more-btn">{{ $item->price }}&#8380;</a>
                                                                </div>
                                                            </div>
                                                            <div class="courses_info_wrapper">
                                                                <div class="courses_title">
                                                                    <h3><a
                                                                            href={{ route('cours', [$slug, $item->id]) }}>{{ $item->name }}</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="courses_info">
                                                                    <ul class="list-unstyled">
                                                                        <li><i
                                                                                class="fas fa-user"></i>{{ $item->student_count }}
                                                                            Tələbə</li>
                                                                        <li><i
                                                                                class="fas fa-calendar-alt"></i>{{ $item->term }}
                                                                        </li>
                                                                    </ul>
                                                                    <a href={{ route('apply') }} class="cart_btn">Müraciət
                                                                        et</a>
                                                                </div>
                                                            </div>
                                                        </div><!-- Ends: .single courses -->
                                                    </div><!-- Ends: . -->
                                                @endforeach

                                            </div>

                                        </div><!-- Ends: . -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Ends: .teacher-detail-right -->
            </div>
        </div>
    </section><!-- Ends: .teacher-details-wrapper -->



    <!--Start Courses Area Section-->
    <section class="popular_courses" id="related_courses_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="title">
                        <h2>Tövsiyyə edilən kurslar</h2>
                    </div><!-- ends: .section-header -->
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="related_courses" class="owlCarousel">
                        @foreach ($courses_nav as $item)
                            @php
                                $pattern = ["'ə'", "'é'", "'è'", "'ë'", "'ê'", "'É'", "'È'", "'Ë'", "'Ê'", "'á'", "'à'", "'ä'", "'â'", "'å'", "'Á'", "'À'", "'Ä'", "'Â'", "'Å'", "'ó'", "'ò'", "'ö'", "'ô'", "'Ó'", "'Ò'", "'Ö'", "'Ô'", "'í'", "'ì'", "'ï'", "'î'", "'Í'", "'Ì'", "'Ï'", "'Î'", "'ú'", "'ù'", "'ü'", "'û'", "'Ú'", "'Ù'", "'Ü'", "'Û'", "'ý'", "'ÿ'", "'Ý'", "'ø'", "'Ø'", "'œ'", "'Œ'", "'Æ'", "'ç'", "'Ç'"];

                                $replace = ['e', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'I', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'Y', 'o', 'O', 'a', 'A', 'A', 'c', 'C'];

                                $arr = explode(' ', $item->name);
                                $slug = join('-', $arr);

                                $slug = strtolower($slug);
                                $slug = preg_replace('/[^\x20-\x7E]/','', $slug);

                                $teachers = \App\Models\Teachers::find($item->teacher);
                                $slug2 = $teachers->first_name . '-' . $teachers->last_name;
                                $slug2 = strtolower($slug2);
                                $slug2 = preg_replace('/[^\x20-\x7E]/','', $slug2);
                            @endphp
                            <div class="single-courses">
                                <div class="courses_banner_wrapper">
                                    <div class="courses_banner"><a href={{route('cours', [$slug, $item->id])}}><img src={{ asset('images/courses/' . $item->image) }} alt=""
                                                class="img-fluid"></a></div>
                                    <div class="purchase_price">
                                        <a class="read_more-btn">{{ $item->price }}<span>&#8380;</span></a>
                                    </div>
                                </div>
                                <div class="courses_info_wrapper">
                                    <div class="courses_title">
                                        <h3><a href={{route('cours', [$slug, $item->id])}}>{{ $item->name }}</a></h3>
                                        <div class="teachers_name">Müəllim - <a href={{ route("teacher", [$slug2, $teachers->id]) }}
                                                title="">{{ $teachers->first_name }} {{ $teachers->last_name }}</a>
                                        </div>
                                    </div>
                                    <div class="courses_info">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-user"></i> {{ $item->student_count }} Tələbə</li>
                                            <li><i class="fas fa-calendar-alt"></i> {{ $item->term }}</li>
                                        </ul>
                                        <a href={{ route('apply') }} class="cart_btn">Müraciət et</a>
                                    </div>
                                </div>
                            </div><!-- Ends: .single courses -->
                        @endforeach
                    </div><!-- Ends: .single courses -->
                </div><!-- Ends: . -->
            </div>

        </div>
    </section><!-- ./ End Courses Area section -->

@endsection
