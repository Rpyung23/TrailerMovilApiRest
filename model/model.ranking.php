<?php

if (file_exists('config/includes.php'))
{
  include_once 'config/includes.php';
}else{
  include_once '../config/includes.php';
}

class Ranking{

  public static function registerModelRanking($email,$detalle,$calif)
  {

    $sql = "insert into ranking(calificacion, detalle, fk_email) 
            values ($calif,'".$detalle."','".$email."')";

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

  public static function readModelNumStartRanking()
  {
    $sql_ = "select AVG(R.calificacion) as promedio from ranking as R";
    $result = mysqli_query(Conectar(),$sql_);
    $resultado = null;
    if (mysqli_num_rows($result) > 0)
    {
      while ($datos = mysqli_fetch_assoc($result))
      {
        $resultado = doubleval($datos['promedio']);
      }
    }else{
      $resultado = null;
    }

    return $resultado;
  }

}


?>
