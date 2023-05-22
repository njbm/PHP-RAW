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

                <?php //include_once($partials.'chart.php') ?>

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
		<ul>
			<li><a href="slider_index_grid.php">Grid View</a></li>
			<li><a href="slider_index.php">List View</a></li>
		</ul>

		<a href="slider_create.php">Create</a>
		|<a href="slider_create.php">Trash (Delete | Restore)</a> | Download XL | Download PDF | Print View

		|<a href="slider-create.php">Trash (Delete | Restore)</a>
		 | Download XL | Download PDF | Print View

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

     ?> 
			<tr>
				<td title="<?=$slide->uuid?>"><?=++$key?></td>
				<td><?=$slide->title?></td>
				<!-- <td><img src="<?php //=$slide->src?>" height="70"></td> -->
				<td><img src="<?= $webroot.'uploads/'.$slide->src?>" style="width:100px;height:100px"></td>

				<td><?=$slide->alt?></td>
				<td><?=$slide->caption?></td>
				<td> 
				<a href="slider_show.php?id=<?=$slide->id?>"><button class="btn btn-primary">Show</button></a>
				<a href="slider_edit.php?id=<?=$slide->id?>"><button class="btn btn-info">Edit</button></a>
				<a href="slider_update.php?id=<?=$slide->id?>"><button class="btn btn-primary">D</button></a>

				
				<form action="slider_delete.php" method="post">
				<!-- <a href="slider_delete.php?id=<?php //=$slide->id?>">Delete</a>  -->
					<button class="btn btn-danger" type="submit">Delete</button>
					<input type="hidden" name="id" value="<?=$slide->id?>" />
				</form>
				
				| Activate/InActive | Copy</td>
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
