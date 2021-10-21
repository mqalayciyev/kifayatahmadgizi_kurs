@extends('user.layouts.app')
@section('content')
<section class="blog_wrapper">
    <div class="container">
        <div id="login" class="row justify-content-center {{ ($session != '' ) ? 'd-none' : null}}">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 blog_wrapper_right ">
                <div class="blog-right-items">
                    <div class="become_a_teacher widget_single">
                        <div class="form-full-box">
                            <div class="form_title">
                                <h2>@lang('content.Sign in to start the test')</h2>
                            </div>
                            <form id="login_form">
                                <input type="hidden" name="id" value={{$id}}>
                                <div class="register-form">
                                    <div class="row">
                                        <div class="col-12">
                                            @include('common.errors.validate_admin')
                                            @include('common.alert')
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="fas fa-user"></i></label>
                                                <input class="form-control" name="first_name" placeholder="@lang('content.Firstname')" required="" type="text">
                                            </div>
                                        </div>

                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="fas fa-user"></i></label>
                                                <input class="form-control" name="last_name" placeholder="@lang('content.Lastname')" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label><i class="flaticon-email"></i></label>
                                                <input class="form-control" name="email" placeholder="@lang('content.Email')" required="" type="email">
                                            </div>
                                        </div>

                                        <div class="col-12 col-xs-12 col-md-12">
                                            <div class="form-group massage_text">
                                                <label><i class="fas fa-phone"></i></label>
                                                <input class="form-control" name="mobile" placeholder="@lang('content.Mobile')" required="" type="tel">
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-12 col-md-12 register-btn-box">
                                            <button class="register-btn" type="submit">@lang('content.Start')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="questions" class="row justify-content-center {{ ($session != '' ) ? null : 'd-none'}}">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4 text-left">
                                <button id="exit" data-value="0" class="btn btn-sm btn-outline-secondary"
                                    title="@lang('content.Exit')">@lang('content.Exit')</button>
                            </div>
                            <div class="col-4">
                                <time class="time"><span class="minute"></span> : <span class="seconds"></span></time>
                            </div>
                            <div class="col-4 text-right">
                                <button id="end" data-value="2" class="btn btn-sm btn-outline-secondary"
                                    title="@lang('content.Finish')">@lang('content.Finish')</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="questions-form">
                            <div class="row"></div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-4 text-left"></div>
                            <div class="col-4">
                                <time class="time"><span class="minute"></span> : <span class="seconds"></span></time>
                            </div>
                            <div class="col-4 text-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script>
        let minute = 0;
        let seconds = 0;
        $("#login_form").submit(function(event){
            event.preventDefault();
            // let formData = $(this)[0]
            let formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("first_name", $(this).find("input[name='first_name']").val());
            formData.append("last_name", $(this).find("input[name='last_name']").val());
            formData.append("email", $(this).find("input[name='email']").val());
            formData.append("mobile", $(this).find("input[name='mobile']").val());
            formData.append("id", $(this).find("input[name='id']").val());
            console.log(formData)
            $.ajax({
                url:  "{{ route('test.start') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response)
                    if(response.status == 'session'){
                        $('#login').addClass('d-none')
                        $('#questions').removeClass('d-none')
                        $('#questions').attr('data-email', response.email)
                        $('#questions').attr('data-user', response.user_id)
                        $(".time .minute").html(response.time)
                        $(".time .seconds").html("0")
                        minute = parseInt(response.time) - 1;
                        seconds = 59
                        time()
                        allQuestions()
                    }
                }
            });
        })
        let session = "{{ ($session != '' ) ? 'session' : ''}}";
        if(session != ""){
            $('#login').addClass('d-none')
            $('#questions').removeClass('d-none')
            $('#questions').attr('data-email', "{{ (isset($email)) ? $email : '' }}")
            $('#questions').attr('data-user', "{{ isset($user_id) ? $user_id : '' }}")
            $(".time .minute").html("{{ isset($time) ? $time : '' }}")
            $(".time .seconds").html("0")
            minute = parseInt("{{ isset($time) ? $time : '' }}") - 1;
            seconds = 59
            time()
            allQuestions()
        }

        function time() {
            let myinterval = setInterval(function(){

                seconds = parseInt(seconds)
                minute = parseInt(minute)
                if(seconds == 0){
                    minute--
                    seconds = 59;
                }
                else{
                    seconds--
                }
                if(seconds == 0 && minute == 0){
                    clearInterval(myinterval)
                    end()
                }
                $(".time .seconds").html(seconds)
                $(".time .minute").html(minute)
                // let new =
            }, 1600);
        }

        function allQuestions() {
            $.ajax({
                url: "{{ route('test.questions') }}",
                type: 'POST',
                data: {"_token" : "{{ csrf_token() }}", id: "{{ $id }}"},
                success: function(response) {
                    // console.log(response)
                    $('#questions').find('.card-body #questions-form div.row').html(response.question)
                }
            });
        }
        function end(){
            let formData = new FormData($("#questions-form")[0])
            let user_id = $('#questions').attr('data-user')
            let email = $('#questions').attr('data-email')
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("id", "{{ $id }}");
            formData.append("email", email);
            formData.append("user_id", user_id);
            $.ajax({
                url:  "{{ route('test.end') }}",
                type: 'POST',
                data: formData,
                cache: false,
                async: true,
                processData: false,
                contentType: false,
                timeout: 5000,
                success: function(response) {
                    console.log(response)
                    location.href = response.url
                }
            });
        }
        $('#questions').on('click', '#end', function(){
            let formData = new FormData($("#questions-form")[0])
            let user_id = $('#questions').attr('data-user')
            let email = $('#questions').attr('data-email')
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("id", "{{ $id }}");
            formData.append("email", email);
            formData.append("user_id", user_id);
            $.ajax({
                url:  "{{ route('test.end') }}",
                type: 'POST',
                data: formData,
                cache: false,
                async: true,
                processData: false,
                contentType: false,
                timeout: 5000,
                success: function(response) {
                    console.log(response)
                    location.href = response.url
                }
            });
        })
        $('#questions').on('click', '#exit', function(){
            $.ajax({
                url: "{{ route('test.exit') }}",
                type: 'POST',
                data: {"_token" : "{{ csrf_token() }}", id: "{{ $id }}"},
                success: function(response) {
                    console.log(response)
                    location.href = response.url
                }
            });
        })



    </script>
@endsection
