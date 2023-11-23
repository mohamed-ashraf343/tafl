<?php include'includes/header.php' ?>
		
		<!-- Hero Slider -->
		<section class="hero-slider style1">
			<div class="home-slider">
				<?php 
		            /*connect To database*/
		            include '../includes/config.php';

		            $stmt = $conn->prepare("SELECT * FROM slider") ;
		            $stmt->execute();
		            while ($row = $stmt->fetch() ) {
		    	?>
				<div class="single-slider" style="background-image:url(../images/slider/<?php echo $row['slide_image'] ;?>)"></div>

				<?php } ?> 
				
			</div>
		</section>
		<!--/ End Hero Slider -->
		<section class="about-us section-space">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-12">
						<div class="modern-img-feature">
							<img src="../img/right-img.jpg" alt="about">
							
						</div>
					</div>
					<div class="col-md-7 col-12">
						<div class="about-content section-title default text-left">
							<div class="section-top">
								<h1><span>About TAFL</span><b>Teaching Arabic as a Foreign Language   </b></h1>
								<div class="ui-decor"></div>
							</div>
							<div class="section-bottom pt-20">
								<div class="text">
									<p class="text-justify">
									Arabic Language Center for Teaching Non-Native Arabic Speakers is considered one of Tanta University achievements where Arabic is taught for non-native speakers with relative prices.
									<br>
The center is located in Tanta city A.R.E. , and facilitates learners registration due to its flexible admission system in which they can study via resident visa or tourist visa.   
<br>
Arabic Language Center for Teaching Non-Native Arabic Speakers fluently understand and speak Arabic, so, if you wish to visit Egypt and study in one of its universities from native Arabic teachers then the Arabic Langugae Center in Tanta University is your destination. 
<br>
 Arabic Language Center for Teaching Non-Native Arabic Speakers offers a variety of courses which includes teaching Modern Standard Arabic, Qur’anic, and Egyptian colloquial Arabic as well as Arabic Grammer and some Intellectual and Media texts.
 <br>
  Arabic Language Center for Teaching Non-Native Arabic Speakers courses is designed to enable learners of socially communicate and co-work through morning and evining classes that offers multi-cultural environment as the center accepts learners from all over the world to study while enjoying the location in the middle of Nile Delta.

									</p>
									
								</div>
								<div class="button" style="margin-top: 50px;">
									<a href="about.php" class="bizwheel-btn theme-2">more<i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> 


		
		
		<!-- Latest Blog -->
		<section class="latest-blog section-bg pt-50 pb-30">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
						<div class="section-title default text-center">
							<div class="section-top">
								<h1><b> News</b></h1>
								<div class="ui-decor"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="news-latest blog-latest-slider">

							<?php 
			                    $stmt = $conn->prepare('SELECT * FROM news ORDER BY publish_date DESC limit 4 ') ;
			                    $stmt->execute();
			                    while ($row = $stmt->fetch() ) {
			                ?>


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
										
										<a href="article_details.php?Article=<?=$row['news_id']; ?>" class="more">more <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>

						<?php } ?>

							
						</div>
					</div>
				</div>
				<div class="row mt-50">
					<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
						<div class="text-center">
							<div class="button">
								<a href="news.php" class="bizwheel-btn theme-2">News archive <i class="fa fa-angle-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Latest Blog -->
				
		<?php include'includes/footer.php' ?>