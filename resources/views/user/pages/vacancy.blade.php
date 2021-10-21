@extends('user.layouts.app')
@section('content')
<section class="contact_info_wrapper">
    <div class="container">
       <div class="row">
           @foreach ($vacancies as $item)
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <details>
                    <summary style="font-size: 20px; outline: none">{{$item->name}}</summary>

                    <dl class="">
                        <dt class="">Tələblər</dt>
                        <dd class="">{!! $item->requirements!!}</dd>

                        <dt class="">İş barədə məlumat</dt>
                        <dd class="">{!! $item->information!!}</dd>

                        <dt class="">İş yeri</dt>
                        <dd class="">{{ $item->job_address }}</dd>
                    </dl>


                </details>
            </div>
           @endforeach
       </div>
    </div>
</div>
@endsection
