
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') | {{ config('app.name', 'Laravel') }}</title>


<link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />

<!-- Font Icons -->
<link href="{{ asset('admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

<!-- animate css -->
<link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet" />

<!-- Waves-effect -->
<link href="{{ asset('admin/css/waves-effect.css') }}" rel="stylesheet">

<!-- sweet alerts -->

<link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css"/>

<!-- Custom Files -->
<link href="{{ asset('admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />
<!-- DataTables -->
<link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{ asset('admin/js/modernizr.min.js') }}"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
" rel="stylesheet">
    @livewireStyles
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

</head>

<style>
    .swal2-container.swal2-center>.swal2-popup{
    font-size: 1.1em
}
   .form-control{
    border: 1px solid #ddd
   }
   .sidebar .nav .nav-item.active {
    background-color: rgba(128, 128, 128, 0.3) ;
   }
   @media print {
  body * {
    visibility: hidden;
    margin: 0;
    padding: 0;
    font-size: 12pt;
    font-family: "Times New Roman", serif;
    font-weight: normal;
  }
  div .printable, div .printable * {
    visibility: visible;
  }
  #invoice {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: 0;
    padding: 0;
    overflow: auto;
    z-index: 9999;
  }


}

</style>
<body>
    <div id="wrapper">
    @include('admin.navbar')

        @include('admin.sidebar')


        @yield('content')

        <footer class="footer text-right">
            2023 © Inventory System.
        </footer>
    </div>
    <script>
        var resizefunc = [];
    </script>




    <!-- jQuery  -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <script src="{{ asset('admin/js/wow.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/assets/chat/moment-2') }}.2.1.js"></script>
    <script src="{{ asset('admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-detectmobile/detect.js') }}"></script>
    <script src="{{ asset('admin/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

    <!-- sweet alerts -->
    <script src="{{ asset('admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('admin/assets/sweet-alert/sweet-alert.init.js') }}"></script>

    <!-- flot Chart -->
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>

    <!-- Counter-up -->
    <script src="{{ asset('admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin/js/jquery.app.js') }}"></script>

    <!-- Dashboard -->
    <script src="{{ asset('admin/js/jquery.dashboard.js') }}"></script>

    <!-- Chat -->
    <script src="{{ asset('admin/js/jquery.chat.js') }}"></script>

    <!-- Todo -->
    <script src="{{ asset('admin/js/jquery.todo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        /* ==============================================
        Counter Up
        =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });

    </script>

<script>

    @if (Session::has('message'))
    var type="{{ Session::get('alert-type', 'success') }}"
    switch (type) {
        case 'info':
                toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
                toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
                toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
                toastr.error("{{ Session::get('message') }}");
            break;

    }

    @endif

</script>
<script>
    window.onbeforeprint = function() {
      document.querySelector('.side-menu').style.display = 'none';
    }
  </script>

<script src="{{ asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>

<script type="text/javascript">
    $(document).ready( function() {
		       $('#datatable').dataTable( {
		        "pageLength": 5
		      } );
		     } )

</script>
    @yield('scripts')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    @livewireScripts


    @stack('script')
</body>
</html>
