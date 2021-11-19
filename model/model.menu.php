<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class Menu{

  public static function registerModelMenu($detalle, $precio, $foto
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
  }

  public static function updateModelMenu($id_menu,$detalle, $precio, $foto
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
  }

  public static function readModelMenu($estado)
  {
    $sql_ = "";

    if($estado == 'all')
    {
      $sql_ = "select M.id_menu,M.detalle,M.precio,M.estado,M.foto_menu,TM.id_tipo_menu
     ,TM.detalle as detalle_tipo from menu as M join tipo_menu as TM 
         on M.fk_id_tipo_menu = TM.id_tipo_menu order by M.estado DESC";
    }else if ($estado == 'active')
    {
      $sql_ = "select M.id_menu,M.detalle,M.precio,M.estado,M.foto_menu,TM.id_tipo_menu
     ,TM.detalle as detalle_tipo from menu as M join tipo_menu as TM 
         on M.fk_id_tipo_menu = TM.id_tipo_menu where estado = 1 order by M.estado DESC";
    }

    $result = mysqli_query(Conectar(),$sql_);
    $resultado = [];
    if (mysqli_num_rows($result) > 0)
    {
      while ($datos = mysqli_fetch_assoc($result))
      {
        $dato = array("id_menu"=>$datos["id_menu"]
        ,"detalle"=>utf8_decode($datos["detalle"])
        ,"precio"=>$datos["precio"]
        ,"estado"=>$datos["estado"],"foto_menu"=>$datos["foto_menu"]
        ,"id_tipo_menu"=>$datos["id_tipo_menu"]
        ,"detalle_tipo"=>utf8_decode($datos["detalle_tipo"]));
        $resultado[] = array_map("utf8_encode",$dato);
      }
    }else{
      $resultado = null;
    }

    return $resultado;
  }

  public static function deleteModelMenu($id_menu)
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
}

  public static function readModelMenuUnico($menu)
  {
    $sql_ = "select M.id_menu,M.detalle,M.precio,M.estado,M.foto_menu,TM.id_tipo_menu
     ,TM.detalle as detalle_tipo from menu as M join tipo_menu as TM 
         on M.fk_id_tipo_menu = TM.id_tipo_menu where M.id_menu = $menu and estado = 1 order by M.estado DESC";

    $result = mysqli_query(Conectar(),$sql_);
    $resultado = [];
    if (mysqli_num_rows($result) > 0)
    {
      while ($datos = mysqli_fetch_assoc($result))
      {
        $dato = array("id_menu"=>$datos["id_menu"]
        ,"detalle"=>utf8_decode($datos["detalle"])
        ,"precio"=>$datos["precio"]
        ,"estado"=>$datos["estado"],"foto_menu"=>$datos["foto_menu"]
        ,"id_tipo_menu"=>$datos["id_tipo_menu"]
        ,"detalle_tipo"=>utf8_decode($datos["detalle_tipo"]));
        $resultado[] = array_map("utf8_encode",$dato);
      }
    }else{
      $resultado = null;
    }

    return $resultado;
  }

}


?>
