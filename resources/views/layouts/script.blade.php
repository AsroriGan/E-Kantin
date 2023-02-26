<!--begin::Javascript-->
<script>
    var hostUrl = "assets/index.html";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/index.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/xy.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/percent.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/radar.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/map.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="../../../cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-campaign.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
{{-- Begin::Toastr --}}
@if (Session::has('success'))
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toastr-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "swing",
            "showMethod": "show",
            "hideMethod": "fadeOut"
        };
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif
{{-- End::Toastr --}}
