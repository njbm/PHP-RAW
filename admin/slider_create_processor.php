<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

// dd($_GET);

$id = "1";
$uuid= "a";
$url = $_GET['src'];
$title= $_GET['title'];
$caption= $_GET['caption'];
$alt= $_GET['alt'];

$slide=[
    "id"=> $id,
    "uuid"=>$uuid,
    "src"=>$url,
    "title"=>$title,
    "caption"=>$caption,
    "alt"=>$alt
];


$dataSlides= file_get_contents($datasource.DIRECTORY_SEPARATOR. 'slideritems.json');
$slides=json_decode($dataSlides);

$slides[] = (object) $slide;
$data_slides = json_encode($slides);

if (file_exists($datasource. 'slideritems.json'))
{
    $result= file_put_contents($datasource. 'slideritems.json' , $data_slides);
}
else
{
    echo "File Not Found";
}

dd($result);