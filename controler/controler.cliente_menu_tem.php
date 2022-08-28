<?php

if (file_exists('model/cliente_menu_tem.php'))
{
    include_once 'model/cliente_menu_tem.php';
}else{
    include_once '../model/model.cliente_menu_tem.php';
}

class ControlerClienteMenuTemp
{
    function insertControlerClienteMenuTem($datos)
    {
        $result = ClienteMenuTemp::registerModelClienteMenuTemp($datos['email'],$datos['menu']
            ,$datos['cant']);
        return $result;
    }

    function registerModelClienteMenuTempEmpleado($menu,$cantidad,$empleado,$cliente)
    {
        return ClienteMenuTemp::registerModelClienteMenuTempEmpleado($menu,$cantidad,$empleado,$cliente);
    }

    function deleteControlerClienteMenuTemp($json)
    {
        $result = ClienteMenuTemp::deleteModelClienteMenuTemp($json['email'],$json['menu']);
        return $result;
    }


    function deleteControlerClienteMenuTempEmpleado($json)
    {
        //$empleado,$dni,$producto
        $result = ClienteMenuTemp::deleteModelClienteMenuTempEmpleado($json['empleado'],$json['dni'],$json['producto']);
        return $result;
    }

    function readControlerClienteMenuTemp($email)
    {
        $result = ClienteMenuTemp::readModelClienteMenuTemp($email);
        return $result;
    }


}
?>
