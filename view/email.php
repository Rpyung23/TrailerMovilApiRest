<?php

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: PUT, POST, GET, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");


$json = json_decode(file_get_contents('php://input'),true);

$to = "guaman1579@gmail.com,virtualcode7ecuador@gmail.com";
//$to = "info@spainlab.es,rivera@spainlab.es,vadillo@spainlab.es";
switch ($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        $message = "Email : ".$json["subject"]."\n"."Datos Personales : ".$json['names']."\n"."Mensaje : ".$json['message']."\n"."Telefono : ".$json['phone'];
        $bandera = mail($to,$json['subject'],$message);
        echo json_encode(array_map('utf8_encode',array('status_code'=>$bandera ? 200 : 400,
            'mensaje'=>$bandera ? utf8_decode("Email enviado con éxito") : 'Error al enviar email')));

        break;
}

?>