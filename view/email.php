<?php

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

// Función para enviar correos
function sendEmail($to, $subject, $message) {
    $headers = "From: _mainaccount@roman-company.com\r\n";
    $headers .= "Reply-To: _mainaccount@roman-company.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    return mail($to, $subject, $message, $headers);
}

$json = json_decode(file_get_contents('php://input'), true);

$to = "guaman1579@gmail.com,virtualcode7ecuador@gmail.com";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $message = "Email: " . $json["subject"] . "\n" . "Datos Personales: " . $json['names'] . "\n" . "Mensaje: " . $json['message'] . "\n" . "Telefono: " . $json['phone'];
        $bandera = sendEmail($to, $json['subject'], $message);
        echo json_encode(array_map('utf8_encode', array(
            'status_code' => $bandera ? 200 : 400,
            'mensaje' => $bandera ? utf8_decode("Email enviado con éxito") : 'Error al enviar email'
        )));
        break;
}
?>
