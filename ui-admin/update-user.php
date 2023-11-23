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
            Update Users
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
             <div class="col-md-2"></div>

             <div class="col-md-7">
              <!-- Start Alerts Messages -->
            
              <?php 
                $msg = 'User Updated Successfully' ;
                alert('update_user', 'success', 'alert-success', 'fa-check', $msg )  ;
              ?>

              <!-- End Alerts Messages -->

            </div>   
            <div class="clearfix "></div>

             <div class="col-md-2"></div>

             <div class="col-md-7">
               <div class="box box-info">
                 
                 <?php
                 /*Connect To Database*/
                  include 'includes/config.php';

                  $userID = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

                  $checkCount = checkItem("userID","users", $userID) ;

                  if($checkCount > 0) {

                    $stmt = $conn->prepare('SELECT * FROM users WHERE userID = ? ');
                    $stmt->execute( array($userID) );
                    $row = $stmt->fetch();
                 ?>
                 
                  <!-- form start -->
                  <form class="form-horizontal" id="addForm" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <div class="box-body">
                      
                      <input type="hidden" name="u_id" value="<?php echo $row['userID'] ?>" >
                      
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Username:</label>
                        <div class="col-sm-10">
                          <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username" autocomplete="off" required='required'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Password:</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="new-password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">First name:</label>
                        <div class="col-sm-10">
                          <input type="text" name="fname" value="<?php echo $row['first_name'] ?>" class="form-control" placeholder="Enter First Name" autocomplete="off" required='required'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Last Name:</label>
                        <div class="col-sm-10">
                          <input type="text" name="lname" value="<?php echo $row['last_name'] ?>" class="form-control" placeholder="Enter Last Name" autocomplete="off" required='required'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email" autocomplete="off" required='required'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">User Type</label>
                        <div class="col-sm-4">
                          <select name="user_type" class="form-control" id="user_type" required>
                            <option value="">Choose User Type</option>
                            <option value="superadmin" 
                              <?php if( $row['userType'] == 'superadmin') { ?> selected <?php } ?> >
                                Super Admin
                            </option>
                            <option value="admin"
                              <?php if( $row['userType'] == 'admin') { ?> selected <?php } ?> >
                                Admin
                            </option>
                          </select>
                        </div>
                      </div>

                    </div><!-- /.box-body -->

                   
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Save</button>
                    </div><!-- /.box-footer -->
                  </form>
                  <?php
                     }
                     else{
                      echo "<h2> This user is not found</h2>" ;
                     }
                  ?>
               </div><!-- /.box -->
                

              <?php 
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                  /*Connect To Database*/
                  include 'includes/config.php';

                  $id         = $_POST['u_id'] ; 
                  $username   = $_POST['username'] ;
                  $firstname  = $_POST['fname'] ;
                  $lastname   = $_POST['lname'] ;
                  $email      = $_POST['email'] ;
                  $oldPass    = $row['password'] ;

                  $password = empty($_POST['password']) ? $oldPass :  sha1($_POST['password']) ;
                  $user_type      = $_POST['user_type'];

                  
                   /*Array of Errors*/ 

                   $formErrors = array() ;

                   if(empty($username)){
                      $formErrors[] = 'Username Cannot Be Empty' ;
                   }
                   if(empty($firstname)){
                      $formErrors[] = 'First Name Cannot Be Empty' ;
                   }
                   if(empty($lastname)){
                      $formErrors[] = 'Last Name Cannot Be Empty' ;
                   }
                   if(empty($email)){
                      $formErrors[] = 'Email Cannot Be Empty' ;
                   }


                   foreach ($formErrors as $error) {
                     echo "<div class='alert alert-danger'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          " . $error . "</div>" ;
                   }

                   /*Check If No Errors In Form*/

                   if(empty($formErrors)){
                        
                        $stmt = $conn->prepare("UPDATE users SET 
                                            username = ?, password = ?, first_name = ?, last_name = ?, email = ?, userType = ?
                                            WHERE userID = ?") ;

                        $success = $stmt->execute(array($username, $password, $firstname, $lastname, $email, 
                                                        $user_type, $id));
                          
                        if($success){

                            $_SESSION['update_user'] = 1 ;
                            header("location:?do=update&userid=". $id );
                              
                        }   
                       
                   }

            }
          ?>

            </div><!--/.col-->
          </div><!-- /.row -->
          
         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php include 'includes/footer.php'; ?>