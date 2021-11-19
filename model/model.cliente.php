<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class Cliente{

  public static function registerModelCliente($email, $nombres, $foto, $direccion
      , $telefono, $password, $dni_ruc)
  {

    $pass =md5($password);

    $sql = "insert into cliente(email, nombres, foto, direccion, telefono, password, dni_ruc) 
              values('".$email."','".$nombres."','".$foto."','".$direccion."','".$telefono."','".$pass."','".$dni_ruc."')";
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


  public static function registerModelCompraWebCash($email_,$estado_,$tipo_,$recibo_)
  {
    //'guaman1579@gmail.com',1,'webcash',1,'123456789'
    $sql = "CALL insertFactura('".$email_."',$estado_,'webcash',$tipo_,'".$recibo_."')";
    //echo $sql;
    mysqli_begin_transaction(Conectar(),MYSQLI_TRANS_START_READ_WRITE);

    mysqli_autocommit(Conectar(),false);

    try {
      $result = mysqli_query(Conectar(),$sql);

      if ($result && mysqli_num_rows($result) > 0)
      {
        $bandera = mysqli_fetch_assoc($result);
        if ($bandera['bandera'] == 1)
        {
          mysqli_commit(Conectar());
          return true;
        }else{
          mysqli_rollback(Conectar());
        }
      }else{
        mysqli_rollback(Conectar());
      }
    }catch (Exception $e){
      mysqli_rollback(Conectar());
    }
    return false;
  }

  public static function updateModelCliente($email,$nombres, $foto, $direccion
      , $telefono, $dni_ruc)
  {

    $sql = "update cliente set nombres = '".$nombres."', foto = '".$foto."'
    , direccion='".$direccion."', telefono = '".$telefono."', dni_ruc = '".$dni_ruc."' 
    where email = '".$email."'";

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

  public static function readModelCliente($email)
  {
    $sql_ = "select * from cliente where email = '".$email."'";
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

  public static function loginCliente($email,$pass)
  {
    //$pass_ = password_hash($pass, PASSWORD_DEFAULT);
    $pass_ =md5($pass);

    $sql_ = "select C.email,C.nombres from cliente as C where C.email = '".$email."' and C.password = '".$pass_."'";
    //echo $sql_;
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



}


?>
