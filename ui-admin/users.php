<?php 
  
  $activeNav = 'users' ;
  include 'includes/header.php';
 ?>

<?php 
  if ($_SESSION['userType'] !== 'superadmin') {
    header("location:dashboard.php") ;
    exit();
  }
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            التحكم فى المستخدمين
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
           
            <div class="col-md-12">

              <div class="col-md-6">
                <a href="add-user.php" class="btn btn-primary add_user"><i class="fa fa-plus"></i> اضافة جديد</a>
              </div>
              <div class="col-md-6">
                  <!-- Start Alerts Messages -->
            
                  <?php 
                    $msg = 'User Deleted Successfully' ;
                    alert('delete_user', 'success', 'alert-success', 'fa-check', $msg )  ;
                  ?>

                  <!-- End Alerts Messages -->
              </div>
              <br><br><br>
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">All Users</h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding-top: 10px;">
                  <table class="table table-bordered direction">
                    <tr>
                      <th>#ID</th>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>User Type</th>
                      <th>Registration Date</th>
                      <th>Control</th>
                    </tr>
                    
                      <?php 

                        include 'includes/config.php'; /*Connect to DB*/

                        $stmt = $conn->prepare("SELECT * FROM users ORDER BY userType DESC") ;
                        $stmt->execute();
                        $i = 0;
                        while ($row = $stmt->fetch() ) {
                           $i++;
                        ?>
                           <tr>
                            <td><?php echo $i ;?></td>
                            <td><?php echo $row['username'] ;?></td>
                            <td><?php echo $row['first_name']. ' ' . $row['last_name'];?></td>
                            <td><?php echo $row['email'] ;?></td>
                            <td><?php echo $row['userType'] ;?></td>
                            <td><?php echo $row['registration_date'] ;?></td>
                            <td>
                              <a href="update-user.php?do=update&userid=<?php echo $row['userID'] ?>" class="btn btn-success"><i class="fa fa-edit"></i> تعديل</a>
                              <a href="?do=delete&userid=<?php echo $row['userID'] ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i> حذف</a>
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
            
            $userID = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

              $checkCount = checkItem("userID","users", $userID) ;
                      
              if($checkCount > 0 ){

                $stmt = $conn->prepare('DELETE FROM users WHERE userID = :zuser ') ;
                $stmt->bindParam("zuser", $userID) ;
                $success = $stmt->execute() ;
                
                if($success){

                  $_SESSION['delete_user'] = 1 ;
                  header("location:users.php");
                }
                  
            }else{

                echo "This ID is Not Exist";
            }
        }

      ?>


     <?php include 'includes/footer.php'; ?>