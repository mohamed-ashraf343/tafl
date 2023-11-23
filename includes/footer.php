<!-- Footer -->
		<footer class="footer" style="background-image:url('img/map.png')">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Footer About -->		
							<div class="single-widget footer-about widget">	
								<div class="logo">
									<div class="img-logo">
										<a class="logo" href="index.html">
											<img class="img-responsive img-thumbnail" src="img/logo.png" alt="logo">
										</a>
									</div>
								</div>
								
								<div class="social">
									<?php
								        include 'includes/config.php';
								        $stmt = $conn->prepare('SELECT * FROM settings WHERE set_id = 1 ');
								        $stmt->execute();
								        $row = $stmt->fetch();
								      ?>
									<!-- Social Icons -->
									<ul class="social-icons">
										<li><a class="facebook"  href="<?= $row['set_facebook']?>"  target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a class="twitter" 	 href="<?= $row['set_twitter']?>"   target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a class="linkedin"  href="<?= $row['set_linkedin']?>"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
										<li><a class="instagram" href="<?= $row['set_instagram']?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>		
							<!--/ End Footer About -->		
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Footer Links -->		
							<div class="single-widget f-link widget">
								<h3 class="widget-title">روابط سريعة</h3>
								<ul>
									<li><a href="about.php">عن المركز</a></li>
									<li><a href="goals.php">أهداف المركز</a></li>
									<li><a href="news.php">أخبار المركز</a></li>
									<li><a href="contact.php">اتصل بنا </a></li>
								</ul>
							</div>			
							<!--/ End Footer Links -->			
						</div>
					
						<div class="col-lg-5 col-md-6 col-12">	
							<!-- Footer Contact -->		
							<div class="single-widget footer_contact widget">	
								<h3 class="widget-title">تواصل معنا</h3>
								<ul class="address-widget-list">
									<li class="footer-mobile-number"><i class="fa fa-phone"></i> <?= $row['set_phone']?> </li>
									<li class="footer-mobile-number"><i class="fa fa-envelope"></i><?= $row['set_email']?></li>
									<li class="footer-mobile-number"><i class="fa fa-map-marker"></i> <?= $row['set_address']?> </li>
								</ul>
							</div>		
							<!--/ End Footer Contact -->						
						</div>
					</div>
					
				</div>
			</div>
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="copyright-content">
								<!-- Copyright Text -->
								<p> جميع الحقوق محفوظة © <?= date("Y"); ?> Eng/ Mohamed Ashraf</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/  End Footer -->
		
		</div>
		<!-- End Boxed Layout -->
		
		
		<script src="js/jquery-migrate-3.0.0.js"></script>
		
		<script src="js/popper.min.js"></script>
		
		<script src="js/bootstrap.min.js"></script>
		
		<!-- <script src="js/modernizr.min.js"></script> -->
	
		<script src="js/scrollup.js"></script>
		
		<!-- <script src="js/jquery-fancybox.min.js"></script> -->
		
		<!-- <script src="js/cubeportfolio.min.js"></script> -->
		
		<!-- <script src="js/slicknav.min.js"></script> -->
		
		<!-- <script src="js/waypoints.min.js"></script> -->
		
		<script src="js/jquery.counterup.min.js"></script>
		
		<script src="js/slicknav.min.js"></script>
		
		<script src="js/owl-carousel.min.js"></script>
		
		<script src="js/easing.js"></script>
		
		<!-- <script src="js/theme-option.js"></script> -->
		
		<script src="js/magnific-popup.min.js"></script>
		<script src="js/active-ar.js"></script>
	</body>

</html>