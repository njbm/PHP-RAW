<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'PHP-RAW/config.php'); ?>

<?php 
   $id = $_GET['id'];
    
   /** communicate with datasource and get data for that id */
  $dataSlides = file_get_contents($datasource.DIRECTORY_SEPARATOR.'slideritems.json');
  $slides = json_decode($dataSlides);
  
  $slide = null;
  foreach($slides as $aslide){
      if($aslide->id == $id){
          $slide = $aslide;
          break;
      }
  }


?>

<!DOCTYPE html>
<html lang="en">

<?php include_once($partials.'head.php') ?>

<body>

<?php include_once($partials.'nav.php') ?>


	<!-- Page content -->
	<div class="page-content">

	<?php include_once($partials.'sidebar.php') ?>


		<!-- Main content -->
		<div class="content-wrapper">

		<?php include_once($partials.'pageHeader.php') ?>

			<!-- Content area -->
			<div class="content">
			<?php //include_once($partials.'chart.php') ?>



<!-- Dashboard content -->
<div class="row">
	<div class="col-xl-12">
		
    <div class="card-group mb-6">
					<div class="card shadow-0 border-0">
						<img class="card-img-top img-fluid" src="<?=$webroot.'uploads/'.$slide->src?>" alt="<?=$aslide->alt?>">

						<div class="card-body">
							<h5 class="card-title"><?=$aslide->title?></h5>
							<p class="card-text"><?=$aslide->caption?></p>
						</div>

					</div>
				</div>

	</div>
</div>
<!-- /dashboard content -->


			</div>
			<!-- /content area -->

			<?php include_once($partials.'footer.php') ?>
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
</body>
</html>
