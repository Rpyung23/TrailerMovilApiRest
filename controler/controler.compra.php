<?php

if (file_exists('model/model.compra.php'))
{
    include_once 'model/model.compra.php';
}else{
    include_once '../model/model.compra.php';
}

class ControlerCompra
{

    function readControlerCompraCliente($email)
    {
        $result = Compra::readModelCompra($email);
        return $result;
    }

    function readControlerDetalleCompraUnica($factura,$paypal)
    {
        $result = Compra::readModelDetalleCompraUnico($factura,$paypal);
        return $result;
    }

}
?>
