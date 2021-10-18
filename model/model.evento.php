<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class Evento{

  public static function registerModelEvento($nombre, $detalle, $ubicacion, $foto
      , $fecha_evento, $precio)
  {

    $sql = "insert into evento(nombre, detalle, ubicacion, foto, fecha_evento, precio,estado) 
                 values ('".$nombre."','".$detalle."','".$ubicacion."','".$foto."','".$fecha_evento."',$precio,1)";

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

  public static function updateModelEvento($id_evento,$nombre, $detalle, $ubicacion, $foto
      , $fecha_evento, $precio,$estado)
  {

    $sql = "update evento set nombre = '".$nombre."', detalle = '".$detalle."', ubicacion = '".$ubicacion."'
    , foto = '".$foto."', fecha_evento = '".$fecha_evento."'
    , precio = $precio, estado = $estado where id_evento = $id_evento";

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

  public static function readModelEvento($estado)
  {
    $sql_ = "";

    if($estado == 'all')
    {
      $sql_ = "select * from evento as E order by E.fecha_evento DESC";
    }else if ($estado == 'active')
    {
      $sql_ = "select * from evento as E where estado = 1 order by E.fecha_evento DESC";
    }

    $result = mysqli_query(Conectar(),$sql_);
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

  public static function deleteModelEvento($id_evento)
{

  $sql = "update evento set estado = 0 where id_evento = '".$id_evento."'";

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


}


?>
