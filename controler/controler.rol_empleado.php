<?php
if (file_exists('model/model.rol_empleado'))
{
    require 'model/model.rol_empleado.php';
}else{
    require '../model/model.rol_empleado.php';
}

class ControlerRolEmpleado
{
    function readControlerRolEmpleado()
    {
        return Rol::readModelRol();
    }
}



?>
