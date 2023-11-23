 <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <!-- <div class="pull-right hidden-xs">
          Powerd by: <a href="#" target="_blank">#####</a>
        </div> -->
        <!-- Default to the left -->
        <strong>Copyright &copy; 2022 <a href="dashboard.php">Tanta university</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->


    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    
    <!-- Custom Functions -->
    <script src="dist/js/functions.js"></script>
    
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>

    <!-- Font Awesome 
      <script src="https://use.fontawesome.com/e0c6887fb3.js"></script>
    -->

    <!-- ckeditor Editor-->

    <script src="plugins/ckeditor/ckeditor.js"></script>
    <?php 
    ckeditorID('details');
    ckeditorID('details_en');
    
     ?>

      <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        }); 
      });
    </script>

     <!-- bootstrap datepicker -->
    <script src="plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    </script>
  
    <?php getActiveNav(); ?>

  </body>
</html>
