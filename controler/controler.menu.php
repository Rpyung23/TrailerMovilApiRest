<?php

if (file_exists('model/model.menu'))
{
    include_once 'model/model.menu.php';
}else{
    include_once '../model/model.menu.php';
}

class ControlerMenu
{
    function insertControlerMenu($datos)
    {
        $result = Menu::registerModelMenu($datos['detalle'],$datos['precio']
            ,$datos['foto'],$datos['tipo']);

        return $result;
    }

    function updateControlerMenu($datos)
    {

        $result = Menu::updateModelMenu($datos['id_menu'],$datos['detalle']
            ,$datos['precio'],$datos['foto'],$datos['tipo_menu'],$datos['estado']);

        return $result;
    }

    function readControlerMenu($estado)
    {
        $result = Menu::readModelMenu($estado);
        return $result;
    }

    function readControlerMenuUnico($menu)
    {
        $result = Menu::readModelMenuUnico($menu);
        return $result;
    }


    function readControlerItemMenuUnico($menu)
    {
        $result = Menu::readModelItemMenuUnico($menu);
        return $result;
    }

    function deleteControlerMenu($datos)
    {
        $result = Menu::deleteModelMenu($datos['id_menu']);

        return $result;
    }

}
?>
