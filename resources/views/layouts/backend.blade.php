<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $settings['site_name'] }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>
  var frontend_url = '{{ url('/') }}';  
  var backend_url = '{{ url('/') }}';  
  </script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- pace-progress -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/pace-progress/themes/black/pace-theme-flat-top.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.dataTables.min.css"> -->
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/toastr/toastr.min.css') }}">
  <!-- Croppie -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/daterangepicker/daterangepicker.css') }}">  
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/dropzone/min/dropzone.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('themes/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset('css/backend/custom.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@yield('styles')
</head>
<body class="@yield('bodyClass')">
@yield('content')

<!-- jQuery -->
<script src="{{ asset('themes/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('themes/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('themes/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- pace-progress -->
<script src="{{ asset('themes/adminlte/plugins/pace-progress/pace.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('themes/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('themes/adminlte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('themes/adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('themes/adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('themes/adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('themes/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/dataTables.fixedColumns.min.js"></script> -->
<script src="https://cdn.datatables.net/plug-ins/1.10.22/pagination/select.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('themes/adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('themes/adminlte/plugins/toastr/toastr.min.js') }}"></script>
<!-- Croppie -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('themes/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('themes/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('themes/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('themes/adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('themes/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('themes/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('themes/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('themes/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('themes/adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('themes/adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('themes/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('themes/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('themes/adminlte/dist/js/demo.js') }}"></script>
<!-- Custom script -->
<script src="{{ asset('js/backend/custom.js') }}"></script>
@yield('scripts')
@include('partials.backend.toastr-message')
</body>
</html>