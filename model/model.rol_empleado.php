<?php

if (file_exists('config/includes.php'))
{
    require 'config/includes.php';
}else{
    require '../config/includes.php';
}

class Rol
{
    public static function readModelRol()
    {
        $sql = "select * from roles";
        $datos = mysqli_query(Conectar(),$sql);
        $resultado = [];
        if (mysqli_num_rows($datos) > 0)
        {
            while ($result = mysqli_fetch_assoc($datos))
            {
                $resultado[] = $result;
            }
            return $resultado;
        }else{
            return null;
        }

    }
}


?>