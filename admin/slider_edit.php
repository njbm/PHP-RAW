<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>

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
<?php include_once($partials . 'head.php') ?> <!--head-->

<body>
    <?php include_once($partials . 'nav.php') ?> <!--nav-->

    <div class="page-content"> <!--Start Page content -->

        <?php include_once($partials . 'sidebar.php') ?> <!--side bar-->

        <div class="content-wrapper"> <!-- Main content -->
            <?php include_once($partials . 'pageHeader.php') ?> <!--page header-->

            <!-- Content area -->
            <div class="content">
                <?php //include_once($partials.'chart.php') 
                ?>


                <!-- Dashboard content -->


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Create New Slide</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="slider_edit_processor.php" method="GET">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" placeholder="<?=$slide->id?>">
                    </div>
                    <div class="form-group">
                        <label>UUID</label>
                        <input type="text" class="form-control" placeholder="<?=$slide->uuid?>">
                    </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" value="<?=$slide->title?>" name="title" class="form-control" placeholder="Give a Title">
                        </div>
                        <div class="form-group">
                            <label>Alternative</label>
                            <input type="text" value="<?=$slide->alt?>" name="alt" class="form-control" placeholder="Alternative Name">
                        </div>

                        <div class="form-group">
                            <label>Caption</label>
                            <input type="text" value="<?=$slide->caption?>" name="caption" class="form-control" placeholder="Add a Caption">
                        </div>
                        <div class="form-group">
                            <label>Picture URL</label>
                            <input type="text" <?=$slide->src?> name="src" class="form-control" placeholder="Add a Caption">
                        </div>

                        <div class="form-group">
                            <label>Add Picture</label>
                            <div class="uniform-uploader"><input type="file" class="form-input-styled" data-fouc="">
                                <span class="filename text-muted" style="user-select: none;">No file selected</span>
                                <span class="action btn bg-pink-400 legitRipple" style="user-select: none;">Choose File</span>
                            </div>
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="4" cols="4" name="description" class="form-control" placeholder="Write a Description"></textarea>
                        </div>

                        <div class="text-left">
                            <button type="submit" class="btn btn-danger legitRipple"> Cancel </button>
                            <button type="submit" class="btn btn-primary legitRipple">
                                Submit <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


                <!-- /dashboard content -->


            </div> <!-- /content area -->

            <?php include_once($partials . 'footer.php') ?>
        </div> <!-- /main content -->

    </div> <!-- /page content -->
</body>

</html>