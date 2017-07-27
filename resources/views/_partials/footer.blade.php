                <!-- begin theme-panel -->
        
        <!-- end theme-panel -->
        
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
<!-- ================== BEGIN BASE JS ================== -->
<script src="{{asset('public/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery-ui/ui/minified/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!--[if lt IE 9]>
<script src="{{asset('public/crossbrowserjs/html5shiv.js')}}"></script>
<script src="{{asset('public/crossbrowserjs/respond.min.js')}}"></script>
<script src="{{asset('public/crossbrowserjs/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset('public/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{asset('public/plugins/morris/raphael.min.js')}}"></script>
<script src="{{asset('public/plugins/morris/morris.js')}}"></script>
<script src="{{asset('public/plugins/jquery-jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js')}}"></script>
<script src="{{asset('public/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js')}}"></script>
<script src="{{asset('public/plugins/gritter/js/jquery.gritter.js')}}"></script>
<!-- <script src="{{asset('public/js/dashboard-v2.min.js')}}"></script> -->
<script src="{{asset('public/js/form-wysiwyg.demo.min.js')}}"></script> 
<script src="{{asset('public/plugins/bootstrap-wysihtml5/dist/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script src="{{asset('public/plugins/bootstrap-wizard/js/bwizard.js')}}"></script>
<script src="{{asset('public/js/form-wizards-validation.demo.min.js')}}"></script>

<script src="{{asset('public/js/apps.min.js')}}"></script>
<script src="{{ asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{asset('public/js/form-plugins.demo.min.js')}}"></script>  
<script src="{{ asset('public/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script src="{{asset('public/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/js/table-manage-responsive.demo.min.js')}}"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{asset('public/plugins/parsley/dist/parsley.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script src="{{ asset('public/js/chosen.jquery.js') }}" type="text/javascript"></script> 
<!-- tinymce editor -->
<script src="{{asset('public/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
    tinymce.init({
      selector: 'textarea',  // change this value according to your HTML
      plugin: 'a_tinymce_plugin',
      a_plugin_option: true,
      a_configuration_option: 400
    });
</script>
<script type="text/javascript">
    $('.select').chosen("liszt:updated");
    
    function confirmDelete(){
        return confirm("Do You Sure Want To Delete This Data ?");
    }
</script>
<script>
    $(document).ready(function() {
        //App.init();
        DashboardV2.init();
        //
    });

    //
    
</script>



</body>
</html>