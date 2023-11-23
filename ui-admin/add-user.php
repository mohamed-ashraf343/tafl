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
            Add Users
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-md-2"></div>

             <div class="col-md-8">
              <!-- Start Alerts Messages -->
            
              <?php 
                $msg = 'User Added Successfully' ;
                alert('add_user', 'success', 'alert-success', 'fa-check', $msg )  ;
              ?>

              <!-- End Alerts Messages -->

            </div>   
            <div class="clearfix "></div>
               
             <div class="col-md-2"></div>

             <div class="col-md-8">
               <div class="box box-info">
                 
                  <!-- form start -->
                  <form class="form-horizontal" id="addForm" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Username:</label>
                        <div class="col-sm-10">
                          <input type="text" name="username" class="form-control" placeholder="Enter Username" autocomplete="off" required='required'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Password:</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="new-password" required='required'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">First Name:</label>
                        <div class="col-sm-10">
                          <input type="text" name="fname" class="form-control" placeholder="Enter First Name" autocomplete="off" required='required'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Last Name:</label>
                        <div class="col-sm-10">
                          <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" autocomplete="off" required='required'>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="off" required='required'>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">User Type</label>
                        <div class="col-sm-4">
                          <select name="user_type" class="form-control" id="user_type" required>
                            <option value="">Choose User Type</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="admin">Admin</option>
                          </select>
                        </div>
                      </div>

                      
                    
                    </div><!-- /.box-body -->


                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-plus"></i> ADD</button>
                    </div><!-- /.box-footer -->
                  </form>
               </div><!-- /.box -->
               

              <?php 
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                  /*Connect To Database*/
                  include 'includes/config.php';

                  $username       = $_POST['username'] ;
                  $password       = sha1( $_POST['password'] );
                  $firstname      = $_POST['fname'] ;
                  $lastname       = $_POST['lname'] ;
                  $email          = $_POST['email'] ;
                  $user_type      = $_POST['user_type'];


                  /*Array of Errors*/ 

                   $formErrors = array() ;

                   if(empty($username)){
                      $formErrors[] = 'Username Cannot Be Empty' ;
                   }
                   if(empty($password)){
                      $formErrors[] = 'Password Cannot Be Empty' ;
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
                   if(empty($user_type)){
                      $formErrors[] = 'User Type Cannot Be Empty' ;
                   }

                   foreach ($formErrors as $error) {
                     echo "<div class='alert alert-danger'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <i class='icon fa fa-ban'></i> " . $error . "</div>" ;
                   }

                   /*Check If No Errors In Form*/

                   if(empty($formErrors)){
                    

                      /*Check If User Exist In Database*/
                      $checkCount = checkItem("username","users", $username) ;
                      
                      if($checkCount == 1 ){

                           echo "<div class='alert alert-danger'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <i class='icon fa fa-ban'></i> This User Already Exist
                            </div>" ;

                      }else{
                        
                       

                        $stmt = $conn->prepare("INSERT INTO 
                                                      users (username, password, first_name,last_name, email, registration_date, userType)
                                                  VALUES (:zusername,:zpass, :zfirstname,:zlastname, :zmail, now(), :user_type) ");

                        $success = $stmt->execute(array(

                                'zusername'       => $username,
                                'zpass'           => $password,
                                'zfirstname'      => $firstname,
                                'zlastname'       => $lastname,
                                'zmail'           => $email,
                                'user_type'       => $user_type
                            ));
                          
                          if($success){

                              $_SESSION['add_user'] = 1 ;
                              header("location:add-user.php");
                              
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