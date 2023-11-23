<?php 
  $activeNav = 'news' ;
  include 'includes/header.php';
 ?>
 

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            ادارة الأخبار
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <style>
                @media only screen and (min-width: 991px) {
                 .controls {
                   width:300px;
                  }
                  .newsdate{
                    width: 100px;
                  }
                }
                </style>

            <div class="col-md-12">
              <div class="col-md-4">
                <a href="add_news.php" class="btn btn-primary add_user"><i class="fa fa-plus"></i> اضافة خبر جديد</a>
              </div>
              <div class="col-md-8">
                  <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'تم الحذف بنجاح' ;
                    alert('delete_news', 'success', 'alert-success', 'fa-check', $msg )  ;
                  ?>

                  <!-- End Alerts Messages -->
              </div>
              <br><br><br>
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">كل الاخبار</h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding-top: 10px;">
                  <table class="table table-bordered direction">
                    <tr>
                      <th>#</th>
                      <th></th>
                      <th>عنوان الخبر</th>
                      <th>تاريخ الخبر</th>
                      <th>التحكم</th>
                    </tr>
                    
                      <?php 

                        include 'includes/config.php'; /*Connect to DB*/

                        $stmt = $conn->prepare('SELECT * FROM news ORDER BY publish_date DESC') ;
                        $stmt->execute();
                        $i = 0;
                        while ($row = $stmt->fetch() ) {
                          $i++;
                        ?>
                           <tr>
                            <td><?php echo $i ;?></td>
                            <td><img class="img-thumbnail" width="90" src="../images/news_uploads/<?php echo $row['main_image'] ;?> " > </td>
                            <td><?php echo $row['title'] ;?></td>
                            <td class="newsdate"><?php echo $row['publish_date'] ;?></td>
                            <td class="controls">
                              <a href="news_photos.php?articleid=<?php echo $row['news_id'] ?>" class="btn btn-success"><i class="fa fa-edit"></i> صور الخبر</a>
                              <a href="update_news.php?do=update&nid=<?php echo $row['news_id'] ?>" class="btn btn-success"><i class="fa fa-edit"></i> تعديل</a>
                              <a href="?do=delete&nid=<?php echo $row['news_id'];?>&main_img=<?php echo $row['main_image'];?>" class="btn btn-danger confirm"><i class="fa fa-trash"></i> حذف</a>
                            </td>
                          </tr>
                        <?php
                        }
                      ?>

                  </table>

                </div><!-- /.box-body -->

              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <?php

        if (isset($_GET['do']) && $_GET['do'] == 'delete') {

            $news_id = $_GET['nid'] ;
            
            /*Delete Image From Database*/

            $stmt = $conn->prepare('DELETE FROM news WHERE news_id = :n_id ') ;
            $stmt->bindParam("n_id", $news_id) ;
            $success = $stmt->execute() ;
            

            /*Delete Image From Folder*/

            $mainImg  = "../images/news_uploads/".$_GET['main_img'];

            @unlink($mainImg) ;

            if($success){

              $_SESSION['delete_news'] = 1 ;
              header("location:news-panel.php");
            }
              
            
        }

      ?>


     <?php include 'includes/footer.php'; ?>