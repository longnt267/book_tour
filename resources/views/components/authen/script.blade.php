<script src="{{ asset('xtreme/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('xtreme/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('xtreme/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="{{ asset('js/my_admin.js') }}"></script>

<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
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
</body>

</html>
