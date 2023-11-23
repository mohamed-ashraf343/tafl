<?php 
  $activeNav = 'slider' ;
  include 'includes/header.php';
 ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New Slide
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-md-1"></div>  
          <div class="col-md-9">
            <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'Slide Added Successfully' ;
                    alert('add_slide', 'success', 'alert-success', 'fa-check', $msg )  ;
                  ?>

                  <!-- End Alerts Messages -->
          </div>
          <div class="clearfix "></div>

            <div class="col-md-1"></div>

             <div class="col-md-9">
               <div class="box box-info">
                  

                  <?php
                  if (!file_exists('../images/slider')) {
                      mkdir('../images/slider', 0777, true);
                  }
                 ?>

                  <!-- form start -->
                
                  <form role="form" class="form1" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="box-body">
                      
                      <div class="form-group">
                        <label for="main_img">Slide Photo </label>
                        <input type="file" name="main_img" id="main_img" required='required'>
                        <div style="color:red; margin-left:5px">Prefered 1920 * 850</div>
                      </div>

                      <div class="form-group">
                        <label for="head_ar">Header Arabic</label>
                        <input type="text" class="form-control" name="head_ar" id="head_ar" placeholder="Arabic Header" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label for="head_en">Header English</label>
                        <input type="text" class="form-control" name="head_en" id="head_en" placeholder="English Header" autocomplete="off">
                      </div>
                      
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> Publish</button>
                    </div><!-- /.box-footer -->
                </form>

               </div><!-- /.box -->
               
                 
              <?php 
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                  /*Connect To Database*/
                  include 'includes/config.php';

                  
                  $head_ar  = $_POST['head_ar'] ;

                  $head_en = $_POST['head_en'] ;

                  
                  //--- Main image-----------------------------

                  $main_image      = $_FILES["main_img"]["name"] ;

                  $main_image_tmp  = $_FILES["main_img"]["tmp_name"];

                  $main_image_size = $_FILES["main_img"]["size"];

                  $main_image_type = $_FILES["main_img"]["type"];

                  $image_path = "../images/slider/" ;

                  $main_image_dir    = $image_path."/" ;

                  


                  $maxsize    = 7340032;     //max image size 7 Mega Byte

                  $acceptable = array(       //upload types  
                      'image/jpeg',
                      'image/jpg',
                      'image/gif',
                      'image/png'
                  );


                  /*Check Errors*/

                  $formErrors = array() ;

                  if( ($main_image_size >= $maxsize) ) {
                     $formErrors[] = 'Main image too large. File must be less than 7 megabytes.' ;
                  }


                  if( ($main_image_size == 0) ) {
                     $formErrors[] = 'Main image has no size.' ;
                  }

                  if( !in_array( $main_image_type, $acceptable ) ) {
                     $formErrors[] = 'Invalid main image type. Only JPG, JPEG, GIF and PNG types are accepted.' ;
                  }

                  foreach ($formErrors as $error) {
                    echo "<div class='alert alert-danger'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <i class='icon fa fa-ban'></i>
                        " . $error . "</div>" ;
                  }      


                  if(empty($formErrors)){

                    /*Create folder if not exist*/
                    if (!file_exists($image_path)) {
                        mkdir($image_path, 0777, true);
                    }


                    $main_image  = date("jnYGis")."_".$main_image;


                    move_uploaded_file($main_image_tmp, $main_image_dir.$main_image) ;      //upload full image 


                    
                    /*insert image to database*/

                    $stmt = $conn->prepare("INSERT INTO 
                                                slider ( slide_image, head_ar, head_en )
                                            VALUES ( ?, ?, ?) ");

                    $success = $stmt->execute(array( $main_image, $head_ar, $head_en,) ) ;
                    
                    if($success){

                        $_SESSION['add_slide'] = 1 ;
                        header("location:add_slide.php");
                        
                    }  

                  }
                 
                }   
                ?>

            </div><!--/.col-->
          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
     <?php include 'includes/footer.php'; ?>