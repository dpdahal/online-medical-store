@section('footer')
    <footer>
        <div class="clearfix"></div>
    </footer>
    </div>
    </div>
    <script src="{{url('public/backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{url('public/backend/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{url('public/backend/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{url('public/backend/vendors/google-code-prettify/src/prettify.js')}}"></script>

    <script src="{{url('public/backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{url('public/backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>

    <script src="{{url('public/backend/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{url('public/backend/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{url('public/backend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{url('public/backend/build/js/custom.min.js')}}"></script>
    <script src="{{url('public/backend/custom/chat.js')}}"></script>
    <script src="{{url('public/backend/imgzom/src/js/jquery.pan.js')}}"></script>
    <script src="{{url('public/backend/custom/dp.js')}}"></script>
    <script src="{{url('public/backend/custom/custom.js')}}"></script>


    <script>
        let URL = "{{url('/')}}";
        let Token="{{csrf_token()}}";

        CKEDITOR.replace('description');
    </script>

    </body>
    </html>

@endsection
