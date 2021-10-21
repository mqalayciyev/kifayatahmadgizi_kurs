<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  <link rel="shortcut icon" href={{ asset('/images/' . old('logo', $about->logo)) }} type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('css/css.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href={{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>
  <!-- iCheck -->
  <!--<link rel="stylesheet" href={{ asset('admn/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>-->
  <!-- JQVMap -->
  <!--<link rel="stylesheet" href={{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}>-->
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset('admin/dist/css/adminlte.min.css') }}>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}>
  <!-- summernote -->
  <link rel="stylesheet" href={{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}>
  <!-- DataTables -->
  <link rel="stylesheet" href={{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
  <link rel="stylesheet" href={{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
  <link rel="stylesheet" href={{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
  <link rel="stylesheet" href="{{ asset('admin/dist/css/croppie.css') }}" />
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" />-->
  @yield('head')
