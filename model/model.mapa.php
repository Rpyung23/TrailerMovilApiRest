<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class Mapa{

  public static function updateModelMapa($id_mapa,$lat,$lng,$geo)
  {

    $sql = "update ubicacion set latitud = $lat,longitud = $lng 
                   ,geocoder = '".$geo."' where id_ubicacion = $id_mapa";

    mysqli_begin_transaction(Conectar(),MYSQLI_TRANS_START_READ_WRITE);

    mysqli_autocommit(Conectar(),false);

    try {
      $result = mysqli_query(Conectar(),$sql);

      if ($result)
      {
        mysqli_commit(Conectar());
        return true;
      }else{
        mysqli_rollback(Conectar());
      }
    }catch (Exception $e){
      mysqli_rollback(Conectar());
    }
    return false;
  }

  public static function readModelMapa()
  {

    $sql = "select * from ubicacion";


        $result = mysqli_query(Conectar(),$sql);
    $resultado = [];
    if (mysqli_num_rows($result) > 0)
    {
      while ($datos = mysqli_fetch_assoc($result))
      {
        $resultado[] = $datos;
      }
    }else{
      $resultado = null;
    }

    return $resultado;

}
  }


?>
