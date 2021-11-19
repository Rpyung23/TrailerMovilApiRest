<?php

if (file_exists('model/model.cliente'))
{
    include_once 'model/model.cliente.php';
}else{
    include_once '../model/model.cliente.php';
}

class ControlerCliente
{
    function insertControlerCliente($datos)
    {
        $result = Cliente::registerModelCliente($datos['email'],$datos['nombres']
            ,$datos['foto'],$datos['direccion']
            ,$datos['telefono'],$datos['password']
            ,$datos['dni_ruc']);

        return $result;
    }

    function insertControlerCompraWebcash($datos)
    {
        $result = Cliente::registerModelCompraWebCash($datos['email'],$datos['estado'],$datos['tipo'],$datos['recibo']);
        return $result;
    }

    function updateControlerCliente($datos)
    {
        $result = Cliente::updateModelCliente($datos['email'],$datos['nombres']
            ,$datos['foto'],$datos['direccion']
            ,$datos['telefono']
            ,$datos['dni_ruc']);

        return $result;
    }

    function readControlerCliente($email)
    {
        $result = Cliente::readModelCliente($email);
        return $result;
    }

    function loginControlerCliente($datos)
    {
        $result = Cliente::loginCliente($datos['email'],$datos['pass']);
        return $result;
    }
}
?>
