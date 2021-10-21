@extends('user.layouts.app')
@section('content')


    <!--========={ Our Instructiors }========-->
    <section class="our_instructors" id="instructors_page">
        <div class="container">
            <div class="row">
                @foreach ($muellimler as $item)
                    @php
                        $slug = $item->first_name . '-' . $item->last_name;
                        $slug = strtolower($slug);
                        $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                    @endphp
                    <div class="single-wrappe col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="team-single-item">
                            <figure>
                                <div class="member-img">
                                    <div class="teachars_pro">
                                        <img src={{asset('images/team/'. $item->image)}} alt="member img" class="img-fluid">
                                    </div>
                                </div>
                                <figcaption>
                                    <div class="member-name">
                                        <h4><a href={{route('teacher', [$slug, $item->id])}} title="">{{ $item->first_name }} {{ $item->last_name }}</a></h4>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>

                @endforeach


                {!! $paginations !!}

            </div>
        </div>
    </section><!-- ./ End Our Instructiors -->
@endsection
