<?php 
  $activeNav = 'img_gallery' ;
  include 'includes/header.php';
 ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Upload Images
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-md-1"></div>  
          <div class="col-md-9">
            <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'Image Uploaded Successfully' ;
                    alert('add_image', 'success', 'alert-success', 'fa-check', $msg )  ;
                  ?>

                  <!-- End Alerts Messages -->
          </div>
          <div class="clearfix "></div>

            <div class="col-md-1"></div>

             <div class="col-md-9">
               <div class="box box-info">
                 
                  <!-- form start -->
                 
                  <form role="form" class="form1" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="box-body">
                      
                      <div class="form-group">
                        <label for="test-pic">Image </label>
                        <input type="file" name="test-pic[]" id="test-pic" multiple required='required'>
                      </div>
                        
                      
                      <div class="form-group col-md-6" style="padding-left:0;">
                        <label>Albums</label>
                        <select name="album" class="form-control" required>
                          <option value="">Choose Gallery Album</option>
                          <?php 
                              include 'includes/config.php';
                              $stmt = $conn->prepare('SELECT * FROM gallery_albums') ;
                              $stmt->execute();
                              while ($row = $stmt->fetch() ) {
                                ?>
                                  <option value="<?php echo $row['album_id']; ?>">
                                    <?php echo $row['album_title']; ?>
                                  </option>  
                                <?php
                              }
                          ?>
                        </select>
                      </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> Upload</button>
                    </div><!-- /.box-footer -->
                </form>

               </div><!-- /.box -->
               
                 
                 
                 <?php
                if (isset($_POST['submit'])){

                    include 'includes/config.php';

                    $album      = $_POST['album'] ;

                    foreach($_FILES['test-pic']['name'] as $key=>$val){

                        $test_img[$key]      = $_FILES["test-pic"]["name"][$key] ;

                        $test_img_tmp[$key]  = $_FILES["test-pic"]["tmp_name"][$key];

                        $test_img_size[$key] = $_FILES["test-pic"]["size"][$key];

                        $test_img_type[$key] = $_FILES["test-pic"]["type"][$key];

                        $test_img_dir    = "../images/uploads/" ;

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

                              if (!file_exists('../images/uploads')) {
                                  mkdir('../images/uploads', 0777, true);
                              }




                              $test_img[$key]  = date("jnYGis").rand()."_".$test_img[$key];
                              move_uploaded_file($test_img_tmp[$key], $test_img_dir.$test_img[$key]) ;

                              /*insert image to database*/

                                $stmt = $conn->prepare("INSERT INTO 
                                                            gallery_images ( image_name, image_album, date_created )
                                                        VALUES ( ?, ?, now() ) ");

                                $success = $stmt->execute(array( $test_img[$key], $album) ) ;

                            }

                        }

                            if(isset($success)){

                                $_SESSION['add_image'] = 1 ;
                                header("location:add_image.php");

                            } 


                }
            ?>

           

            </div><!--/.col-->
          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php include 'includes/footer.php'; ?>