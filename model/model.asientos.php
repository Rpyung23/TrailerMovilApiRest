<?php
if (file_exists('config/includes.php'))
{
    include_once 'config/includes.php';
}else{
    include_once '../config/includes.php';
}


class cAsiento
{
    public static function readModelAsientos()
    {
        $sql = "select * from asientos";
        $result = mysqli_query(Conectar(),$sql);
        $resultado = [];
        if (mysqli_num_rows($result) > 0)
        {
            while ($datos = mysqli_fetch_assoc($result))
            {
                $resultado[] = $datos;
            }
        }else{
            $resultado = null;
        }

        return $resultado;
    }
    public static function updateModelNumeroAsientos($tamanio)
    {

    }

}


?>
