 <?php 
  $activeNav = 'slider' ;
  include 'includes/header.php';
 ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Slide 
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-1"></div>  
            <div class="col-md-9">
              <!-- Start Alerts Messages -->
              
                    <?php 
                      $msg = 'Slide Updated Successfully' ;
                      alert('update_slide', 'success', 'alert-success', 'fa-check', $msg )  ;
                    ?>

                    <!-- End Alerts Messages -->
            </div>
            <div class="clearfix "></div>

            <div class="col-md-1"></div>

            <div class="col-md-9">
               <div class="box box-info">
                  
                  <?php
                 /*Connect To Database*/
                  include 'includes/config.php';

                  $slideID = isset($_GET['sid']) && is_numeric($_GET['sid']) ? intval($_GET['sid']) : 0 ;

                  $checkCount = checkItem("id","slider", $slideID) ;

                  if($checkCount > 0) {

                    $stmt = $conn->prepare('SELECT * FROM slider WHERE id = ? ');
                    $stmt->execute( array($slideID) );
                    $row = $stmt->fetch();
                 ?>

                  <div class="clearfix"></div>
                  <!-- form start -->
                  
                  <form role="form" class="form1" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="box-body">

                      <input type="hidden" name="sid" value="<?php echo $row['id'] ?>" >

                     

                      <div class="form-group">
                        <label for="head_ar">Header Arabic</label>
                        <input type="text" class="form-control" name="head_ar" id="head_ar" value="<?php echo $row['head_ar']?>" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label for="head_en">Header English</label>
                        <input type="text" class="form-control" name="head_en" id="head_en" value="<?php echo $row['head_en'] ?>" autocomplete="off">
                      </div>
                    
                      <div class="form-group col-md-9">
                        <label for="main_img">Slide Image </label>
                        <input type="file" name="main_img" id="main_img">
                        <div style="color:red; margin-left:5px">Prefered 1920 * 850</div>
                      </div>
                      <div class="col-md-3">
                         <img class="img-thumbnail" src="../images/slider/<?php echo $row['slide_image'] ;?> " >
                      </div>

                      <div class="clearfix "></div>
                      
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Save</button>
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

                  $s_id          = $_POST['sid'];
                  $head_ar    = $_POST['head_ar'] ;
                  $head_en   = $_POST['head_en'] ;
                  $old_main_img  = $row['slide_image'];
                  

                  $maxsize    = 7340032;     //max image size 7 Mega Byte

                  $acceptable = array(       //upload types  
                      'image/jpeg',
                      'image/jpg',
                      'image/gif',
                      'image/png'
                  );
  
                  
                  //--- Main image-----------------------------

                  $main_image      = $_FILES["main_img"]["name"] ;

                  $main_image_tmp  = $_FILES["main_img"]["tmp_name"];

                  $main_image_size = $_FILES["main_img"]["size"];

                  $main_image_type = $_FILES["main_img"]["type"];

                  $image_path = "../images/slider" ;

                  $main_image_dir    = $image_path."/" ;


                  /*check if upload new main image or not*/
                  if ($main_image != "") {
                    
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

                        $new_main_image  = date("jnYGis")."_".$main_image;

                        @unlink($main_image_dir.$old_main_img);

                        move_uploaded_file($main_image_tmp, $main_image_dir.$new_main_image) ;      //upload main image 
                      }

                  } else {

                    $new_main_image = $old_main_img ;
                  }

                    
                    /*Update news into database*/

                    $stmt = $conn->prepare("UPDATE slider SET 
                                            slide_image  = ?, head_ar = ?, head_en = ?
                                            WHERE id = ? ");

                    $success = $stmt->execute(array( $new_main_image, $head_ar, $head_en, $s_id) ) ;
                    
                    if($success){

                        $_SESSION['update_slide'] = 1 ;
                        header("location:?do=update&sid=".$s_id);
                        
                    }  

                  }
                 
                ?>

            </div><!--/.col-->

          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php include 'includes/footer.php'; ?>