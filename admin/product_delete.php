<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'PHP-RAW/config.php'); ?>
<?php
/** collect the intended ID */
//dd($_POST['id']);
//$id = $_GET['id'];
$id = $_POST['id'];

/** communicate with datasource and get data for that id */
$dataProducts= file_get_contents($datasource.'productitems.json');
$products = json_decode($dataProducts);

foreach ($products as $key => $product) {
    if ($product->id == $id) {
        break;
    }
}
// dd($key); to be deleted


unset($products[$key]);
//reindexing the array
$products = array_values($products);
$data_products= json_encode($products);


/**
 * option 2
 * array_splice($slides, $key, 1)
 *  
 * */
//array_splice($slides, $key, 1); // it reindexes
//$data_slides = json_encode($slides);


if (file_exists($datasource . "productitems.json")) {
    $result = file_put_contents($datasource . "productitems.json", $data_products);
    if ($result) { // edge case is not handled. if it writes nothing. length = 0

        redirect('product_index.php');
    }
} else {
    echo "File not found";
}


?>
