<?php
  session_start();
  ob_start();
  if (!isset($_SESSION['avotix_username'])) {
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
          <span class="logo-mini">Avotix</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>AVOTIX</b></span>
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
                  <span class="hidden-xs"><?php echo $_SESSION['avotix_username']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['avotix_username']; ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
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
              <p><?php echo $_SESSION['avotix_username']; ?></p>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="users.php"><i class="fa fa-circle-o"></i>Manage Users</a></li>
                <li><a href="add-user.php"><i class="fa fa-circle-o"></i>Add New User</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-product-hunt"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="products-cat.php"><i class="fa fa-circle-o"></i>Products Categories </a></li>
                <li><a href="add-products-cat.php"><i class="fa fa-circle-o"></i>Add New Category</a></li>
                <li><a href="all_products.php"><i class="fa fa-circle-o"></i>All Products</a></li>
                <li><a href="add_product.php"><i class="fa fa-circle-o"></i>Add New Product</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-picture-o"></i> <span>Image Gallery</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="gallery-albums.php"><i class="fa fa-circle-o"></i>Gallery Albums</a></li>
                <li><a href="add_album.php"><i class="fa fa-circle-o"></i>Add New Album</a></li>
                <li><a href="add_image.php"><i class="fa fa-circle-o"></i>Upload New Image</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>News</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="news-panel.php"><i class="fa fa-circle-o"></i>Manage News </a></li>
                <li><a href="add_news.php"><i class="fa fa-circle-o"></i>Add News</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-picture-o"></i> <span>Slider</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="slider.php"><i class="fa fa-circle-o"></i>Manage Slider </a></li>
                <li><a href="add_slide.php"><i class="fa fa-circle-o"></i>Add New Slide</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>FAQ</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="faq.php"><i class="fa fa-circle-o"></i>Manage FAQ </a></li>
                <li><a href="add_faq.php"><i class="fa fa-circle-o"></i>Add FAQ</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="about_home.php"><i class="fa fa-circle-o"></i>About in Home</a></li>
                <li><a href="about_overview.php"><i class="fa fa-circle-o"></i>Overview</a></li>
                <li><a href="about_ceo_message.php"><i class="fa fa-circle-o"></i>CEO Message</a></li>
                <li><a href="about_social_resp.php"><i class="fa fa-circle-o"></i>Social Responsibilities</a></li>
                <li><a href="services.php"><i class="fa fa-circle-o"></i>Services</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Mession-Vision-Values</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="mession_vision.php"><i class="fa fa-circle-o"></i>Mession, Vision</a></li>
                <li><a href="about_values.php"><i class="fa fa-circle-o"></i>Our Values</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Board of Directors</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="directors.php"><i class="fa fa-circle-o"></i>Manage Directors</a></li>
                <li><a href="add_director.php"><i class="fa fa-circle-o"></i>Add Director</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Contacts</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="directors.php"><i class="fa fa-circle-o"></i>Manage Directors</a></li>
                <li><a href="add_director.php"><i class="fa fa-circle-o"></i>Add Director</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Social Media</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="social.php"><i class="fa fa-circle-o"></i>Manage Social Media</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
