<?php

if (file_exists('model/model.ranking.php'))
{
    include_once 'model/model.ranking.php';
}else{
    include_once '../model/model.ranking.php';
}

class ControlerRanking
{
    function insertControlerRanking($datos)
    {
        $result = Ranking::registerModelRanking($datos['email'],$datos['detalle'],$datos['calificacion']);

        return $result;
    }

    function readControlerNumStartRanking()
    {
        $result = Ranking::readModelNumStartRanking();
        return $result;
    }

}
?>
