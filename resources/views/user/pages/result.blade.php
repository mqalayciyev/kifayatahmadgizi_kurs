@extends('user.layouts.app')
@section('content')
    <section class="blog_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            {{ $name }} - {{ $test_name }}
                        </div>
                        <div class="card-body">
                            <h5>@lang('content.Test result') : {{ $count }} </h5>
                            @foreach ($result as $item)
                                <div class="row">
                                    <div class="col-12 py-3">
                                        @php
                                            $question = App\Models\Questions::find($item->question);
                                        @endphp
                                        <p>{!! $question->question !!}</p>
                                        <ul class="pl-2">
                                            <li>@lang('content.Correct answer') : {{ $item->true }}</li>
                                            <li>@lang('content.Your answer') : <span style="display: inline-block; padding: 0px 4px"
                                                    class={{ $item->current == $item->true ? 'bg-success' : 'bg-danger' }}>{{ $item->current }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
