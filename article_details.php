<?php 
$pageTitle = 'الاخبـــار | مركز تعليم اللغة العربية لغير الناطقين بها - جامعة طنطا  ' ;
include'includes/header.php' 
?>
		
		<?php
		if (!isset($_GET['Article'])){
			header("location:news.php");
			exit();
		} 
		/*connect To database*/
		include 'includes/config.php';

		$newsID = isset($_GET['Article']) && is_numeric($_GET['Article']) ? intval($_GET['Article']) : 0 ;

        $checkCount = checkItem("news_id","news", $newsID) ;

        if($checkCount > 0) {

        	$stmt = $conn->prepare("SELECT * FROM news WHERE news_id = '". $newsID."'") ;
			$stmt->execute();
			$row = $stmt->fetch() ;
			?>

		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('img/banners/mainbanner.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<div class="bread-title"><h2>
								<?= $row['title'] ;?> 
							</h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / End Breadcrumb -->
		
		<!-- Blog Single -->
		<section class="news-area archive blog-single section-padding">
			<div class="container">
				<div class="row">
					<!-- <div class="col-lg-4 col-12">
						<div class="blog-sidebar">
							<div class="single-sidebar bizwheel_latest_news_widget">
								<h2 class="sidebar-title">احدث الاخبار</h2>
								<div class="single-f-news">
									<div class="post-thumb"><a href="#"><img src="img/blog/blog-3.jpg" alt="#"></a></div>
									<div class="content">
										<p class="post-meta"><time class="post-date"><i class="fa fa-clock-o"></i>May 11, 2020</time></p>
										<h4 class="title"><a href="https://www.themelamp.com/templates/bizwheel/blog-sngle.html">خبر 1</a></h4>
									</div>
								</div>
								<div class="single-f-news">
									<div class="post-thumb"><a href="#"><img src="img/blog/blog-4.jpg" alt="#"></a></div>
									<div class="content">
										<p class="post-meta"><time class="post-date"><i class="fa fa-clock-o"></i>April 10, 2020</time></p>
										<h4 class="title"><a href="https://www.themelamp.com/templates/bizwheel/blog-sngle.html">خبر 2</a></h4>
									</div>
								</div>

								<div class="single-f-news">
									<div class="post-thumb"><a href="#"><img src="img/blog/blog-5.jpg" alt="#"></a></div>
									<div class="content">
										<p class="post-meta"><time class="post-date"><i class="fa fa-clock-o"></i>April 05, 2020</time></p>
										<h4 class="title"><a href="https://www.themelamp.com/templates/bizwheel/blog-sngle.html">خبر 3</a></h4>
									</div>
								</div>
			
								<div class="single-f-news">
									<div class="post-thumb"><a href="#"><img src="img/blog/blog-6.jpg" alt="#"></a></div>
									<div class="content">
										<p class="post-meta"><time class="post-date"><i class="fa fa-clock-o"></i>March 10, 2020</time></p>
										<h4 class="title"><a href="https://www.themelamp.com/templates/bizwheel/blog-sngle.html">خبر 4</a></h4>
									</div>
								</div>
							</div>

						</div>
					</div> -->
					<div class="col-md-10 offset-md-1 col-12">
						<div class="row">
							<div class="col-12">
								<div class="blog-single-main">
									<div class="main-image">
										<img src="images/news_uploads/<?= $row['main_image'] ;?>" alt="#">
									</div>
									<div class="blog-detail">
										<!-- News meta -->
										<ul class="news-meta">
											<li><i class="fa fa-calendar"></i> <?= $row['publish_date'] ;?></li>
										</ul>
										<h2 class="blog-title"><?= $row['title'] ;?></h2>
										<?= $row['details'] ;?>
									
									</div>
								</div>
							</div>
						</div>
											
					</div>							
				</div>
			</div>
		</section>	
		<!--/ End Single Blog -->
		
	<?php } ?>
		
	
		
<?php include'includes/footer.php' ?>