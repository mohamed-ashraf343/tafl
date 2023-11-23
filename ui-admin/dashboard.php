<?php 
  include 'includes/header.php';
  $activeNav = 'homepage' ;
 ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control Panel</small>
          </h1>
        </section>
        <section>
          <div class="col-md-8 col-md-offset-2">
            <?php 
              $msg = 'تم الدخول بنجــــاح' ;
              alert('success_login', 'success', 'alert-success', 'fa-check', $msg )  ;
            ?>
          </div>
          
        </section>
        <!-- Main content -->
        <section class="content text-center">

          <!-- Your Page Content Here -->
          
          <h1 id="fittext" style="text-align: center;
                                  color:#222D32;
                                  font-size: 95px;
                                  font-weight: bold;
                                  text-transform: uppercase;
                                  display: block;
                                  text-shadow:#CCCECF -1px 1px 0,
                                  #253e45 -2px 2px 0,
                                  #1078B5 -3px 3px 0,
                                  #1078B5 -4px 4px 0;
                                  margin: 12% auto 5%;">
           Admin DASHBOARD</h1>
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Fittext Functions -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="dist/js/jquery.fittext.js"></script>
    <script>
     /* jQuery("#fittext").fitText();*/
     jQuery("#fittext").fitText(1.2, { minFontSize: '60px', maxFontSize: '95px' });
    </script>

     <?php include 'includes/footer.php'; ?>