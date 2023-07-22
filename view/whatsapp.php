<?php
//TOKEN QUE NOS DA FACEBOOK
$token = 'EAAQhR0o42OUBALq69rcZCOr2nAtGvuMDnkyyxDW2ajChMFyC1RM1CqB66AhZAsVU0ZAu85sklZAk2r0AMaOYMGcws6UzMx8zbVI7jy88kMmB4ZBWhh5R0RdqsVznuLxwGKCqVV40MA5ZB4mxzTqNDzX6b7J2Yt39K6VfasebFOcM8sYR65UdrZAkHjqelHZBp5cBV2PEbzhACAZDZD';

// OBTENEMOS EL JSON ENVIADO POR POST
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// OBTENEMOS LOS TELEFONOS DEL JSON
$telefonos = isset($data['telefonos']) ? $data['telefonos'] : array();

//URL A DONDE SE MANDARA EL MENSAJE
$url = 'https://graph.facebook.com/v17.0/108271138990219/messages';

//CONFIGURACION DEL MENSAJE
$mensaje = array(
    "messaging_product" => "whatsapp",
    "type" => "template",
    "template" => array(
        "name" => "hello_world",
        "language" => array("code" => "en_US")
    )
);

$responses = array();

foreach ($telefonos as $telefono) {
    $mensaje["to"] = $telefono;

    //DECLARAMOS LAS CABECERAS
    $header = array(
        "Authorization: Bearer " . $token,
        "Content-Type: application/json"
    );

    //INICIAMOS EL CURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($mensaje));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
    $response = json_decode(curl_exec($curl), true);
    $responses[] = $response;

    //OBTENEMOS EL CODIGO DE LA RESPUESTA
    $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    //CERRAMOS EL CURL
    curl_close($curl);
}

//RESPUESTA FINAL
$final_response = array("status_code" => 200, "responses" => $responses);

//IMPRIMIMOS LA RESPUESTA FINAL
echo json_encode($final_response);
?>
