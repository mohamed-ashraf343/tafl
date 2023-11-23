 <?php 
  $activeNav = 'news' ;
  include 'includes/header.php';
 ?>
 <style>
    #slug_found{
      direction: rtl;
    }
  </style>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           تعديل الخبر
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-1"></div>  
            <div class="col-md-9">
              <!-- Start Alerts Messages -->
              
                    <?php 
                      $msg = 'تم التحديث بنجـــاح' ;
                      alert('update_news', 'success', 'alert-success', 'fa-check', $msg )  ;
                    ?>

                  <?php 
                    $msg = 'عنوان ال slug موجود مسبقا' ;
                    alert('slug_found', 'slug_found', 'alert-danger', 'fa-check', $msg )  ;
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

                  $newsID = isset($_GET['nid']) && is_numeric($_GET['nid']) ? intval($_GET['nid']) : 0 ;

                  $checkCount = checkItem("news_id","news", $newsID) ;

                  if($checkCount > 0) {

                    $stmt = $conn->prepare('SELECT * FROM news WHERE news_id = ? ');
                    $stmt->execute( array($newsID) );
                    $row = $stmt->fetch();
                 ?>

                  <div class="clearfix"></div>
                  <!-- form start -->
                  
                  <form role="form" class="form1" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="box-body">

                      <input type="hidden" name="nid" value="<?php echo $row['news_id'] ?>" >

                      <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title'] ?>" autocomplete="off" required="required">
                      </div>
                      
                     
                      <div class="form-group">
                        <label for="title">العنوان - en</label>
                        <input type="text" class="form-control" name="title_en" value="<?php echo $row['title_en'] ?>" id="title_en" placeholder="" >
                      </div>
                        
                      <div class="form-group">
                        <label>التفاصيل</label>
                        <textarea class="form-control ckeditor" name="details" id="details" required="required"><?php echo $row['details']; ?></textarea>
                      </div>

                      <div class="form-group">
                        <label>التفاصيل</label>
                        <textarea class="form-control ckeditor" name="details_en" id="details_en" required="required"><?php echo $row['details_en']; ?></textarea>
                      </div>
                        
                      <div class="form-group">
                        <label>تاريخ الخبر</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="publish_date" value="<?= $row['publish_date']?>" class="form-control pull-right" id="datepicker" autocomplete="off" required="required">
                        </div>
                      </div>
                    
                      <div class="form-group col-md-9">
                        <label for="main_img">الصورة </label>
                        <input type="file" name="main_img" id="main_img">
                      </div>
                      <div class="col-md-3">
                         <img class="img-thumbnail" width="150" src="../images/news_uploads/<?php echo $row['main_image'] ;?> " >
                      </div>

                      <div class="clearfix "></div>
                      
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> حفظ</button>
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

                  $n_id         = $_POST['nid'];
                  $title        = $_POST['title'] ; 
                  $title_en     = $_POST['title_en'] ; 
                  
                  // $slug         = filter_var( $_POST['slug'], FILTER_SANITIZE_STRING );

                  $details      = $_POST['details'];
                  $details_en   = $_POST['details_en'] ;

                  $old_main_img = $row['main_image'];
                  $publish_date = $_POST['publish_date'] ;

                  // $slug_update = strtolower(str_replace(' ', '-',  $slug));
                  // $stmt1 = $conn->prepare("SELECT * FROM news WHERE LOWER(REPLACE(slug,' ', '-' )) = ? AND news_id != ? ");

                  // $stmt1->execute(array($slug_update, $n_id)) ;
                  // $slug_count = $stmt1->rowCount();
                  // if($slug_count > 0) {
                  //   $_SESSION['slug_found'] = 1 ;
                  //   header("location:?do=update&nid=".$n_id);
                  //   exit();
                  // }

                  

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

                  $main_image_dir    = "../images/news_uploads/" ;


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
                        if (!file_exists('../images/news_uploads')) {
                            mkdir('../images/news_uploads', 0777, true);
                        }

                        $new_main_image  = date("jnYGis")."_".$main_image;

                        @unlink($main_image_dir.$old_main_img);

                        move_uploaded_file($main_image_tmp, $main_image_dir.$new_main_image) ;      //upload main image 
                      }

                  } else {

                    $new_main_image = $old_main_img ;
                  }

                    
                    /*Update news into database*/
                	if (isset($new_main_image)) {
                		
                	
                    $stmt = $conn->prepare("UPDATE news SET 
                                            title  = ?, title_en  = ?, details = ?, details_en = ?, main_image = ?, publish_date = ?
                                            WHERE news_id = ? ");

                    $success = $stmt->execute(array( $title, $title_en, $details, $details_en, $new_main_image, $publish_date, $n_id) ) ;
                    
                    if($success){

                        $_SESSION['update_news'] = 1 ;
                        header("location:?do=update&nid=".$n_id);
                        
                    }  
                }

              }
                 
                ?>

            </div><!--/.col-->

          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php include 'includes/footer.php'; ?>