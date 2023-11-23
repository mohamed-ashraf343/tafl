<?php include'includes/header.php' ?>
		
		<!-- Hero Slider -->
		<section class="hero-slider style1">
			<div class="home-slider">
				<?php 
		            /*connect To database*/
		            include 'includes/config.php';

		            $stmt = $conn->prepare("SELECT * FROM slider") ;
		            $stmt->execute();
		            while ($row = $stmt->fetch() ) {
		    	?>
				<div class="single-slider" style="background-image:url(images/slider/<?php echo $row['slide_image'] ;?>)"></div>

				<?php } ?> 
				
			</div>
		</section>
		<!--/ End Hero Slider -->
		<section class="about-us section-space">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-12">
						<div class="modern-img-feature">
							<img src="img/right-img.jpg" alt="about">
							
						</div>
					</div>
					<div class="col-md-7 col-12">
						<div class="about-content section-title default text-left">
							<div class="section-top">
								<h1><span>عن المركز</span><b>مركز تعليم اللغة العربية لغير الناطقين بها   </b></h1>
								<div class="ui-decor"></div>
							</div>
							<div class="section-bottom pt-20">
								<div class="text">
									<p class="text-justify">
									يعد مركز تعليم اللغة العربية لغير الناطقين بها من أهم انجازات جامعة طنطا حيث يقوم بتعليم اللغة العربية لغير الناطقين بها بأسعار مناسبة. يقع هذا المركز بمدينة طنطا بجمهورية مصر العربية ويقوم بتسهيل عملية تسجيل الطلاب به لما يتمتع به من مرونة فى نظام القبول حيث يمكنهم الدراسة إما عن طريق تأشيرة سياحية أو تأشيرة دراسية. يمكن هذا المركز الطلاب الدارسين من فهم اللغة العربية والتحدث بها بطلاقة لذا إذا كنت ترغب في زيارة مصر للدراسة بإحدى جامعتها ولتعلم اللغة العربية من المتحدثين الأصليين, فإن مركز تعليم اللغة العربية هو إختيارك الصحيح. يقوم المركز بتقديم مجموعة متنوعة من الدورات والتي تتضمن تعليم اللغة العربية الفصحي والقرآنية والحديثة والعامية وكذلك قواعد اللغة العربية وبعض النصوص الثقافية والإعلامية. وقد تم وضع تلك الكورسات بطريقة تمكن الطلاب من التفاعل الإجتماعي ومن العمل المشترك وذلك عبر دورات صباحية ومسائية والتى تتيح خلق بيئة متعددة الثقافات حيث يستقبل مركز اللغة العربية طلاب من مختلف الدول العربية والأجنبية وذلك للدراسة به مستمتعين بموقعه بقلب دلتا النيل.
									</p>
								</div>
								<div class="button" style="margin-top: 50px;">
									<a href="about.php" class="bizwheel-btn theme-2">المزيد<i class="fa fa-angle-right"></i></a>
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
								<h1><b> الكورسات</b></h1>
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
									<img src="images/news_uploads/<?= $row['main_image'] ;?> " alt="#">
									<ul class="news-meta">
										<li class="date"><i class="fa fa-calendar"></i><?= $row['publish_date'] ?></li>
									</ul>
								</div>
								<div class="news-body">
									<div class="news-content">
										<h3 class="news-title"><a href="article_details.php?Article=<?=$row['news_id']; ?>"><?= $row['title'] ?></a></h3>
										
										<a href="article_details.php?Article=<?=$row['news_id']; ?>" class="more">المزيد <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
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
								<a href="news.php" class="bizwheel-btn theme-2">أرشيف الأخبار <i class="fa fa-angle-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Latest Blog -->
				
		<?php include'includes/footer.php' ?>