<?php
class Autentication
{
  public function auth()
  {
    try {
      $auth = new stdClass();
      $auth->login = '6dd490faf9cb87a9862245da41170ff2';
      $auth->nonce =  "VMI5FKXWIPDMTT5FKUR"; //'abc123toma'; gmp_random
      $auth->seed = date('c');
      $auth->tranKey = base64_encode(hash('sha1', $auth->nonce . $auth->seed . "024h1IlD" , true));
      // $auth->escrito = ($auth->nonce.$auth->seed."yOE5h0US32Wd3c7D");
      // $auth->solo=sha1($auth->nonce . $auth->seed . "yOE5h0US32Wd3c7D" ,false);
      // $auth->tranKey = base64_encode(sha1( $auth->escrito, true));
      $auth->nonce = base64_encode($auth->nonce);
      return $auth;
    } catch (\Exception $e) {
      return $e;
    }
  }
  public function tdcSet($tdc,$cvv,$expirationMonth,$expirationYear){
    $card = new stdClass();
    $card->number = $tdc;
    if (!$cvv == "") {
      $card->cvv =$cvv;
      $card->expirationMonth = $expirationMonth;
      $card->expirationYear = $expirationYear;
      $instrument = new stdClass();
      $instrument->card = $card;
      return $instrument;
    }else {
      $instrument = new stdClass();
      $instrument->card = $card;
      return $instrument;
    }
  }
  public function amountSet($total){
    $amount = new stdClass();
    $amount->currency = "USD";
    $amount->total = $total;
    $payment = new stdClass();
        // uniqid();
    $payment->reference = "testpago1";
    $payment->description = 'descripcion de pago';
    $payment->amount = $amount;
    //IVA si es necesario
    // TODO: construir if para que fea dinamico
    $taxes = new stdClass();
    // $payment->taxes = $taxes->taxesSet();
    return $payment;
  }
  public function payerSet($data)
  {
    $payer = new stdClass();
    $payer->document="";
    $payer->documentType="";
    $payer->name="";
    $payer->surname="";
    $payer->email="";
    $payer->mobile="";
  }
  // public function buyerSet($data)
  // {
  //   $payer = new stdClass();
  //   $payer->document="";
  //   $payer->documentType="";
  //   $payer->name="";
  //   $payer->surname="";
  //   $payer->email="";
  //   $payer->mobile="";
  // }
  public function additionalSet($data){
    $additional = new stdClass();
    foreach ($data as $key => $value) {
      $additional->$key = $value;
    }
    return $additional;
  }
  public function creditGet(){
    $credit = new stdClass();
    $credit->code ="";
    $credit->type ="";
    $credit->groupCode ="";
    $credit->installment ="";
    return $credit;
  }
  public function baseSet(){
    $base = new stdClass();
    $base->userAgent = $_SERVER['HTTP_USER_AGENT'];
    $base->ipAddress="192.123.123.1";
    $base->locale="es_EC";
  }
  public function taxesSet(){
    $Taxo = new stdClass();
    //IVA
    $Taxo->kind="valueAddedTax";
    $Taxo->amount="12";
    $Taxo->base="100";
    return $Taxo;
  }
  public function buyerSet(){
    $buyer = new stdClass();
    //IVA
    $buyer->name="Natasha";
    $buyer->surname="Ondricka";
    $buyer->email="dnetix@yopmail.com";
    $buyer->document="1040035000";
    $buyer->documentType="CI";
    $buyer->mobile="3006108300";
    return $buyer;
  }
}

// $new = new Autentication();
// $resultado = $new ->auth();
// $denco= json_encode($resultado);
// echo $denco;

 ?>
