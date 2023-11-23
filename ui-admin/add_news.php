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
             اضافة خبر جديد
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-md-1"></div>  
          <div class="col-md-9">
            <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'تم الاضافة بنجاح' ;
                    alert('add_news', 'success', 'alert-success', 'fa-check', $msg )  ;
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
                 
                  <!-- form start -->
                 <?php
                  if (!file_exists('../images/news_uploads')) {
                      mkdir('../images/news_uploads', 0777, true);
                  }
                 ?>
                  <form role="form" class="form1" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="" >
                      </div>

                      <div class="form-group">
                        <label for="title">العنوان - en</label>
                        <input type="text" class="form-control" name="title_en" id="title_en" placeholder="" >
                      </div>
                        
                      <!-- <div class="form-group">
                        <label for="title" style="direction:rtl">slug <span style="font-size:11px;color:red">(العنوان بالانجليزية للعرض فى رابط الصفحة)</span></label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="slug"  required='required'>
                      </div> -->

                      <div class="form-group">
                        <label>التفاصيل</label>
                        <textarea class="form-control ckeditor" name="details" id="details" required='required'></textarea>
                      </div>

                      <div class="form-group">
                        <label>التفاصيل - en</label>
                        <textarea class="form-control ckeditor" name="details_en" id="details_en" required='required'></textarea>
                      </div>
                        
                      <div class="form-group">
                        <label>تاريخ الخبر</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="publish_date" class="form-control pull-right" id="datepicker"  >
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="main_img">الصورة</label>
                        <input type="file" name="main_img" id="main_img" required='required'>
                        
                      </div>
                      
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> نشــر</button>
                    </div><!-- /.box-footer -->
                </form>

               </div><!-- /.box -->
               
                
              <?php 
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                  /*Connect To Database*/
                  include 'includes/config.php';



                  
                  $title            = $_POST['title'] ; 
                  $title_en         = $_POST['title_en'] ; 
                  $details          = $_POST['details'] ;
                  $details_en       = $_POST['details_en'] ;
                  $publish_date     = $_POST['publish_date'] ;
                  // $slug             =  $_POST['slug'];
                 
                  // $slug_update = strtolower(str_replace(' ', '-',  $slug));
                  // $stmt1 = $conn->prepare("SELECT * FROM news WHERE LOWER(REPLACE(slug,' ', '-' )) = ? ");

                  // $stmt1->execute(array($slug_update)) ;
                  // $slug_count = $stmt1->rowCount();
                  // if($slug_count > 0) {
                  //   $_SESSION['slug_found'] = 1 ;
                  //   header("location:add_news.php");
                  //   exit();
                  // }
                  
                  //--- Main image-----------------------------

                  $main_image      = $_FILES["main_img"]["name"] ;

                  $main_image_tmp  = $_FILES["main_img"]["tmp_name"];

                  $main_image_size = $_FILES["main_img"]["size"];

                  $main_image_type = $_FILES["main_img"]["type"];

                  $main_image_dir    = "../images/news_uploads/" ;


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
                    if (!file_exists('../images/news_uploads')) {
                        mkdir('../images/news_uploads', 0777, true);
                    }


                    $main_image  = date("jnYGis")."_".$main_image;


                    move_uploaded_file($main_image_tmp, $main_image_dir.$main_image) ;      //upload full image 


                    
                    /*insert image to database*/

                    $stmt = $conn->prepare("INSERT INTO 
                                                news ( title, title_en, details, details_en, main_image, publish_date )
                                            VALUES ( ?, ?, ?, ?, ?, ?) ");

                    $success = $stmt->execute(array( $title, $title_en, $details, $details_en, $main_image, $publish_date) ) ;
                    
                    if($success){

                        $_SESSION['add_news'] = 1 ;
                        header("location:add_news.php");
                        
                    }  

                  }
                 
                }   
                ?>

            </div><!--/.col-->
          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
     <?php include 'includes/footer.php'; ?>