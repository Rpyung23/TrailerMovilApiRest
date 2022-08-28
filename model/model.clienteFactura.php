<?php

if (file_exists('config/includes.php'))
{
    include_once 'config/includes.php';
}else{
    include_once '../config/includes.php';
}

class ClienteFactura
{
    public  static function registerClienteFactura($dni, $names, $telefono, $direccion)
    {
        $sql = "insert into clientesFactura(dni, names, telefono, direccion) values 
                    ('".$dni."','".$names."','".$telefono."','".$direccion."')";
        //echo $sql;
        mysqli_begin_transaction(Conectar(),MYSQLI_TRANS_START_READ_WRITE);

        mysqli_autocommit(Conectar(),false);

        try {
            $result = mysqli_query(Conectar(),$sql);

            if ($result)
            {
                mysqli_commit(Conectar());
                return true;
            }else{
                mysqli_rollback(Conectar());
            }
        }catch (Exception $e){
            mysqli_rollback(Conectar());
        }
        return false;
    }

    public static function readClienteFactura($dni)
    {
        $sql = "select CF.dni,CF.names,CF.direccion,CF.telefono from clientesFactura as CF where CF.estado = 1 and CF.dni = '".$dni."'";
        //echo $sql;
        $result = mysqli_query(Conectar(),$sql);
        $resultado = [];
        if ($result!= null && mysqli_num_rows($result) > 0)
        {
            while ($datos = mysqli_fetch_assoc($result))
            {
                $resultado = $datos;
            }
        }else{
            $resultado = null;
        }

        return $resultado;
    }

}




?>