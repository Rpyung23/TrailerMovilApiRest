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

    function deleteControlerClienteMenuTemp($json)
    {
        $result = ClienteMenuTemp::deleteModelClienteMenuTemp($json['email'],$json['menu']);
        return $result;
    }

    function readControlerClienteMenuTemp($email)
    {
        $result = ClienteMenuTemp::readModelClienteMenuTemp($email);
        return $result;
    }


}
?>
