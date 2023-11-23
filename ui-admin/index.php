<?php 
  session_start() ;
  if (isset($_SESSION['success_username'])) {
    header("location:dashboard.php") ;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>لوحة التحكم | مركز تعليم اللغة العربية </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="dist/img/favicon.png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    
    <!-- Connect To Database -->
    <?php include 'includes/config.php'; ?>
    

    <div class="login-box">
      <div class="login-logo">
        <img src="../img/logo.png" style="height: 80px;">
        <br>
        مركز تعليم اللغة العربية لغير الناطقين بها بجامعة طنطا

      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">الدخول للوحة التحكم</p>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" autocomplete="new-password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">دخــــول</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
       <?php 

          /*Check if the user comming from http request*/
          
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $username = filter_var( $_POST['username'], FILTER_SANITIZE_STRING ) ;
            $password = $_POST['password'] ;
            $hashedPass = sha1($password) ;

            $stmt = $conn->prepare("SELECT * FROM users WHERE username= ? AND password= ? ") ;
            $stmt->execute( array($username, $hashedPass) ) ;
            $row = $stmt->fetch() ;  
            $count = $stmt->rowCount();

            if ($count > 0) {
              
              $_SESSION['success_username'] = $row['username'] ;

              $_SESSION['userType'] = $row['userType'] ;

              $_SESSION['success_login']   = 1 ;
                
              //header("location:dashboard.php") ;
              ?>
                <script type="text/javascript">
                  window.location.href = "dashboard.php";
                </script>
              <?php
              exit() ;
            }
            else
              ?>
                <div class="alert alert-danger" style="margin-top:20px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fa fa-ban"></i>
                  اسم المستخدم أو كلمة المرور غير صحيح
                </div>
              <?php
          }

        ?>

    </div><!-- /.login-box -->

      

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/e0c6887fb3.js"></script>
    <!-- Custom Functions -->
    <script src="dist/js/functions.js"></script>
  </body>
</html>