@extends('user.layouts.app')
@section('content')



    <!-- Start Events Area Section -->
    <section class="events-area">
        <div class="container">
            <div class="row">
                @foreach ($events as $item)
                    @php
                        $pattern = ["'ə'", "'é'", "'è'", "'ë'", "'ê'", "'É'", "'È'", "'Ë'", "'Ê'", "'á'", "'à'", "'ä'", "'â'", "'å'", "'Á'", "'À'", "'Ä'", "'Â'", "'Å'", "'ó'", "'ò'", "'ö'", "'ô'", "'Ó'", "'Ò'", "'Ö'", "'Ô'", "'í'", "'ì'", "'ï'", "'î'", "'Í'", "'Ì'", "'Ï'", "'Î'", "'ú'", "'ù'", "'ü'", "'û'", "'Ú'", "'Ù'", "'Ü'", "'Û'", "'ý'", "'ÿ'", "'Ý'", "'ø'", "'Ø'", "'œ'", "'Œ'", "'Æ'", "'ç'", "'Ç'"];

                        $replace = ['e', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'I', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'Y', 'o', 'O', 'a', 'A', 'A', 'c', 'C'];
                        $month = ['Yan', 'Fev', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avq', 'Sent', 'Okt', 'Noy', 'Dek'];

                        $arr = explode(' ', $item->title);
                        $slug = join('-', $arr);

                        $slug = strtolower($slug);
                        $slug = preg_replace('/[^\x20-\x7E]/','', $slug);
                        $image = App\Models\EventImages::find($item->image);
                        $date = explode('-', $item->start);
                        $day = explode('T', $date[2]);

                    @endphp
                    <div class="col-sm-12 events_full_box">
                        <div class="events_single">
                            <div class="event_banner">
                                <a href={{route('event', [$slug, $item->id])}}><img src={{ asset('images/events/' . $image->image) }} alt="" class="img-fluid"></a>
                            </div>
                            <div class="event_info">
                                <h3><a href={{route('event', [$slug, $item->id])}} title="">{{ $item->title }}</a></h3>
                                <div class="events_time">
                                    <span class="time"><i class="far fa-clock"></i>{{ $item->start }} -
                                        {{ $item->end }}</span>
                                    <span><i class="fas fa-map-marker-alt"></i>{{ $item->address }}</span>
                                </div>
                                <p>{!! $item->text !!}</p>
                                <div class="event_dete">
                                    <span class="date">{{ $day[0] }}</span>
                                    <span>{{ $month[$date[1]-1] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                {!! $paginations !!}
            </div>
        </div>
    </section><!-- ./ End Events Area section -->

@endsection
