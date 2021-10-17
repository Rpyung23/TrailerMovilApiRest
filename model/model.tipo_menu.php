<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class TipoMenu{

  /*public static function registerModelMenu($detalle, $precio, $foto
      , $tipo_menu)
  {

    $sql = "insert into menu(detalle, precio, estado, foto_menu, fk_id_tipo_menu) 
                 values ('".$detalle."',$precio,1
                 ,'".$foto."'
                 ,$tipo_menu)";

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
  }*/

  /*public static function updateModelMenu($id_menu,$detalle, $precio, $foto
      , $tipo_menu,$estado)
  {

    $sql = "update menu set detalle = '".$detalle."', precio = $precio
    , estado= $estado, foto_menu = '".$foto."', fk_id_tipo_menu = $tipo_menu 
    where id_menu = $id_menu";

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
  }*/

  public static function readModelTipoMenu()
  {
    $sql_ = "select * from tipo_menu";
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

  /*public static function deleteModelMenu($id_menu)
{

  $sql = "update menu set estado = 0 where id_menu = '".$id_menu."'";

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
}*/


}


?>
