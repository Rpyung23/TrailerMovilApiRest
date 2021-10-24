<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class Inventario{

  public static function registerModelInventario($detalle,$stock, $precio,$id_empleado,
                                                 $detalle_proveedor, $foto)
  {

    $sql = "insert into producto(detalle, stock, fecha_registro, precio_compra, fk_id_empleado, 
                     detalle_proveedor, foto_producto) values ('".$detalle."',$stock,CURRENT_DATE(),$precio
                     ,'".$id_empleado."','".$detalle_proveedor."'
                     ,'".$foto."')";

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

  public static function readModelInventario()
  {
    $sql_ = "select id_producto,detalle, stock, fecha_registro, precio_compra
     , detalle_proveedor, foto_producto from producto";

    $result = mysqli_query(Conectar(),$sql_);
    $resultado = [];
    if (mysqli_num_rows($result) > 0)
    {
      while ($datos = mysqli_fetch_assoc($result))
      {
        $dato = array("id_producto"=>$datos['id_producto']
        ,"detalle"=>utf8_decode($datos["detalle"]),"stock"=>$datos["stock"],
            "fecha_registro"=>$datos["fecha_registro"]
        ,"precio_compra"=>$datos["precio_compra"],
            "detalle_proveedor"=>utf8_decode($datos['detalle_proveedor']),
            "foto_producto"=>$datos["foto_producto"]);
        $resultado[] = array_map("utf8_encode",$dato);
      }
    }else{
      $resultado = null;
    }

    return $resultado;
  }

}


?>
