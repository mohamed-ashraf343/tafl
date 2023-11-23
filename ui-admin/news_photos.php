<?php 
  $activeNav = 'news' ;
  include 'includes/header.php';
 ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          اضافة صور للخبر
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-md-1"></div>  
          <div class="col-md-10">
            <!-- Start Alerts Messages -->
            
            <?php 
              $msg = 'تم الرفع  بنجاح' ;
              alert('add_image', 'success_upload', 'alert-success', 'fa-check', $msg )  ;
            ?>

             <?php 
              $msg2 = 'تم الحذف بنجاح' ;
              alert('delete_item', 'success_del', 'alert-info', 'fa-check', $msg2 )  ;
            ?>

                  <!-- End Alerts Messages -->
          </div>
          <div class="clearfix "></div>

            <div class="col-md-1"></div>

             <div class="col-md-10">
             <?php 
              $articleid = isset($_GET['articleid']) && is_numeric($_GET['articleid']) ? intval($_GET['articleid']) : 0 ;

              include 'includes/config.php'; 

              $checkCount = checkItem("news_id","news", $articleid) ;

              if($checkCount > 0) {

              ?>


               <div class="box box-info">
                <?php
                      include 'includes/config.php'; /*Connect to DB*/
                      $stmt = $conn->prepare('SELECT * FROM news WHERE news_id = ?') ;
                      $stmt->execute( array( $articleid ));
                      $row = $stmt->fetch();
                  ?>
                <h4 class="text-center" style="padding-top: 10px"> <?php echo $row['title'];?> </h4>
                <hr>

                <!-- form start -->
                 
                <form role="form" class="form1" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="box-body">
                      
                      <div class="form-group">
                        <label for="test-pic">اختار  صورة أو أكثر  </label>
                        <input type="file" name="test-pic[]" id="test-pic" multiple required='required'>
                      </div>
                    

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> رفع</button>
                    </div><!-- /.box-footer -->
                </form>

               </div><!-- /.box -->
               
               <?php } else
                  {
                    echo "<h2> غير  موجود  </h2>" ;
                  } 
               ?>
                 
                 
                 <?php
                if (isset($_POST['submit'])){

                    include 'includes/config.php';

                    $album      = $_POST['album'] ;

                    foreach($_FILES['test-pic']['name'] as $key=>$val){

                        $test_img[$key]      = $_FILES["test-pic"]["name"][$key] ;

                        $test_img_tmp[$key]  = $_FILES["test-pic"]["tmp_name"][$key];

                        $test_img_size[$key] = $_FILES["test-pic"]["size"][$key];

                        $test_img_type[$key] = $_FILES["test-pic"]["type"][$key];

                        $test_img_dir    = "../images/news_uploads/" ;

                        $maxsize    = 7340032;     //max image size 7 Mega Byte

                        $acceptable = array(       //upload types  
                          'image/jpeg',
                          'image/jpg',
                          'image/gif',
                          'image/png'
                        );

                        $formErrors = array() ;

                          if( ($test_img_size[$key] > $maxsize) ) {
                             $formErrors[] = 'image too large. File must be less than 7 megabytes.' ;
                          }

                          if( !in_array( $test_img_type[$key], $acceptable ) ) {
                             $formErrors[] = 'Invalid image type. Only JPG, JPEG, GIF and PNG types are accepted.' ;
                          }

                          foreach ($formErrors as $error) {
                            echo "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <i class='icon fa fa-ban'></i>
                                " . $error . "</div>" ;
                          } 


                          if(empty($formErrors)){

                              if (!file_exists('../images/news_uploads')) {
                                  mkdir('../images/news_uploads', 0777, true);
                              }




                              $test_img[$key]  = date("jnYGis").rand()."_".$test_img[$key];
                              move_uploaded_file($test_img_tmp[$key], $test_img_dir.$test_img[$key]) ;

                              /*insert image to database*/

                              $stmt = $conn->prepare("INSERT INTO 
                                          news_images ( image_name, articleid, date_created )
                                      VALUES ( ?, ?, now() ) ");

                                $success = $stmt->execute(array( $test_img[$key], $articleid) ) ;

                            }

                        }

                            if(isset($success)){

                                $_SESSION['add_image'] = 1 ;
                                header("location:news_photos.php?articleid=".$articleid);

                            } 


                }
            ?>

           

            </div><!--/.col-->

            <div class="clearfix"></div>
              
              <style>
                .close-icon{
                  min-width: 40px;
                  position: absolute;
                  top: -10px;
                  right: 0;
                  padding: 5px 12px;
              }

              </style>           
            <div class="col-md-1"></div>

             <div class="col-md-10">
              <div class="box box-info">
                    <div class="box-header with-border">
                        
                        <h3 class="box-title" style="padding-bottom: 20px">الصور المضافة للخبر</h3>

                        <div class="box-body">
                            <?php
                                 $stmt = $conn->prepare('SELECT * FROM news a, news_images b
                                                    WHERE b.articleid   = a.news_id  
                                                    AND   b.articleid    ='. $articleid) ;
                                 $stmt->execute();
                                while ($row = $stmt->fetch() ) {
                            ?>
                            <div class='col-sm-3 col-md-3' style="position: relative;">
                                
                              <img class="img-responsive img-thumbnail" alt="" src="../images/news_uploads/<?=$row['image_name']?>"  style="margin-bottom: 20px; min-height:120px"/>

                                <a href="?do=delete&img_id=<?php echo $row['image_id'];?>&f_id=<?php echo $row['articleid'];?>&img_file=<?php echo $row['image_name'];?>" class="close-icon btn btn-danger confirm"  title="Delete"><i class="glyphicon glyphicon-remove"></i></a>
                            </div> <!-- col-6 / end -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
             </div>
          </div><!-- /.row -->
          
          <?php

          if (isset($_GET['do']) && $_GET['do'] == 'delete') {

              $img_id = $_GET['img_id'] ;

              $f_id   = $_GET['f_id'] ;
              
              include 'includes/config.php';
              /*Delete Image From Database*/

              $stmt = $conn->prepare("DELETE FROM news_images WHERE image_id = ? ") ;
              $success = $stmt->execute(array( $img_id ) ) ;

              /*Delete Image From Folder*/

              $img_file  = "../images/news_uploads/".$_GET['img_file'];

              @unlink($img_file) ;

              if($success){

                $_SESSION['delete_item'] = 1 ;
                header("location:news_photos.php?articleid=".$f_id);
              }
                
              
          }

        ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php include 'includes/footer.php'; ?>