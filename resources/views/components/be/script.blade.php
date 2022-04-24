<script src="{{ asset('xtreme/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('xtreme/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('xtreme/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- apps -->
<script src="{{ asset('xtreme/dist/js/app.min.js') }}"></script>
<script src="{{ asset('xtreme/dist/js/app.init.js') }}"></script>
<script src="{{ asset('xtreme/dist/js/app-style-switcher.j') }}s"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('xtreme/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('xtreme/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('xtreme/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('xtreme/dist/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('xtreme/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('xtreme/dist/js/custom.js') }}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
{{-- <script src="{{ asset('xtreme/assets/libs/chartist/dist/chartist.min.js') }}"></script> --}}
{{-- <script src="{{ asset('xtreme/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script> --}}
<!--c3 charts -->
{{-- <script src="{{ asset('xtreme/assets/extra-libs/c3/d3.min.js') }}"></script> --}}
{{-- <script src="{{ asset('xtreme/assets/extra-libs/c3/c3.min.js') }}"></script> --}}
<!--chartjs -->
{{-- <script src="{{ asset('xtreme/assets/libs/chart.js/dist/Chart.min.js') }}"></script> --}}
<script src="{{ asset('xtreme/dist/js/pages/dashboards/dashboard1.js') }}"></script>
<script src="{{ asset('js/libs/moment/moment.js') }}"></script>
<script src="{{ asset('xtreme/assets/libs/ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('xtreme/assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('xtreme/assets/libs/sweetalert2/sweet-alert.init.js') }}"></script>
<script src="{{ asset('xtreme/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('xtreme/assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('xtreme/dist/js/pages/forms/select2/select2.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script src="{{ asset('js/my_admin.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.select2-hide-search').select2({
        minimumResultsForSearch: -1
    })
</script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
        case 'info':
        toastr.options.positionClass = 'toast-top-right';
        toastr.info("{{ Session::get('message') }}");
        toastr.options.timeOut = 4000;
        break;
    
        case 'warning':
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.timeOut = 4000;
        toastr.warning("{{ Session::get('message') }}");
        break;
    
        case 'success':
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.timeOut = 4000;
        toastr.success("{{ Session::get('message') }}");
        break;
    
        case 'error':
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.timeOut = 4000;
        toastr.error("{{ Session::get('message') }}");
        break;
        }
    @endif
</script>
@stack('scripts')
</body>

</html>
