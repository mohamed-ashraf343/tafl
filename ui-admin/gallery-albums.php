<?php 
  $activeNav = 'img_gallery' ;
  include 'includes/header.php';
 ?>
 

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Gallery Albums
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-1"></div>

            <div class="col-md-10">
              <div class="col-md-4">
                <a href="add_album.php" class="btn btn-primary add_user"><i class="fa fa-plus"></i> Add New Albums</a>
              </div>
              <div class="col-md-8">
                  <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'Album Deleted Successfully' ;
                    alert('delete_album', 'success', 'alert-success', 'fa-check', $msg )  ;
                  ?>

                  <!-- End Alerts Messages -->
              </div>
              <br><br><br>
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">All Gallery Albums</h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding-top: 10px;">
                  <table class="table table-bordered gallery_tbl">
                    <tr>
                      <th>#ID</th>
                      <th>Cover image</th>
                      <th>Album Name</th>
                      <th>Date</th>
                      <th>Controls</th>
                    </tr>
                    
                      <?php 

                        include 'includes/config.php'; /*Connect to DB*/

                        $stmt = $conn->prepare('SELECT * FROM gallery_albums') ;
                        $stmt->execute();
                        $i = 0;
                        while ($row = $stmt->fetch() ) {
                          $i++;
                        ?>
                           <tr>
                            <td><?php echo $i ;?></td>
                            <td><img class="img-thumbnail" width="90" src="../images/uploads/<?php echo $row['album_cover_img'];?> " > </td>
                            <td><?php echo $row['album_title'] ;?></td>
                            <td><?php echo $row['create_date'] ;?></td>
                            <td>
                              <a href="gallery-image.php?albumid=<?php echo $row['album_id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i> View images</a>
                              <a href="update_gallery_album.php?do=update&albumid=<?php echo $row['album_id'] ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                              <a href="?do=delete&albumid=<?php echo $row['album_id'];?>&title=<?php echo $row['album_title'];?>" class="btn btn-danger confirm"><i class="fa fa-close"></i> Delete</a>
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

            $album_id = $_GET['albumid'] ;
            
            /*Delete Image From Database*/

            $stmt = $conn->prepare('DELETE FROM gallery_albums WHERE album_id = :a_id ') ;
            $stmt->bindParam("a_id", $album_id) ;
            $success = $stmt->execute() ;

            $stmt = $conn->prepare('DELETE FROM gallery_images WHERE image_album = :a_id ') ;
            $stmt->bindParam("a_id", $album_id) ;
            $success = $stmt->execute() ;
            

            /*Delete Album From Folder*/

            $album  = "../images/gallery/".$_GET['title'];

            $images = array_filter(glob($album.'/*'), 'is_file');

            foreach( $images as $file)
              {
                @unlink($file);
              }

            @rmdir($album);

              $_SESSION['delete_album'] = 1 ;
              header("location:gallery-albums.php");              
            
        }

      ?>


     <?php include 'includes/footer.php'; ?>