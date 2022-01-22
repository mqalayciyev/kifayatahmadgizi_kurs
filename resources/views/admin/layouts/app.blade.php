<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layouts.partials.head')

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.partials.navbar')
        @include('admin.layouts.partials.main-sidebar')

        <div class="content-wrapper pt-3">
            {{-- @include('admin.layouts.partials.breadcrumb') --}}
            @yield('content')
        </div>

        @include('admin.layouts.partials.footer')
        @include('admin.layouts.partials.control-sidebar')

    </div>
    @include('admin.layouts.partials.script')
</body>
</html>
