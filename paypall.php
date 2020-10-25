<?php
require 'Shoping_card_page.php';
require "app/start.php"; 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;           
                 
                 




echo $_SESSION['favcolor'];
$productname = "";
$productPrice = $_SESSION['amount'];  
$curency ="USD";
$shipingPrice = "";



$payer = new Payer();
$payer->setPaymentMethod("paypal");



$details = new Details();
$details->setShipping($shipingPrice)
    ->setTax(0)
    ->setSubtotal($productPrice);
	
$amount = new Amount();
$amount->setCurrency("USD")
    ->setTotal($productPrice + $shipingPrice )
    ->setDetails($details);
	
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Test")
    ->setInvoiceNumber(uniqid());
	
        
  $redirectUrls = new PayPal\Api\RedirectUrls();
  $redirectUrls->setReturnUrl(SITE_URL .'/resultPaypall.php?success=true')
  ->setCancelUrl(SITE_URL .'/resultPaypall.php?success=false');


        
    $payment = new PayPal\Api\Payment();
     $payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));
        
     $request = clone $payment;
      
     
     try {
    $payment->create($apiContext);
}catch (Exception $ex) {
	
	print_r($ex);
	
	exit(1);
}
     
     
 $approvalUrl = $payment->getApprovalLink();
?>
<?php header('Location:'.$approvalUrl);
 ob_end_flush();
?>
