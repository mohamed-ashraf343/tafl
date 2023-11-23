<?php 
$pageTitle = 'News | TAFL - Tanta university  ' ;
include'includes/header.php' 
?>
		
		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('../img/banners/mainbanner.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<div class="bread-title"><h2>  News </h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / End Breadcrumb -->
		
		<section class="blog-layout news-default section-space">
			<div class="container">
				<div class="row ">

					<?php 
	                    $stmt = $conn->prepare('SELECT * FROM news ORDER BY publish_date DESC ') ;
	                    $stmt->execute();
	                    while ($row = $stmt->fetch() ) {
	                ?>


					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-news ">
							<div class="news-head overlay">
								<img src="../images/news_uploads/<?= $row['main_image'] ;?> " alt="#">
								<ul class="news-meta">
									<li class="date"><i class="fa fa-calendar"></i><?= $row['publish_date'] ?></li>
								</ul>
							</div>
							<div class="news-body">
								<div class="news-content">
									<h3 class="news-title"><a href="article_details.php?Article=<?=$row['news_id']; ?>"><?= $row['title_en'] ?></a></h3>
									<a href="article_details.php?Article=<?=$row['news_id']; ?>" class="more"> more <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
						<!--/ End Single Blog -->
					</div>

					<?php } ?>

					
				</div>
				
			</div>
		</section>
		
		
	
		
<?php include'includes/footer.php' ?>