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

    $sql_ = "select FE.idFactura,E.nombre as nombreEvento,FE.cantBoletos,FE.totalFactura,E.precio,
       C.email,C.nombres,C.telefono,C.direccion,FE.fechaRegistro,FE.num_recibo
       from facturaEventos as FE join
       evento as E on FE.IdEvento = E.id_evento join cliente as C on
       FE.usuarioCompra = C.email where FE.usuarioCompra = '".$email."' order by FE.fechaRegistro desc;";
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

    $sql_ = "select FE.idFactura,E.nombre as nombreEvento,FE.cantBoletos,FE.totalFactura,E.precio,
       C.email,C.nombres,C.telefono,C.direccion,FE.fechaRegistro,FE.num_recibo
       from facturaEventos as FE join
       evento as E on FE.IdEvento = E.id_evento join cliente as C on
       FE.usuarioCompra = C.email where FE.idFactura = '".$factura."';";
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

  public static function registroModelFacturaEmpleadoWeb($evento,$email,$total,$cantBoletos,$recibopaypal)
  {
    $oSql = "call registroCompraBoletos(".$evento.",'".$email."',".$total.",
                    ".$cantBoletos.",'".$recibopaypal."')";

    $result = mysqli_query(Conectar(),$oSql);
    $resultado = null;

    if ($result !=null && mysqli_num_rows($result) > 0)
    {
      $resultado = mysqli_fetch_assoc($result);
      return $resultado['resultado'];
    }

    return $resultado;


  }

}


?>
