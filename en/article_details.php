<?php 
$pageTitle = 'News | TAFL - Tanta university  ' ;
include'includes/header.php' 
?>
		
		<?php
		if (!isset($_GET['Article'])){
			header("location:news.php");
			exit();
		} 
 		include '../includes/config.php';

		$newsID = isset($_GET['Article']) && is_numeric($_GET['Article']) ? intval($_GET['Article']) : 0 ;

        $checkCount = checkItem("news_id","news", $newsID) ;

        if($checkCount > 0) {

        	$stmt = $conn->prepare("SELECT * FROM news WHERE news_id = '". $newsID."'") ;
			$stmt->execute();
			$row = $stmt->fetch() ;
			?>

		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('../img/banners/mainbanner.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<div class="bread-title"><h2>
								<?= $row['title_en'] ;?> 
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
				
					<div class="col-md-10 offset-md-1 col-12">
						<div class="row">
							<div class="col-12">
								<div class="blog-single-main">
									<div class="main-image">
										<img src="../images/news_uploads/<?= $row['main_image'] ;?>" alt="#">
									</div>
									<div class="blog-detail">
										<!-- News meta -->
										<ul class="news-meta">
											<li><i class="fa fa-calendar"></i> <?= $row['publish_date'] ;?></li>
										</ul>
										<h2 class="blog-title"><?= $row['title_en'] ;?></h2>
										<?= $row['details_en'] ;?>
									
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