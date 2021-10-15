<?php

 if (file_exists('config/conn.php'))
 {
     include 'config/conn.php';
 }else{
     include '../config/conn.php';
 }


if (file_exists('config/cors.php'))
{
    include 'config/cors.php';
}else{
    include '../config/cors.php';
}



?>