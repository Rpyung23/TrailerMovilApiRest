<?php
if (file_exists('controler/controler.compra.php'))
{
    include_once 'controler/controler.compra.php';
}else{
    include_once '../controler/controler.compra.php';
}

if (file_exists('config/createJson.php'))
{
    include_once 'config/createJson.php';
}else{
    include_once '../config/createJson.php';
}

$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD'])
{

    case 'GET':
        $oC = new ControlerCompra();
        $datos = null;
        if (strpos($_SERVER['REQUEST_URI'] , 'general'))
        {
            if (isset($_GET['email'])){
                $datos = $oC->readControlerCompraCliente($_GET['email']);
            }else{
                return;
            }
        }else if(strpos($_SERVER['REQUEST_URI'] , 'detalle'))
        {
            if (isset($_GET['factura']) && isset($_GET['paypal'])){
                $datos = $oC->readControlerDetalleCompraUnica($_GET['factura'],$_GET['paypal']);
            }else{
                return;
            }
        }
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'POST':
        $oC = new ControlerCompra();
        $datos = $oC->registroModelFacturaEmpleadoWeb($json['evento'],$json['email'],$json['total'],
                      $json['cantBoletos'],$json['recibopaypal']);
        $json = createJson(($datos));
        echo json_encode($json);
        break;
}

?>
