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

    function updateControlerEmpleado($datos)
    {
        $result = Empleado::updateModelEmpleado($datos['user'],$datos['pass']
            ,$datos['names'],$datos['telefono'],$datos['rol'],$datos['estado']);
        return $result;
    }

    function readControlerEmpleado(){
        $result = Empleado::readModelEmpleado();
        return $result;
    }

    function readControlerEmpleadoActivos()
    {
        $result = Empleado::readModelEmpleadoActivos();
        return $result;
    }

    function loginControlerEmpleado($datos)
    {
        $result = Empleado::loginEmpleado($datos['user'],$datos['pass']);
        return $result;
    }

    function deleteControlerEmpleado($datos)
    {
        $resultado = Empleado::deleteEmpleado($datos['user']);
        return $resultado;
    }


}
?>
