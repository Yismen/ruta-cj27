       
        {{-- <script src="js/main.js"></script> --}}
    </body>

        <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    {{-- My scripts --}}
    <script src="{{ asset('assets/js/message_hidder.js') }}"></script>
    <script src="{{ asset('assets/js/destroy-confirmation.js') }}"></script>

    <!-- bootbox -->
    <script src="{{ asset('assets/plugins/bootbox/bootbox.min.js') }}"></script>


    <!-- AdminLTE App -->
    <script src="{{ asset('assets/plugins/admin-lte/dist/js/app.min.js') }}"></script>

    {{-- iChecks --}}
    {{-- <script src="{{ asset('assets/plugins/icheck-1.x/iCheck.min.js') }}"></script> --}}
    {{-- <script>$('input').iCheck();</script> --}}

</html>