<?php

  function Conectar()
  {
      $conn = mysqli_connect('localhost','root','','trailer',3306);

      if ($conn->connect_error)
      {
          return null;
      }else{
          //echo "conectado....";
          return $conn;
      }
  }

?>
