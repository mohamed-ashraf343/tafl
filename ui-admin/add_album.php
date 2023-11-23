<?php 
  $activeNav = 'img_gallery' ;
  include 'includes/header.php';
 ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New Gallery Album
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-md-1"></div>  
          <div class="col-md-9">
            <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'Gallery Album Created Successfully' ;
                    alert('add_album', 'success', 'alert-success', 'fa-check', $msg )  ;
                  ?>

                  <?php 
                    $msg = 'This Album Is Already Exist' ;
                    alert('exist_album', 'danger', 'alert-danger', 'fa-ban', $msg )  ;
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
                        <label for="title">Album Name</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Album Title" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label for="title">Album Name-en</label>
                        <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Album Title English" autocomplete="off">
                      </div>
                      
                      <div class="form-group">
                        <label for="main_img">Cover Image</label>
                        <input type="file" name="main_img" id="main_img" required='required'>
                        <div style="color:red; margin-left:5px">Prefered 800 * 600</div>
                      </div>
                      
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> Create Album</button>
                    </div><!-- /.box-footer -->
                </form>

               </div><!-- /.box -->
               
                 
              <?php 
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                  /*Connect To Database*/
                  include 'includes/config.php';

                  
                  $title      = $_POST['title'] ;
                  $title_en   = $_POST['title_en'] ;
                  $album_path = '../images/uploads';
                  
                  //--- Main image-----------------------------

                  $main_image      = $_FILES["main_img"]["name"] ;

                  $main_image_tmp  = $_FILES["main_img"]["tmp_name"];

                  $main_image_size = $_FILES["main_img"]["size"];

                  $main_image_type = $_FILES["main_img"]["type"];

                  $main_image_dir    = $album_path."/" ;


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

                       /*Check If User Exist In Database*/
                      $checkCount = checkItem("album_title","gallery_albums", $title) ;
                      
                      if($checkCount == 1 ){

                          /* echo "<div class='alert alert-danger'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <i class='icon fa fa-ban'></i> This Album Is Already Exist
                            </div>" ;*/

                            $_SESSION['exist_album'] = 1 ;
                            header("location:add_album.php");

                      }else{

                            /*Create folder if not exist*/
                            if (!file_exists($album_path)) {
                                mkdir($album_path, 0777, true);
                            }


                            $main_image  = date("jnYGis")."_".$main_image;


                            move_uploaded_file($main_image_tmp, $main_image_dir.$main_image) ;      //upload full image 


                            
                            /*insert image to database*/

                            $stmt = $conn->prepare("INSERT INTO 
                                                        gallery_albums ( album_title, album_title_en, album_cover_img, create_date )
                                                    VALUES ( ?, ?, ?, now()) ");

                            $success = $stmt->execute(array( $title, $title_en, $main_image) ) ;
                            
                            if($success){

                                $_SESSION['add_album'] = 1 ;
                                header("location:add_album.php");
                                
                            }  
                        }
                  }
                 
                }   
                ?>

            </div><!--/.col-->
          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php include 'includes/footer.php'; ?>