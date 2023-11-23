<?php 
$pageTitle = 'Images Gallery | TAFL - Tanta university  ' ;
include'includes/header.php' 
?>
		
		<?php
		if (!isset($_GET['Album'])){
			header("location:gallery.php");
			exit();
		} 
		
		/*connect To database*/
		include '../includes/config.php';

		$albumID = isset($_GET['Album']) && is_numeric($_GET['Album']) ? intval($_GET['Album']) : 0 ;

        $checkCount = checkItem("album_id","gallery_albums", $albumID) ;

        if($checkCount > 0) {

			$stmt = $conn->prepare('SELECT * FROM gallery_albums WHERE album_id = ?') ;
			$stmt->execute( array( $albumID ));
			$row = $stmt->fetch();
			?>

		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('../img/banners/mainbanner.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<div class="bread-title"><h2 style="color: #fff">
								<?php echo $row['album_title_en']; ?>
							</h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / End Breadcrumb -->
		
		<!-- Blog Single -->
		<section class="about-us magnific_images">
			<div class="container">

				

				<div class="row mb-40">
				<?php
				$stmt = $conn->prepare('SELECT * FROM gallery_albums a, gallery_images b 
												WHERE a.album_id = b.image_album 
												AND  a.album_id ='. $albumID) ;
				$stmt->execute();
				while ($row = $stmt->fetch() ) {
				?>

					<div class="col-md-3">
						<a href="../images/uploads/<?php echo $row['image_name'];?>" class="image-gallery-set" title="#">
							<img src="../images/uploads/<?php echo $row['image_name'];?>" class="img-thumbnail">
						</a>
					</div>
					
				<?php } ?>
				</div>

				
			</div>
		</section>	
		<!--/ End Single Blog -->
		
	<?php } ?>
		
	
		
<?php include'includes/footer.php' ?>