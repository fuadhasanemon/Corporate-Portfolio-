<!DOCTYPE html>
<html lang="en">

<?php 

	if(basename(__DIR__) != 'admin'){
		$baseUrl = '../';
		$isInternal = true;
	} else {
		$baseUrl = '';
		$isInternal = false;
	}

?>

<?php include '../includes/head.php'; ?>

<body>

	<!-- Main navbar -->

	<?php include '../includes/mainNav.php'; ?>

	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->

					<?php include '../includes/navigation.php'; ?>

					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href=""><i class="icon-image-compare position-left"></i> Banner</a></li>
							<li><a href="">Update</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Banner Update</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<!-- <li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li> -->
								</ul>
							</div>
						</div>

						<div class="panel-body">

							
							<?php
								require '../controller/dbConfig.php';
								$banner_id = $_GET['banner_id'];
								$singleBannerQuery = "SELECT * FROM banner WHERE id={$banner_id}";
								$getResults = mysqli_query($dbCon, $singleBannerQuery);
							?>


							<form class="form-horizontal" action="../controller/bannerController.php" method="POST" enctype="multipart/form-data">
								<fieldset class="content-group mt-5">

									<?php
										if(isset($_GET['msg'])){

									?>

									<div class="alert alert-success alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-semibold">Well done!</span> <?php echo $_GET['msg']; ?>
								    </div>

									<?php } ?>

									<?php 
										foreach($getResults as $key => $banner){

										
									?>
										
										<input type="hidden" class="form-control" name="banner_id" value="<?php echo $banner['id']; ?>">

										<div class="form-group">
											<label class="control-label col-lg-2" for="title">Title</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="title" name="title" value="<?php echo $banner['title']; ?>" required>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-lg-2" for="sub_title">Sub Title</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="sub_title" name="sub_title" value="<?php echo $banner['sub_title']; ?>" required>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-lg-2" for="details">Details</label>
											<div class="col-lg-10">
												<textarea rows="5" cols="5" class="form-control" placeholder="Default textarea" id="details" name="details" required><?php echo $banner['details']; ?></textarea>
											</div>
										</div>

										<!-- Image input -->
										<!-- <div class="form-group">
											<label class="col-lg-2 control-label text-semibold" for="image">Image</label>
											<div class="col-lg-10">
												<input type="file" name="image" class="file-input-extensions" id="image">
												<span class="help-block">Allow extensions: <code>jpg</code>, <code>png</code> and <code>jpeg</code> and  Allow Size: <code>640 * 426</code> Only</span>
											</div>
										</div> -->
									<!-- /Image input -->

										<div class="form-group">
											<label class="col-lg-2 control-label text-semibold" for="image">Image</label>
											<div class="col-lg-10">
												<input type="file" name="image" class="file-input-extensions" id="image">
												<span class="help-block">Allow extensions: <code>jpg</code>, <code>png</code> and <code>jpeg</code> and  Allow Size: <code>640 * 426</code> Only</span>


												<div class="file-preview" id="custom_file_preview">
													<div class="close fileinput-remove text-right" id="custom_close">×</div>
													<div class="file-preview-thumbnails">
														<div class="file-preview-frame" id="preview-1603644588432-0">
															<img src="<?php echo '../uploads/bannerImage/'.$banner['image']; ?>" class="file-preview-image" title="" alt="" style="width:auto;height:160px;">
														</div>
													</div>
													<div class="clearfix"></div>   
													<div class="file-preview-status text-center text-success"></div>
													<div class="kv-fileinput-error file-error-message" style="display: none;"></div>
												</div>
											</div>
										</div>

									<?php } ?>

								</fieldset>

								<div class="text-right">
									<a type="submit" href="bannerList.php" class="btn btn-warning">Back to the list</a>
									<button type="submit" class="btn btn-primary" name="updateBanner">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>

						</div>


					</div>
					<!-- /basic datatable -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<?php include '../includes/script.php'; ?>

</body>

</html>