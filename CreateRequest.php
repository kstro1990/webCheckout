<?php
include('autentication.php');
class CreateRequest
{
  public function session(){
    $request = new stdClass();
    $new = new Autentication();
    $request->auth = $new -> auth();
    $request->buyer=$new -> buyerSet();
    $request->payment = $new -> amountSet("90.36");
    $request->expiration = "2019-08-03T15:43:05-05:00";
    $request->returnUrl="http://localhost/webcheckout/";
    $request->ipAddress="192.123.111.111";
    $request->userAgent ="Mozilla/5.0 (Windows NT 6.3; Win64; x64)";

    $denco= json_encode($request);
    // return $denco;
    $url = 'https://test.placetopay.ec/redirection/api/session';
    //Se inicia. el objeto CUrl
    $ch = curl_init($url);
    //creamos el json a partir del arreglo
    //$jsonDataEncoded = json_encode($request);
    //Indicamos que nuestra petición sera Post
    curl_setopt($ch, CURLOPT_POST, 1);
    //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //Adjuntamos el json a nuestra petición  $jsonDataEncoded
    curl_setopt($ch, CURLOPT_POSTFIELDS, $denco);
      //Agregar los encabezados del contenido
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'User-Agent: cUrl Testing'));
    //Ejecutamos la petición
    $result = curl_exec($ch);
    //$R = ((string) json_encode($request));
    return  $result;
  }

  public function getRequestInformation(){
    $request = new stdClass();
    $new = new Autentication();
    $request->auth = $new -> auth();
    // DEBUG: solo para ver
    $denco= json_encode($request);
    // return $denco;
    $url = 'https://test.placetopay.ec/redirection/api/session/'.'115861';
    //Se inicia. el objeto CUrl
    $ch = curl_init($url);
    //creamos el json a partir del arreglo
    //$jsonDataEncoded = json_encode($request);
    //Indicamos que nuestra petición sera Post
    curl_setopt($ch, CURLOPT_POST, 1);
    //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //Adjuntamos el json a nuestra petición  $jsonDataEncoded
    curl_setopt($ch, CURLOPT_POSTFIELDS, $denco);
      //Agregar los encabezados del contenido
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'User-Agent: cUrl Testing'));
    //Ejecutamos la petición
    $result = curl_exec($ch);
    //$R = ((string) json_encode($request));
    return  $result;

  }

}
$new = new CreateRequest();
// cambiar por metodos usados en la clase
$resultado = $new ->getRequestInformation();
$denco = json_encode($resultado);
echo $denco;
 ?>
