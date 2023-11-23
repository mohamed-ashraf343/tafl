<?php 
$pageTitle = 'Contact Us | TAFL - Tanta university  ' ;
include'includes/header.php' 
?>
		
		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('../img/banners/mainbanner.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<div class="bread-title"><h2>Contact Us</h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / End Breadcrumb -->
		
		<section class="contact-us section-space">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-7 col-12">
						<!-- Contact Form -->
						<div class="contact-form-area m-top-30">
							
							<div class="map">

								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3426.2326744068405!2d31.002570600000002!3d30.8241459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7c9687132750d%3A0xda666616cd1eef20!2z2YXYrNmF2Lkg2YPZhNmK2KfYqiDYrNin2YXYudipINi32YbYt9inINiz2KjYsdio2KfZig!5e0!3m2!1sar!2seg!4v1662549575054!5m2!1sar!2seg" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
						
					</div>

						<?php
						include '../includes/config.php';
						$stmt = $conn->prepare('SELECT * FROM settings WHERE set_id = 1 ');
						$stmt->execute();
						$row = $stmt->fetch();
						?>
					
					<div class="col-lg-5 col-md-5 col-12">
						<div class="contact-box-main m-top-30">
							<div class="contact-title">
								<h2>Contact Us</h2>
							</div>
						
							<div class="single-contact-box">
								<div class="c-icon"><i class="fa fa-map-marker"></i></div>
								<div class="c-text">
									<h4>Address</h4>
									<p> <?= $row['set_address_en']?>    </p>
								</div>
							</div>

							<div class="single-contact-box">
								<div class="c-icon"><i class="fa fa-phone"></i></div>
								<div class="c-text">
									<h4>Mobile</h4>
									<p> <?= $row['set_phone']?> </p>
								</div>
							</div>
							
							
							<div class="single-contact-box">
								<div class="c-icon"><i class="fa fa-envelope-o"></i></div>
								<div class="c-text">
									<h4>Email</h4>
									<p><?= $row['set_email']?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	
		
<?php include'includes/footer.php' ?>