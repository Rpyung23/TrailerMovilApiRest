<?php
if (file_exists('config/includes.php')) {
    include_once 'config/includes.php';
} else {
    include_once '../config/includes.php';
}


class cNotification
{
    public static function readModelNotificationAll($tipo)
    {

        $sql = "select N.idNotificaion,N.name_notificacion,N.cant_alcanzada,N.precio_envio,
        convert(N.ultimo_envio,char(150)) ultimo_envio,N.texto from notificaciones as N 
        where ISNULL(N.html_content) order by N.idNotificaion desc";

        if ($tipo == 2) {
            $sql = "select N.idNotificaion,N.name_notificacion,N.cant_alcanzada,
                    convert(N.ultimo_envio,char(150)) ultimo_envio,N.html_content from notificaciones as N 
                    where !ISNULL(N.html_content) order by N.idNotificaion desc";
        }

        //echo  $sql;

        $result = mysqli_query(Conectar(), $sql);
        $resultado = [];
        if (mysqli_num_rows($result) > 0) {
            while ($datos = mysqli_fetch_assoc($result)) {
                if ($tipo == 2) {

                    $obj = array(
                        "idNotificaion" => ($datos['idNotificaion']),
                        "name_notificacion" => utf8_encode($datos['name_notificacion']),
                        "cant_alcanzada" => $datos['cant_alcanzada'],
                        "ultimo_envio" => $datos['ultimo_envio'],
                        "html_content" => $datos['html_content']
                    );
                } else {

                    $obj = array(
                        "idNotificaion" => ($datos['idNotificaion']),
                        "name_notificacion" => utf8_decode(utf8_encode($datos['name_notificacion'])),
                        "cant_alcanzada" => $datos['cant_alcanzada'],
                        "ultimo_envio" => $datos['ultimo_envio'],
                        "precio_envio" => $datos['precio_envio'],
                        "texto" => utf8_decode(utf8_encode($datos['texto']))
                    );
                }

                $res = array_map("utf8_encode", $obj);

                $resultado[] = $res;
            }
        } else {
            $resultado = null;
        }

        //var_dump($resultado);

        return $resultado;
    }

    public static function insertNotificationEmail($name, $content_html)
    {
        $sql = "INSERT INTO notificaciones (html_content, name_notificacion) VALUES ('".$content_html."', '".$name."')";

        mysqli_begin_transaction(Conectar(), MYSQLI_TRANS_START_READ_WRITE);

        mysqli_autocommit(Conectar(), false);

        try {
            $result = mysqli_query(Conectar(), $sql);

            if ($result) {
                mysqli_commit(Conectar());
                return true;
            } else {
                mysqli_rollback(Conectar());
            }
        } catch (Exception $e) {
            mysqli_rollback(Conectar());
        }
        return false;
    }

    public static function insertNotificationWhatsApp($name, $texto)
    {
        $sql = "INSERT INTO notificaciones (texto, name_notificacion) VALUES ('".$texto."', '".$name."')";

        mysqli_begin_transaction(Conectar(), MYSQLI_TRANS_START_READ_WRITE);

        mysqli_autocommit(Conectar(), false);

        try {
            $result = mysqli_query(Conectar(), $sql);

            if ($result) {
                mysqli_commit(Conectar());
                return true;
            } else {
                mysqli_rollback(Conectar());
            }
        } catch (Exception $e) {
            mysqli_rollback(Conectar());
        }
        return false;
    }
}
