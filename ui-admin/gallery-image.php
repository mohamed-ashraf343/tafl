<?php 
  $activeNav = 'img_gallery' ;
  include 'includes/header.php';
 ?>
 

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Gallery Albums Images
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-1"></div>

            <div class="col-md-10">
               <div class="col-md-4">
                <a href="gallery-albums.php" class="btn btn-primary add_user"><i class="fa fa-reply"></i> Back To Albums</a>
              </div>  
              <div class="col-md-8">
                  <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'Image Deleted Successfully' ;
                    alert('delete_image', 'success', 'alert-success', 'fa-check', $msg )  ;
                  ?>

                  <!-- End Alerts Messages -->
              </div>
              <br><br><br>

              <?php 
              $albumID = isset($_GET['albumid']) && is_numeric($_GET['albumid']) ? intval($_GET['albumid']) : 0 ;

              include 'includes/config.php'; 

              $checkCount = checkItem("album_id","gallery_albums", $albumID) ;

              if($checkCount > 0) {
              ?>
                  <div class="box">
                    <div class="box-header with-border">
                    <?php
                      include 'includes/config.php'; /*Connect to DB*/
                      $stmt = $conn->prepare('SELECT * FROM gallery_albums WHERE album_id = ?') ;
                      $stmt->execute( array( $albumID ));
                      $row = $stmt->fetch();
                    ?>
                      <h3 class="box-title">All Images in ( <span style='color:red'><?php echo $row['album_title'] ?></span> )</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body" style="padding-top: 10px;">
                      <table class="table table-bordered gallery_tbl">
                        <tr>
                          <th>#ID</th>
                          <th>images</th>
                          <th>image Date</th>
                          <th>Controls</th>
                        </tr>
                        
                          <?php 

                            include 'includes/config.php'; /*Connect to DB*/

                            $stmt = $conn->prepare('SELECT * FROM gallery_albums a, gallery_images b 
                                                    WHERE a.album_id = b.image_album 
                                                    AND  a.album_id ='. $albumID) ;
                            $stmt->execute();
                            $i = 0;
                            while ($row = $stmt->fetch() ) {
                              $i++;
                            ?>
                               <tr>
                                <td><?php echo $i ;?></td>
                                <td><img class="img-thumbnail" width="90" src="../images/uploads/<?php echo $row['image_name'];?> " > </td>
                                <td><?php echo $row['date_created'] ;?></td>
                                <td>
                                  <a href="?do=delete&imgid=<?php echo $row['image_id'];?>&img=<?php echo $row['image_name'];?>&album_id=<?php echo $row['album_id'];?>&album=<?php echo $row['album_title'];?>" class="btn btn-danger confirm"><i class="fa fa-close"></i> Delete</a>
                                </td>
                              </tr>
                            <?php
                            }
                          ?>

                      </table>

                    </div><!-- /.box-body -->

                  </div><!-- /.box -->
              <?php
                  }else
                  {
                    echo "<h2> This Album ID is not found</h2>" ;
                  }
              ?>    
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <?php

        if (isset($_GET['do']) && $_GET['do'] == 'delete') {

            $image_id = $_GET['imgid'] ;
            
            /*Delete Image From Database*/

            $stmt = $conn->prepare('DELETE FROM gallery_images WHERE image_id = :img_id ') ;
            $stmt->bindParam("img_id", $image_id) ;
            $success = $stmt->execute() ;
            

            /*Delete Image From Folder*/
            $mainImg  = "../images/gallery/".$_GET['album']."/".$_GET['img'];

            @unlink($mainImg) ;

            if($success){

              $_SESSION['delete_image'] = 1 ;
              header("location:gallery-image.php?albumid=".$_GET['album_id']);
            }
              
            
        }

      ?>


     <?php include 'includes/footer.php'; ?>