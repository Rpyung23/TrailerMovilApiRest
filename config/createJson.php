<?php
function createJson($datos)
{


    $array = array('status'=>($datos == null ? 300 : 200),'datos'=>$datos);
    return $array;
}
?>