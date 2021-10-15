<?php

if (file_exists('model/model.empleado'))
{
    require 'model/model.empleado.php';
}else{
    require '../model/model.empleado.php';
}


class ControlerEmpleado
{
    function insertControlerEmpleado($datos)
    {
        $result = Empleado::registerModelEmpleado($datos['user'],$datos['pass']
            ,$datos['names'],$datos['telefono'],$datos['rol']);
        return $result;
    }

    function readControlerEmpleado(){
        $result = Empleado::readModelEmpleado();
        return $result;
    }

    function loginControlerEmpleado($datos)
    {
        $result = Empleado::loginEmpleado($datos['user'],$datos['pass']);
        return $result;
    }
}
?>
