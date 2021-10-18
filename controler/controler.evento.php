<?php

if (file_exists('model/model.evento.php'))
{
    include_once 'model/model.evento.php';
}else{
    include_once '../model/model.evento.php';
}

class ControlerEvento
{
    function insertControlerEvento($datos)
    {
        $result = Evento::registerModelEvento($datos['nombre'],$datos['detalle']
            ,$datos['ubicacion'],$datos['foto']
            ,$datos['fecha_evento'],$datos['precio']);
        return $result;
    }

    function updateControlerEvento($datos)
    {

        $result = Evento::updateModelEvento($datos['id_evento'],$datos['nombre'],$datos['detalle']
            ,$datos['ubicacion'],$datos['foto']
            ,$datos['fecha_evento'],$datos['precio']
            ,$datos['estado']);

        return $result;
    }

    function readControlerEvento($estado)
    {
        $result = Evento::readModelEvento($estado);
        return $result;
    }

    function deleteControlerEvento($datos)
    {
        $result = Evento::deleteModelEvento($datos['id_evento']);

        return $result;
    }

}
?>
