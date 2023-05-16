<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php
    $dataSlides= file_get_contents($datasource. 'slideritems.json');
    $slides= json_decode($dataSlides);

?>


<!DOCTYPE html>
<html lang="en">

<?php include_once($partials . 'head.php') ?>

<body>

    <?php include_once($partials . 'nav.php') ?>


    <!-- Page content -->
    <div class="page-content">

        <?php include_once($partials . 'sidebar.php') ?>



        <!-- Main content -->
        <div class="content-wrapper">


            <?php include_once($partials . 'pageHeader.php') ?>


            <!-- Content area -->
            <div class="content">

                <?php //include_once($partials.'chart.php') 
                ?>



                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">
                                    <!-- Bordered table -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Slides</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
						 Create | Trash (Delete | Restore) | Download XL | Download PDF | Print View
					</div>

					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Src</th>
									<th>Alt</th>
									<th>Caption</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

<?php
    foreach($slides as $key=>$slide):
        // if(0 == $key){
        //  $active = 'active';
        // }else{
        //  $active = '';
        // }
     ?> 


								<tr>
									<td title="<?=$slide->uuid?>"><?=++$key?></td>
									<td><?=$slide->title?></td>
									<td><img src="<?=$slide->src?>" style="width:100px;height:100px"></td>
									<td><?=$slide->alt?></td>
									<td><?=$slide->caption?></td>
									<td> Show | Edit | Delete | Activate/InActive | Copy</td>
								</tr>
<?php
 endforeach
?>
							</tbody>
						</table>
					</div>
				</div>
                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /content area -->


            <?php include_once($partials . 'footer.php') ?>


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>