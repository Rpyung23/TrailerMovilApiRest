<?php

if (file_exists('config/includes.php'))
{
  require 'config/includes.php';
}else{
  require '../config/includes.php';
}

class Empleado{

  public static function registerModelEmpleado($_user,$_pass,$names,$telefono,$id_rol)
  {
    $sql = "insert into empleado(user, password, nombres, telefono, fk_id_rol) values('".$_user."','".$_pass."','".$names."','".$telefono."',$id_rol,1)";

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
  public static function readModelEmpleado()
  {
    $sql_ = "select * from empleado as E join roles as R on E.fk_id_rol = R.id_rol";
    $result = mysqli_query(Conectar(),$sql_);
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
  public static function loginEmpleado($user,$pass)
  {
    $sql_ = "select E.user,E.nombres,R.id_rol,R.detalle from empleado as E join roles as R on E.fk_id_rol = R.id_rol
       where E.user = '".$user."' and E.password = '".$pass."'";
    $result = mysqli_query(Conectar(),$sql_);
    $resultado = null;
    if (mysqli_num_rows($result) > 0)
    {
      $resultado = mysqli_fetch_assoc($result);
    }else{
      $resultado = null;
    }

    return $resultado;

  }
  public static function deleteEmpleado($user)
  {
    $sql = "UPDATE empleado SET estado = 0 WHERE  user = '".$user."'";

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
  public static function updateModelEmpleado($_user,$_pass,$names,$telefono,$id_rol,$estado)
  {
    $sql = "update empleado set user = '".$_user."', password ='".$_pass."' 
    , nombres = '".$names."', telefono = '".$telefono."', fk_id_rol = $id_rol,estado = $estado 
     where user = '".$_user."'";

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

}


?>
