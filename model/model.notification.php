<?php
if (file_exists('config/includes.php'))
{
    include_once 'config/includes.php';
}else{
    include_once '../config/includes.php';
}


class cNotification
{
    public static function readModelNotificationAll($tipo)
    {

        $sql = "select N.idNotificaion,N.name_notificacion,N.cant_alcanzada,N.precio_envio,
        convert(N.ultimo_envio,char(150)) ultimo_envio,N.texto from notificaciones as N 
        where ISNULL(N.html_content) order by N.idNotificaion desc";

        if($tipo == 2)
        {
            $sql = "select N.idNotificaion,N.name_notificacion,N.cant_alcanzada,
                    convert(N.ultimo_envio,char(150)) ultimo_envio,N.html_content from notificaciones as N 
                    where !ISNULL(N.html_content) order by N.idNotificaion desc";
        }

        //echo  $sql;

        $result = mysqli_query(Conectar(),$sql);
        $resultado = [];
        if (mysqli_num_rows($result) > 0)
        {
            while ($datos = mysqli_fetch_assoc($result))
            {
                if($tipo == 2){

                    $obj = array("idNotificaion"=>($datos['idNotificaion']),
                        "name_notificacion"=>utf8_encode($datos['name_notificacion']),
                        "cant_alcanzada"=>$datos['cant_alcanzada'],
                        "ultimo_envio"=>$datos['ultimo_envio'],
                        "html_content"=>$datos['html_content']);
                }else{

                    $obj = array("idNotificaion"=>($datos['idNotificaion']),
                        "name_notificacion"=>utf8_decode(utf8_encode($datos['name_notificacion'])),
                        "cant_alcanzada"=>$datos['cant_alcanzada'],
                        "ultimo_envio"=>$datos['ultimo_envio'],
                        "precio_envio"=>$datos['precio_envio'],
                        "texto"=>utf8_decode(utf8_encode($datos['texto'])));
                }

                $res = array_map("utf8_encode",$obj);

                $resultado[] = $res;

            }
        }else{
            $resultado = null;
        }

        //var_dump($resultado);

        return $resultado;
    }

}


?>
