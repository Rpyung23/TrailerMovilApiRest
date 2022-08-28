<?php

if (file_exists('model/model.clienteFactura.php'))
{
    include_once 'model/model.clienteFactura.php';
}else{
    include_once '../model/model.clienteFactura.php';
}

class ControllerClienteFactura
{
    public static function registerClienteFactura($dni, $names, $telefono, $direccion){
        return ClienteFactura::registerClienteFactura($dni, $names, $telefono, $direccion);
    }

    public static function readClienteFactura($dni){
        return ClienteFactura::readClienteFactura($dni);
    }
}

?>