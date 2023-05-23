<?php include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config.php') ?>
<?php

$filename = $_FILES['picture']['name']; // if you want to keep the name as is
$filename = uniqid() . "_" . $_FILES['picture']['name']; // if you want to keep the name as is
$target = $_FILES['picture']['tmp_name'];
$destination = $uploads . $filename;

$src = null;
if (upload($target, $destination)) {
    $src = $filename;
}

// sanitize

// validation


// image processing

// store : as json data to json file

// $id = 11;
// $uuid = 'asdfasdf';
// $src = $_POST['url'];
// $src = $_POST['url'];
$alt = $_POST['alt'];
$title = $_POST['title'];
$caption = $_POST['caption'];

$slide=[
        "uuid"=>uniqid(),
        "src"=>$src,
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