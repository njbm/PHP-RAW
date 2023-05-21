<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

// dd($_GET);

// $id = "1";
// $uuid= "a";
$url = $_GET['src'];
$title= $_GET['title'];
$caption= $_GET['caption'];
$alt= $_GET['alt'];

$slide=[
    "uuid"=>uniqid(),
    "src"=>$url,
    "title"=>$title,
    "caption"=>$caption,
    "alt"=>$alt
];

$currentId=null;


$dataSlides= file_get_contents($datasource.DIRECTORY_SEPARATOR. 'slideritems.json');
$slides=json_decode($dataSlides);


if (count($slides)>0)
{
    $ids = [];
    foreach ($slides as $aslide) {
        $ids[] = $aslide->id;
    }
    sort($ids);
    $lastIndex = count($ids) - 1;
    $highestId = $ids[$lastIndex];
    $currentId = $highestId+1;
}
else{
    $currentId=1;
}
$slide['id']=$currentId;



$slides[] = (object) $slide;
$data_slides = json_encode($slides);

if (file_exists($datasource. 'slideritems.json'))
{
    $result= file_put_contents($datasource. 'slideritems.json' , $data_slides);
    redirect("slider_index.php");
}
else
{
    echo "File Not Found";
}

// dd($result);