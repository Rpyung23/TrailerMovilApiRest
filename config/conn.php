<?php

  function Conectar()
  {
      //$conn = mysqli_connect('localhost','root','','trailer',3306);
      $conn = mysqli_connect('localhost','roman','s$aqXDC)7q?C','trailer',3306);

      if ($conn->connect_error)
      {
          return null;
      }else{
          //echo "conectado....";
          return $conn;
      }
  }

?>
