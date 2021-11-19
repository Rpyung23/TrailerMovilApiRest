<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class Compra{

  public static function readModelCompra($email)
  {

    $sql_ = "select F.id_factura,F.num_recibo as paypal,F.fecha_registro,F.total_factura from factura as F where F.fk_email = '".$email."'";
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


  public static function readModelDetalleCompraUnico($factura,$paypal)
  {

    $sql_ = "select F.id_factura,F.num_recibo as paypal,F.fecha_registro,F.total_factura as total_factura,
       M.id_menu,M.detalle,M.precio as precioUni,FM.cantidad,FM.precioT as precioTU from factura as F
    join factura_menu as FM on F.id_factura = FM.fk_id_factura join menu as M on FM.fk_id_menu = M.id_menu
    where F.num_recibo = '".$paypal."' and F.id_factura = $factura";
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


}


?>
