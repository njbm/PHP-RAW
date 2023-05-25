<?php include_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'config.php') ?>
<?php

$src=null;
$new_picture=null;
$old_picture=null;

$old_picture=$_POST['old_picture'];

if (array_key_exists('picture', $_FILES) && !empty($_FILES['picture']['name'])) {
    $filename = $_FILES['picture']['name']; // if you want to keep the name as is
    $filename = uniqid() . "_" . $_FILES['picture']['name']; // if you want to keep the name as is
    $target = $_FILES['picture']['tmp_name'];
    $destination = $uploads . $filename;

    if (upload($target, $destination)) {
        $new_picture = $filename;
    }

    if (file_exists($uploads . $old_picture)) {
        unlink($uploads . $old_picture);
    }
}



// d($_POST);

// sanitize

// validation


// image processing

// store : as json data to json file


$uuid = $_POST['uuid'];
$id = $_POST['id'];
// $src = $_POST['url'];
$src = $new_picture ?? $old_picture;

$price = $_POST['price'];
$title = $_POST['title'];
$caption = $_POST['caption'];

$product = [
            'id'=>$id,
            'uuid'=>$uuid,
            'src'=>$src,
            'price'=>$price,
            'title'=>$title,
            'caption'=>$caption
        ];



$dataProducts = file_get_contents($datasource.DIRECTORY_SEPARATOR.'productitems.json');
$products = json_decode($dataProducts);

foreach($products as $key=>$aproduct){
    if($aproduct->id == $id)
    break;
}
// d();
// d($slides);
// d($slide);
$products[$key] = (object) $product;
//dd($slides);


$data_products= json_encode($products);



if(file_exists($datasource."productitems.json")){
    $result = file_put_contents($datasource."productitems.json",$data_products);
}else{
    echo "File not found";
}

if($result){
    $message = "Data is updated Successfully";
    set_session('message',$message);
    // redirect("slider_index.php?message=".$message);
    redirect("product_index.php");
}

