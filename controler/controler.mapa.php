<?php

if (file_exists('model/model.mapa.php'))
{
    include_once 'model/model.mapa.php';
}else{
    include_once '../model/model.mapa.php';
}

class ControlerMapa
{
    function updateControlerMapa($datos)
    {

        $result = Mapa::updateModelMapa($datos['id_ubicacion'],$datos['latitud']
            ,$datos['longitud'],$datos['geocoder']);

        return $result;
    }


    function readControlerMapa()
    {

        $result = Mapa::readModelMapa();

        return $result;
    }

}
?>
