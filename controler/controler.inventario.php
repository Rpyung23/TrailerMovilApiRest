<?php

if (file_exists('model/model.inventario.php'))
{
    include_once 'model/model.inventario.php';
}else{
    include_once '../model/model.inventario.php';
}

class ControlerInventario
{
    function insertControlerInvario($datos)
    {
        $result = Inventario::registerModelInventario($datos['detalle'],$datos['stock']
            ,$datos['precio_compra'],$datos['fk_id_empleado']
            ,$datos['detalle_proveedor'],$datos['foto_producto']);

        return $result;
    }

    function readControlerInventario()
    {
        $result = Inventario::readModelInventario();
        return $result;
    }

    function readControlerPromedio($dateI,$dateF)
    {
        $result = Inventario::readPromedio($dateI,$dateF);
        return $result;
    }

}
?>
