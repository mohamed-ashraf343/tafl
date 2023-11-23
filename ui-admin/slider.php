<?php 
  $activeNav = 'slider' ;
  include 'includes/header.php';
 ?>
 

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Slider
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-1"></div>

            <div class="col-md-10">
              <div class="col-md-4">
                <a href="add_slide.php" class="btn btn-primary add_user"><i class="fa fa-plus"></i> Add New Slide</a>
              </div>
              <div class="col-md-8">
                  <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'Slide Deleted Successfully' ;
                    alert('delete_slide', 'success', 'alert-success', 'fa-check', $msg )  ;
                  ?>

                  <!-- End Alerts Messages -->
              </div>
              <br><br><br>
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">All Slides</h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding-top: 10px;">
                  <table class="table table-bordered gallery_tbl">
                    <tr>
                      <th>#ID</th>
                      <th>Slide Photo</th>
                      <th>Header Arabic</th>
                      <th>Header English</th>
                      <th>Controls</th>
                    </tr>
                    
                      <?php 

                        include 'includes/config.php'; /*Connect to DB*/

                        $stmt = $conn->prepare('SELECT * FROM slider') ;
                        $stmt->execute();
                        $i = 0;
                        while ($row = $stmt->fetch() ) {
                          $i++;
                        ?>
                           <tr>
                            <td><?php echo $i ;?></td>
                            <td><img class="img-thumbnail" width="90" src="../images/slider/<?php echo $row['slide_image'] ;?> " > </td>
                            <td><?php echo $row['head_ar'] ;?></td>
                            <td><?php echo $row['head_en'] ;?></td>
                            <td>
                              <a href="update_slide.php?do=update&sid=<?php echo $row['id'] ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                              <a href="?do=delete&sid=<?php echo $row['id'];?>&main_img=<?php echo $row['slide_image'];?>" class="btn btn-danger confirm"><i class="fa fa-close"></i> Delete</a>
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

            $slide_id = $_GET['sid'] ;
            
            /*Delete Image From Database*/

            $stmt = $conn->prepare('DELETE FROM slider WHERE id = :s_id ') ;
            $stmt->bindParam("s_id", $slide_id) ;
            $success = $stmt->execute() ;
            

            /*Delete Image From Folder*/

            $mainImg  = "../images/flexslider/".$_GET['main_img'];

            @unlink($mainImg) ;

            if($success){

              $_SESSION['delete_slide'] = 1 ;
              header("location:slider.php");
            }
              
            
        }

      ?>


     <?php include 'includes/footer.php'; ?>