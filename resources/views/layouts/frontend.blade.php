<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('meta_title')</title>
  <meta content="@yield('meta_description')" name="description">
  <meta content="@yield('meta_keywords')" name="keywords">

  <!-- Favicons -->
  <link href="{{ getSiteLogo(isset($settings['favicon']) ? $settings['favicon'] : '') }}" rel="icon">
  <link href="{{ asset('themes/frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('themes/frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/frontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/frontend/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/frontend/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('themes/frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{ asset('plugins/pace-progress/pace-theme-default.min.css') }}">

  <!-- Template Main CSS File -->
  <link href="{{ asset('themes/frontend/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/frontend/custom.css') }}" rel="stylesheet">

  <style>
  :root {
    --color: {{ $settings['color'] }};
    --hover_color: {{ $settings['hover_color'] }};
  }
  </style>

  <script>
  var frontend_url = '{{ url('/') }}';
  </script>
</head>
<body>

  @include('partials.frontend.header')

  @yield('content')

  @include('partials.frontend.footer')
  
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('themes/frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <script src="{{ asset('themes/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('themes/frontend/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <!-- <script src="{{ asset('themes/frontend/assets/vendor/php-email-form/validate.js') }}"></script> -->
  <script src="{{ asset('themes/frontend/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('themes/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('themes/frontend/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('themes/frontend/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('themes/frontend/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('themes/frontend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('plugins/purecounterjs/dist/purecounter.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('plugins/pace-progress/pace.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('themes/frontend/assets/js/main.js') }}"></script>
  <!-- Custom script -->
  <script src="{{ asset('js/frontend/custom.js') }}"></script>
  @yield('scripts')
  @include('partials.frontend.toastr-message')
</body>
</html>