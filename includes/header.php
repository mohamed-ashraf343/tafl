<?php 
session_start();
ob_start();
include'includes/functions.php'; ?>
<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="ar">
	
<head>
		<!-- Meta Tag -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name='copyright' content='pavilan'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title Tag  -->
		<title><?php getPageTitle(); ?></title>
		<meta name='description' content='كورسات اون لاين'/> 
		<meta property='og:locale' content='ar_AR' /> 
		<meta property="og:type" content="website" />
		<meta property='og:url' content='gittc.tanta.edu.eg' /> 
		<meta property="og:image:width" content="500" />
		<meta property="og:image:height" content="250" />
		<meta property='og:site_name' content='مركز تعليم اللغة العربية' /> 
		<meta name='twitter:card' content='summary' /> 
		<meta name='twitter:description' content='مركز تعليم اللغة العربية' />
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/Logo.png">
		
		<!-- Web Font -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		
		<!-- Plugins CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-rtl.min.css">
		<link rel="stylesheet" href="css/cubeportfolio.min.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/jquery.fancybox.min.css">
		<link rel="stylesheet" href="css/magnific-popup.min.css">
		<link rel="stylesheet" href="css/owl-carousel.min.css">
		<link rel="stylesheet" href="css/slicknav.min.css">

		<!-- Stylesheet -->  
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/rtl.css">
		<link rel="stylesheet" href="css/responsive.css">
		
	
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- <link rel="stylesheet" href="css/skins/skin-2.css" id="elena_custom"> -->
		<script src="js/jquery.min.js"></script>
	</head>
	<body id="bg" style="background-image: url(img/bg-2.png);">
		
		<!-- Boxed Layout -->
		<div id="page" class="site boxed-layout"> 
	
		<!-- Preloader -->
		<div class="preeloader">
			<div class="preloader-spinner"></div>
		</div>
		<!--/ End Preloader -->
		
		
		<!-- Header -->
		<header class="header">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-12">
							<!-- Top Contact -->
							<div class="top-contact">
								<?php
						        include 'includes/config.php';
						        $stmt = $conn->prepare('SELECT * FROM settings WHERE set_id = 1 ');
						        $stmt->execute();
						        $row = $stmt->fetch();
						      ?>
								<div class="single-contact"><i class="fa fa-envelope"></i> <?= $row['set_email']?></div>
								<div class="single-contact"><i class="fa fa-phone-square"></i>   <?= $row['set_phone']?> </div> 
								
							</div>
							<!-- End Top Contact -->
						</div>	
						<div class="col-lg-4 col-12">
							<div class="topbar-right">
								<!-- Social Icons -->
								<ul class="social-icons">
									<li><a href="<?= $row['set_facebook']?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="<?= $row['set_twitter']?>"><i class="fa fa-twitter" target="_blank"></i></a></li>
									<li><a href="<?= $row['set_linkedin']?>"><i class="fa fa-linkedin" target="_blank"></i></a></li>
									<li><a href="<?= $row['set_instagram']?>"><i class="fa fa-instagram" target="_blank"></i></a></li>
								</ul>															
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Topbar -->
			<!-- Middle Header -->
			<div class="middle-header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="middle-inner">
								<div class="row">
									<div class="col-lg-2 col-md-2 col-12">
										<!-- Logo -->
										<div class="logo">
											<div class="img-logo">
												<a href="index.php">
													<img src="/img/logo.png" alt="">
												</a>
												
												</div>
											</div>
						
										<div class="mobile-nav"></div>
									</div>

									<div class="col-lg-10 col-md-10 col-12">
										<div class="menu-area">
											<!-- Main Menu -->
											<nav class="navbar navbar-expand-lg">
												<div class="navbar-collapse">	
													<div class="nav-inner">	
														<div class="menu-home-menu-container">
															<!-- Naviagiton -->
															<ul id="nav" class="nav main-menu menu navbar-nav">
																<li><a href="index.php">الرئيسية</a></li>
																<li class="icon-active">
																	<a href="#">من نحن </a>
																	<ul class="sub-menu">
																		<li><a href="about.php">عن المركز </a></li>
																		<li><a href="mission-vision.php">الرؤية والرسالة</a></li>
																		<li><a href="goals.php">أهداف المركز</a></li>		
																		<li><a href="facilities.php">المرافق</a></li>		
																		<li><a href="formalities.php">الإجراءات</a></li>		

																	</ul>
																</li>

																<li><a href="team.php">فريق العمل</a></li>
																<li><a href="courses.php"> المدونة </a></li>
																
																<li><a href="gallery.php">معرض الصور	 </a></li>
																<li><a href="gallery-videos.php"> فيديوهات	 </a></li>
																<li><a href="news.php">الكورسات</a></li>
																<li><a href="join-us.php">التحق بنا</a></li>
																<li><a href="contact.php">اتصل بنا</a></li>
																<li class="icon-active">
																	<a href="#"> لغات أخري</a>
																	<ul class="sub-menu">
																		<li><a href="en/">English</a></li>
																		<!-- <li><a href="#">French</a></li>
																		<li><a href="#">Chinese</a></li> -->
																	</ul>
																</li>
															</ul>
															<!--/ End Naviagiton -->
														</div>
													</div>
												</div>
											</nav>
											<!--/ End Main Menu -->	
											<!-- Right Bar -->
											
											<!--/ End Right Bar -->
										</div>
									</div>

									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Middle Header -->

		</header>
		<!--/ End Header -->