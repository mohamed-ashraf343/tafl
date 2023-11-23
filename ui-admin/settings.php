<?php 
  $activeNav = 'settings' ;
  include 'includes/header.php';
 ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Settings
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-1"></div>  
            <div class="col-md-9">
              <!-- Start Alerts Messages -->
              
                <?php 
                  $msg = 'Saved Successfully' ;
                  alert('update_settings', 'success', 'alert-success', 'fa-check', $msg )  ;
                ?>

                    <!-- End Alerts Messages -->
            </div>
            <div class="clearfix "></div>

            <div class="col-md-1"></div>

            <div class="col-md-9">
               <div class="box box-info">
                 <?php
                  if (!file_exists('../images/news_uploads')) {
                      mkdir('../images/news_uploads', 0777, true);
                  }
                 ?>
                 
                  
                  <?php
                 /*Connect To Database*/
                  include 'includes/config.php';

                  // $newsID = isset($_GET['nid']) && is_numeric($_GET['nid']) ? intval($_GET['nid']) : 0 ;

                  $checkCount = checkItem("set_id","settings", 1) ;

                  if($checkCount > 0) {

                    $stmt = $conn->prepare('SELECT * FROM settings WHERE set_id = 1 ');
                    $stmt->execute();
                    $row = $stmt->fetch();
                 ?>

                  <div class="clearfix"></div>
                  <!-- form start -->
                  
                  <form role="form" class="form1" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="box-body">

                      <input type="hidden" name="sid" value="<?php echo $row['set_id'] ?>" >

                      <div class="form-group">
                        <label for="link">Email</label>
                        <input type="text" class="form-control" name="set_email"  placeholder="" autocomplete="off" value="<?= $row['set_email']?>" required>
                      </div>

                      <div class="form-group">
                        <label for="link">Phone</label>
                        <input type="text" class="form-control" name="set_phone"  placeholder="" autocomplete="off" value="<?= $row['set_phone']?>" required>
                      </div>

                      <div class="form-group">
                        <label for="link">Address</label>
                        <input type="text" class="form-control" name="set_address"  placeholder="" autocomplete="off" value="<?= $row['set_address']?>" required>
                      </div>

                      <div class="form-group">
                        <label for="link">Address - en</label>
                        <input type="text" class="form-control" name="set_address_en"  placeholder="" autocomplete="off" value="<?= $row['set_address_en']?>" required>
                      </div>

                      <div class="form-group">
                        <label for="link">facebook</label>
                        <input type="text" class="form-control" name="set_facebook"  placeholder="" autocomplete="off" value="<?= $row['set_facebook']?>" required>
                      </div>

                      <div class="form-group">
                        <label for="link">twitter</label>
                        <input type="text" class="form-control" name="set_twitter"  placeholder="" autocomplete="off" value="<?= $row['set_twitter']?>" required>
                      </div>

                      <div class="form-group">
                        <label for="link">linkedin</label>
                        <input type="text" class="form-control" name="set_linkedin"  placeholder="" autocomplete="off" value="<?= $row['set_linkedin']?>" required>
                      </div>

                      <div class="form-group">
                        <label for="link">instagram</label>
                        <input type="text" class="form-control" name="set_instagram"  placeholder="" autocomplete="off" value="<?= $row['set_instagram']?>" required>
                      </div>



                      <div class="clearfix "></div>
                      
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> حفـــظ</button>
                    </div><!-- /.box-footer -->
                </form>
                  
                  <?php 

                    } 
                    else
                      {
                        echo "<h2> This ID is not found" ;
                      }
                  ?>

               </div><!-- /.box -->


              <?php 
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                  /*Connect To Database*/
                  include 'includes/config.php';

                  $s_id           = $_POST['sid'];
                  // $registration   = isset($_POST['registration']) ? 1 : 0 ;
                  $set_email      = $_POST['set_email'];
                  $set_phone      = $_POST['set_phone'];
                  $set_facebook   = $_POST['set_facebook'];
                  $set_twitter    = $_POST['set_twitter'];
                  $set_linkedin   = $_POST['set_linkedin'];
                  $set_instagram  = $_POST['set_instagram'];
                  $set_address    = $_POST['set_address'];
                  $set_address_en = $_POST['set_address_en'];

                  


                  /*Update news into database*/

                  $stmt = $conn->prepare("UPDATE settings SET 
                                            set_email  = ?, set_phone  = ?, set_facebook  = ?, set_twitter  = ?, set_linkedin  = ?, set_instagram  = ?, set_address  = ?, set_address_en = ?
                                            WHERE set_id = ? ");

                    $success = $stmt->execute(array( $set_email, $set_phone, $set_facebook, $set_twitter, $set_linkedin, $set_instagram, $set_address, $set_address_en,  $s_id) ) ;
                    
                    if($success){

                        $_SESSION['update_settings'] = 1 ;
                        header("location:?do=update&nid=".$s_id);
                        
                    }  

                  }
                 
                ?>

            </div><!--/.col-->

          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php include 'includes/footer.php'; ?>