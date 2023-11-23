 <?php 
  $activeNav = 'img_gallery' ;
  include 'includes/header.php';
 ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Gallery Album
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-1"></div>  
            <div class="col-md-9">
              <!-- Start Alerts Messages -->
              
                    <?php 
                      $msg = 'Album Updated Successfully' ;
                      alert('update_album', 'success', 'alert-success', 'fa-check', $msg )  ;
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

                  $albumID = isset($_GET['albumid']) && is_numeric($_GET['albumid']) ? intval($_GET['albumid']) : 0 ;

                  $checkCount = checkItem("album_id","gallery_albums", $albumID) ;

                  if($checkCount > 0) {

                    $stmt = $conn->prepare('SELECT * FROM gallery_albums WHERE album_id = ? ');
                    $stmt->execute( array($albumID) );
                    $row = $stmt->fetch();
                 ?>

                  <div class="clearfix"></div>
                  <!-- form start -->
                 
                  <form role="form" class="form1" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="box-body">

                      <input type="hidden" name="a_id" value="<?php echo $row['album_id'] ?>" >

                      <div class="form-group">
                        <label for="img_title">Album Name</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['album_title'] ?>" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label for="img_title">Album Name-en</label>
                        <input type="text" class="form-control" name="title_en" id="title_en" value="<?php echo $row['album_title_en'] ?>" autocomplete="off">
                      </div>
                    
                      <div class="form-group col-md-9">
                        <label for="main_img">Main Image </label>
                        <input type="file" name="main_img" id="main_img">
                        <div style="color:red; margin-left:5px">Prefered 800 * 600</div>
                      </div>

                      <div class="col-md-3">
                         <img class="img-thumbnail" width="150" src="../images/uploads/<?php echo $row['album_cover_img'];?> " >
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
                        ?>
                          <div class="alert alert-danger" style="margin-top:20px;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon fa fa-ban"></i>
                          This ID is not found
                        </div>
                        <?php
                      }
                  ?>

               </div><!-- /.box -->


              <?php 
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                  /*Connect To Database*/
                  include 'includes/config.php';

                  $a_id           = $_POST['a_id'];
                  $title          = $_POST['title'];
                  $title_en       = $_POST['title_en'];
                  // $old_album_path = '../images/gallery/'.$row['album_title'];
                  $album_path     = '../images/uploads';
                  $old_main_img   = $row['album_cover_img'];
                  
                  // rename($old_album_path, $album_path) ;

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

                  $main_image_dir    = $album_path."/" ;
                  
                  
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
                        if (!file_exists($album_path)) {
                            mkdir($album_path, 0777, true);
                        }

                        $new_main_image  = date("jnYGis")."_".$main_image;

                        @unlink($main_image_dir.$old_main_img);

                        move_uploaded_file($main_image_tmp, $main_image_dir.$new_main_image) ;      //upload main image 
                      }

                  } else {

                    $new_main_image = $old_main_img ;
                  }

                    
                    /*Update news into database*/

                    $stmt = $conn->prepare("UPDATE gallery_albums SET 
                                            album_title  = ?, album_title_en  = ?, album_cover_img = ?
                                            WHERE album_id = ? ");

                    $success = $stmt->execute(array( $title, $title_en, $new_main_image, $a_id) ) ;
                    
                    if($success){

                        $_SESSION['update_album'] = 1 ;
                        header("location:?do=update&albumid=".$a_id);
                        
                    }  

                  }
                 
                ?>

            </div><!--/.col-->

          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php include 'includes/footer.php'; ?>