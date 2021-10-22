<?php

if (file_exists('config/includes.php'))
{
    include_once 'config/includes.php';
}else{
    include_once '../config/includes.php';
}


if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif"))
{
    //var_dump($_FILES["file"]);
//
    $path =  "../images/" . $_FILES['file']['name'];
    if (move_uploaded_file($_FILES["file"]["tmp_name"],$path)) {
        //more code here...
        echo json_encode(array("status"=>200,"url"=>$path));
    } else {
        echo json_encode(array("status"=>400,"url"=>""));
    }
} else {
    echo json_encode(array("status"=>400,"url"=>""));
}

?>