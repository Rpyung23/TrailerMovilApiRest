<?php

if (file_exists('model/model.menu'))
{
    include_once 'model/model.tipo_menu.php';
}else{
    include_once '../model/model.tipo_menu.php';
}

class ControlerTipoMenu
{
    /*function insertControlerMenu($datos)
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
    }*/

    function readControlerTipoMenu()
    {
        $result = TipoMenu::readModelTipoMenu();
        return $result;
    }

    /*function deleteControlerMenu($datos)
    {
        $result = Menu::deleteModelMenu($datos['id_menu']);

        return $result;
    }*/

}
?>
