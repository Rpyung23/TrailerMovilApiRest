<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class ClienteMenuTemp{

  public static function registerModelClienteMenuTemp($email, $menu, $cant)
  {

    $sql = "insert into cliente_menu_temp(fk_email, fk_id_menu, cantidad)
        values ('".$email."',$menu,$cant)";


    $sql_ver = "select count(*) contador from cliente_menu_temp where fk_email = '".$email."' and fk_id_menu= '".$menu."'";

    //echo $sql;

    $re = mysqli_query(Conectar(),$sql_ver);
    if (mysqli_num_rows($re)>0)
    {
      $contador = 0;
      while($lec = mysqli_fetch_assoc($re))
      {
        $contador = $lec['contador'];
      }
      if ($contador==0)
      {
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
      }else{
        return false;
      }

    }else{
      return false;
    }
    return false;
  }

  public static function deleteModelClienteMenuTemp($email,$menu)
  {

    $sql = "delete from cliente_menu_temp where fk_email = '".$email."' and fk_id_menu = ".$menu;

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

  public static function deleteModelClienteMenuTempEmpleado($empleado,$dni,$producto)
  {

    $sql = "delete from cliente_menu_temp where clienteDNI = '".$dni."' and empleado = '".$empleado."' and fk_id_menu = $producto";

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

  public static function readModelClienteMenuTemp($email)
  {
    $sql_ = "select CP.fk_id_menu,M.detalle,M.foto_menu,M.precio,CP.cantidad,(CP.cantidad*M.precio) total 
             from cliente_menu_temp as CP join menu as M on CP.fk_id_menu = M.id_menu where fk_email = '".$email."'";
    $result = mysqli_query(Conectar(),$sql_);
    $resultado = [];
    if (mysqli_num_rows($result) > 0)
    {
      while ($datos = mysqli_fetch_assoc($result))
      {
        $dato = array_map('utf8_encode',array('id_menu'=>$datos['fk_id_menu'],
            'detalle'=>$datos['detalle'],
            'foto'=>$datos['foto_menu'],
            'precio'=>$datos['precio'],
            'cantidad'=>$datos['cantidad'],
            'total'=>$datos['total']));
        $resultado[] = $dato;
      }
    }else{
      $resultado = null;
    }

    return $resultado;
  }

  public static function registerModelClienteMenuTempEmpleado($menu,$cantidad,$empleado,$cliente)
  {
    $sql = "insert into cliente_menu_temp(fk_id_menu, cantidad, empleado, clienteDNI,fechaRegistro) 
            values ($menu,$cantidad,'".$empleado."','".$cliente."',current_date())";

    mysqli_begin_transaction(Conectar(),MYSQLI_TRANS_START_READ_WRITE);
    mysqli_autocommit(Conectar(),false);

    try {
      mysqli_query(Conectar(),$sql);
      mysqli_commit(Conectar());
      return true;
    }catch (Exception $e){
      mysqli_rollback(Conectar());
      return false;
    }

  }



}


?>
