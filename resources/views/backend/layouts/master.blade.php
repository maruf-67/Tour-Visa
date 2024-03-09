
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

    @stack('style')

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

    {{-- Datatable Start --}}
    <link rel="stylesheet" href="{{ asset('css/dataTable/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTable/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTable/responsive.bootstrap5.css') }}">
    {{-- Datatable End --}}

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset("images/favicon.png") }}" />

</head>
<body class="sidebar-dark">
    @include('sweetalert::alert')

<div class="main-wrapper">

    @include('backend.layouts.asidebar')

    <div class="page-wrapper">

        @include('backend.layouts.navbar')

        @yield('content')

        @include('backend.layouts.footer')

    </div>

</div>



	<!-- core:js -->
    <script src="{{ asset('vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
    <script src="{{ asset('vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('vendors/apexcharts/apexcharts.min.js') }}"></script>

	<!-- End plugin js for this page -->

	<!-- inject:js -->
    <script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
    <script src="{{ asset('js/dashboard-light.js') }}"></script>
	<!-- End custom js for this page -->

    <script src="{{ asset('js/dataTable/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/dataTable/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dataTable/dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTable/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('js/dataTable/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('js/dataTable/responsive.bootstrap5.js') }}"></script>

    @stack('script')
<!-- core:js -->
<script src="{{ asset('vendors/core/core.js') }}"></script>
<!-- endinject -->
</body>
</html>

