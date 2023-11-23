<?php 
$pageTitle = 'Images Gallery | TAFL - Tanta university  ' ;
include'includes/header.php' 
?>	
		
		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('../img/banners/mainbanner.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<div class="bread-title"><h2 style="color: #fff"> Images Gallery </h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / End Breadcrumb -->
		

		<section class="about-us activities section-bg">
			<div class="container">
				<div class="row mb-40">
					<div class="col-md-12 col-12">
						<div class="row">
						
						<?php
	                        include '../includes/config.php'; /*Connect to DB*/
	                        $stmt2 = $conn->prepare('SELECT * FROM gallery_albums ORDER BY album_id DESC ') ;
	                        $stmt2->execute();
	                        while ($row2 = $stmt2->fetch() ) {
	                    ?>

							<div class="col-lg-4 col-md-4 col-12 animate_afc d2">
								<div class="single-service">
									<div class="service-head text-center">
										<img src="../images/uploads/<?=$row2['album_cover_img']?>" alt="#" >
									</div>
									<div class="service-content text-center">
									<h6>
										<a href="gallery-details.php?Album=<?=$row2['album_id']; ?>" > <?=$row2['album_title_en']; ?> </a>
									</h6>
									</div>
								</div>
							</div>


						<?php } ?>
						</div>

					</div>

				</div>

				
			</div>
		</section>

		
	
		<?php include'includes/footer.php' ?>