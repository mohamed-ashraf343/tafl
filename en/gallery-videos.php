<?php 
$pageTitle = 'Video Gallery | TAFL - Tanta university  ' ;
include'includes/header.php' 
?>	
		
		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('../img/banners/mainbanner.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<div class="bread-title"><h2 style="color: #fff"> Video Gallery </h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / End Breadcrumb -->
		<style>
			.activities .img-thumbnail{
				height: 200px;
				width: 100%;
			}
		</style>

		<section class="about-us activities section-bg">
			<div class="container">
				<div class="row mb-40">
					<div class="col-md-12 col-12">
						<div class="row">
					

						<div class="col-md-3 mb-3">
							<a href="#" data-toggle="modal" data-target="#modal1">
								<img src="../videos/thumb/vid1.png" class="img-thumbnail">
							</a>
							<div class="modal" id="modal1">
								<div class="modal-dialog">
									<div class="modal-content">

									<div class="modal-body">
										<div class="ratio ratio-16x9">
											<video width="100%" controls="" id="video1">
												<source src="../videos/video1.mp4" type="video/mp4">
											</video>
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>

									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 mb-3">
							<a href="#" data-toggle="modal" data-target="#modal2">
								<img src="../videos/thumb/vid2.png" class="img-thumbnail">
							</a>
							<div class="modal" id="modal2">
								<div class="modal-dialog">
									<div class="modal-content">

									<div class="modal-body">
										<div class="ratio ratio-16x9">
											<video width="100%" controls="" id="video2">
												<source src="../videos/video2.mp4" type="video/mp4">
											</video>
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>

									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 mb-3">
							<a href="#" data-toggle="modal" data-target="#modal3">
								<img src="../videos/thumb/vid3.png" class="img-thumbnail">
							</a>
							<div class="modal" id="modal3">
								<div class="modal-dialog">
									<div class="modal-content">

									<div class="modal-body">
										<div class="ratio ratio-16x9">
											<video width="100%" controls="" id="video3">
												<source src="../videos/video3.mp4" type="video/mp4">
											</video>
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>

									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 mb-3">
							<a href="#" data-toggle="modal" data-target="#modal4">
								<img src="../videos/thumb/vid4.png" class="img-thumbnail">
							</a>
							<div class="modal" id="modal4">
								<div class="modal-dialog">
									<div class="modal-content">

									<div class="modal-body">
										<div class="ratio ratio-16x9">
											<video width="100%" controls="" id="video4">
												<source src="../videos/video4.mp4" type="video/mp4">
											</video>
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>

									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 mb-3">
							<a href="#" data-toggle="modal" data-target="#modal5">
								<img src="../videos/thumb/vid5.png" class="img-thumbnail">
							</a>
							<div class="modal" id="modal5">
								<div class="modal-dialog">
									<div class="modal-content">

									<div class="modal-body">
										<div class="ratio ratio-16x9">
											<video width="100%" controls="" id="video5">
												<source src="../videos/video5.mp4" type="video/mp4">
											</video>
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>

									</div>
								</div>
							</div>
						</div>

						</div>

					</div>

				</div>
								
				<script>
            $(document).ready(function() {
    
                $('#modal1').on('hide.bs.modal', () => {
                    $('#video1')[0].pause(); 
                    $('#video1')[0].currentTime = 0; 
                });
    
                $('#modal2').on('hide.bs.modal', () => {
                    $('#video2')[0].pause(); 
                    $('#video2')[0].currentTime = 0; 
                });
    
                $('#modal3').on('hide.bs.modal', () => {
                    $('#video3')[0].pause(); 
                    $('#video3')[0].currentTime = 0; 
                });
    
                $('#modal4').on('hide.bs.modal', () => {
                    $('#video4')[0].pause(); 
                    $('#video4')[0].currentTime = 0; 
                });
				
				$('#modal5').on('hide.bs.modal', () => {
                    $('#video5')[0].pause(); 
                    $('#video5')[0].currentTime = 0; 
                });
    
             
                
            });
        </script>
				
			</div>
		</section>

		
	
		<?php include'includes/footer.php' ?>