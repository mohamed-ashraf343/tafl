<?php
  session_start();
  ob_start();
  if (!isset($_SESSION['success_username'])) {
    header('location:index.php') ;
    exit();
  }
?>
<?php include 'includes/functions.php'; ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<?php 
  $photo_path = '../images/uploads';
  if (!file_exists($photo_path)) {
      mkdir($photo_path, 0777, true);
  }
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php getPageTitle(); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="dist/img/favicon.png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="dist/css/style.css">

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="dashboard.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">D.B</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>DASHBOARD</b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $_SESSION['success_username']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $_SESSION['success_username']; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="../" target="_blank" class="btn btn-default btn-flat">تصفح الموقع</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="signout.php" class="btn btn-default btn-flat">خروج</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['success_username']; ?></p>
            </div>
          </div>
        <?php 
            
          include 'includes/config.php';   //connect To database

          $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? " ) ;
          $stmt->execute( array( $_SESSION['success_username'] ));
          $row = $stmt->fetch();
        ?>

        <?php 

        if ( $row['userType'] === 'superadmin'){
        ?>
            
             <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>الرئيسية</span></a></li>

            <li class="treeview users">
                <a href="#"><i class="fa fa-user"></i> <span>الادارة</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="users.php"><i class="fa fa-circle-o"></i>مديري النظام</a></li>
                    <li><a href="add-user.php"><i class="fa fa-circle-o"></i>اضافة مستخدم جديد</a></li>
                </ul>
            </li>
            
            <li class="treeview news">
                <a href="#"><i class="fa fa-question-circle"></i> <span> أخر الأخبار </span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="news-panel.php"><i class="fa fa-circle-o"></i>ادارة الأخبار </a></li>
                    <li><a href="add_news.php"><i class="fa fa-circle-o"></i>اضافة خبر جديد</a></li>
                </ul>
            </li>

            <li class="treeview slider">
                <a href="#"><i class="fa fa-picture-o"></i> <span>سلايدر</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="slider.php"><i class="fa fa-circle-o"></i>ادارة سلايدر</a></li>
                    <li><a href="add_slide.php"><i class="fa fa-circle-o"></i>اضافة سلايد جديدة</a></li>
                </ul>
            </li>
           
            <li class="treeview img_gallery">
              <a href="#"><i class="fa fa-picture-o"></i> <span>معرض الصور</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="gallery-albums.php"><i class="fa fa-circle-o"></i>كل الألبومات</a></li>
                <li><a href="add_image.php"><i class="fa fa-circle-o"></i>رفع صور</a></li>
              </ul>
            </li>
            
          
            <li class="settings"><a href="settings.php"><i class="fa fa-cogs"></i> <span>اعدادات</a></li>
 
          </ul><!-- /.sidebar-menu -->


            <?php  
            }elseif ( $row['userType'] === 'admin') {
           
            ?>
            
          <!-- Sidebar Menu -->
           <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>الرئيسية</span></a></li>

            
            <li class="treeview news">
                <a href="#"><i class="fa fa-question-circle"></i> <span> أخر الأخبار </span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="news-panel.php"><i class="fa fa-circle-o"></i>ادارة الأخبار </a></li>
                    <li><a href="add_news.php"><i class="fa fa-circle-o"></i>اضافة خبر جديد</a></li>
                </ul>
            </li>

            <li class="treeview slider">
                <a href="#"><i class="fa fa-picture-o"></i> <span>سلايدر</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="slider.php"><i class="fa fa-circle-o"></i>ادارة سلايدر</a></li>
                    <li><a href="add_slide.php"><i class="fa fa-circle-o"></i>اضافة سلايد جديدة</a></li>
                </ul>
            </li>
           
            <li class="treeview img_gallery">
              <a href="#"><i class="fa fa-picture-o"></i> <span>معرض الصور</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="gallery-albums.php"><i class="fa fa-circle-o"></i>كل الألبومات</a></li>
                <li><a href="add_image.php"><i class="fa fa-circle-o"></i>رفع صور</a></li>
              </ul>
            </li>
            
          
            <li class="settings"><a href="settings.php"><i class="fa fa-cogs"></i> <span>اعدادات</a></li>
            
          </ul><!-- /.sidebar-menu -->

            <?php  
            }
            ?>
         
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
