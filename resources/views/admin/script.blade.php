<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
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
<script src="{{ asset('admin/assets/sweet-alert/sweet') }}-alert.min.js"></script>
<script src="{{ asset('admin/assets/sweet-alert/sweet') }}-alert.init.js"></script>

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
@stack('scripts')
@livewireScripts
