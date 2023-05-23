<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

$filename = $_FILES['picture']['name']; // if you want to keep the name as is
$filename = uniqid() . "_" . $_FILES['picture']['name']; // if you want to keep the name as is with a uniq id
$target = $_FILES['picture']['tmp_name'];
$destination = $uploads . $filename;

$src = null;
if (upload($target, $destination)) {
    $src = $filename;
}

// dd($_GET);
// $id = "Not a Input ";
// $uuid = "Not a Input";
// $src = $_POST['url'];

$price = $_POST['price'];
$title = $_POST['title'];
$caption = $_POST['caption'];

$product = [
    
    "uuid" => uniqid(),
    "src" => $src,
    "price" => $price,
    "title" => $title,
    "caption" => $caption,
];

$currentId= null;

$dataProducts= file_get_contents($datasource.'productitems.json');
$products = json_decode($dataProducts);

if (count($products)>0)
{
    $ids = [];
    foreach ($products as $aproduct) {
        $ids[] = $aproduct->id;
    }
    sort($ids);
    $lastIndex = count($ids) - 1;
    $highestId = $ids[$lastIndex];
    $currentId = $highestId+1;
}
else{
    $currentId=1;
}

$product['id']=$currentId;

$products[] = (object)$product;
$dataProduct = json_encode($products);

if (file_exists($datasource . "productitems.json")) {
    $result = file_put_contents($datasource . "productitems.json", $dataProduct);
    redirect('product_index.php');
} else {
    echo "File not found";
}

// dd($result);
