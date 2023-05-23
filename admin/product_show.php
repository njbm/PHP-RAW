<?php include_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'config.php') ?>

<?php 
   $id = $_GET['id'];
    
   /** communicate with datasource and get data for that id */
   $dataProducts= file_get_contents($datasource.'productitems.json');
   $products= json_decode($dataProducts);
  
  $product = null;
  foreach($products as $aproduct){
      if($aproduct->id == $id){
          $product = $aproduct;
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
						<img class="card-img-top img-fluid" src="<?=$webroot.'uploads/'.$product->src?>" alt="">

						<div class="card-body">
							<h5 class="card-title"><?=$aproduct->title?></h5>
							<p class="card-text"><?=$aproduct->caption?></p>
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
