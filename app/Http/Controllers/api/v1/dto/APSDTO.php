<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APSDTO. Amazon Payment Service APS. DTO.
 *
 * @author Ahmed Kamal
 */

namespace App\Http\Controllers\api\v1\dto;
use App\Http\Controllers\api\v1\aps\bo\BOAPS;
use App\Http\Controllers\api\v1\aps\client\APSClient;

class APSDTO {

    public static $TRANS_TYPE_TOKENIZATION = 1; //With Tokenization
    public static $TRANS_TYPE_NORMAL = 0;//Without Tokenization.

    private $command;
    private $accessCode;
    private $merchantIdentifier;
    private $merchantReference;
    private $amount;
    private $currency;
    private $language;
    private $customerEmail;
    private $orderDescription;
    private $returnURL;
    private $signaturePrefix;
    private $signaturePostfix;
    private $hashingAlgorithm;
    private $signature;

    //Tokenization
    private $cardNumber;
    private $expiryDate;
    private $tokenName;
    private $cardHolderName;
    
    
    public function __construct() {
        $args = func_get_args(); //any function that calls this method can take an arbitrary number of parameters
        switch (func_num_args()) {
            //delegate to helper methods
            case 0:
                $this->construct0();
                break;
            case 1:
                $this->construct1($args[0]);
                break;
            case 2:
                $this->construct2($args[0], $args[1]);
                break;
//            case 3:
//                $this->construct3($args[0], $args[1], $args[2]);
//                break;
            default:
                trigger_error('Incorrect number of arguments for Foo::__construct', E_USER_WARNING);
        }
    }

    /**
     * Default constructor. with zero parameters.
     */
    public function construct0() {
        $this->init();
    }

    /**
     * Default constructor with 1 parameter.
     */
    public function construct1($transType) {
      if($transType == APSDTO::$TRANS_TYPE_TOKENIZATION)
      {
          $this->initTokenization();
      }else{
          die('No');
          $this->init();
      }
    }

    /**
     * Constructor with two parameters.
     * @param type $param1 target parameter 1
     * @param type $param2 target parameter 2
     */
    public function construct2($ticket, $userId) {
       
    }
    
    public function initTokenization() {
        
        $apsClient = new APSClient();
        $this->setSignature($apsClient->signature());
        return;
        
        $this->setHashingAlgorithm("SHA256");
//        //Dynamic Part.
        $this->setCommand("TOKENIZATION");
        $this->setAccessCode("Ebze0qGC9D0DpexG7Oq0");
        $this->setMerchantIdentifier("5e4abeba");
        $this->setMerchantReference("ABC6789011");
        $this->setLanguage("en");
        $this->setExpiryDate("2505");
        $this->setCardNumber("5123456789012346");
        $this->setReturnURL("https://isglobal.co/");
        $this->setAmount("100");
        $this->setCustomerEmail("a.kamal@isglobal.co");
        $this->setCurrency("SAR");
        
//        //Gen Signature.
        $boAPS = new BOAPS();
//        
        $this->setSignaturePrefix("15Z5uFc0S7/iIjpL6mao1O_}");
        $this->setSignaturePostfix("15Z5uFc0S7/iIjpL6mao1O_}");
//        
        $signature = $boAPS->generateSignature($this);
        $this->setSignature($signature);
        
        //Dynamic Part.
    }
    
    public function init() {
        return;
        $this->setReturnURL("https://google.com/");
        $this->setAccessCode("Ebze0qGC9D0DpexG7Oq0");
        $this->setMerchantIdentifier("5e4abeba");
        $this->setCurrency("SAR");
        $this->setLanguage("en");
        $this->setHashingAlgorithm("SHA256");
        
        //Dynamic Part.
        $this->setCommand("AUTHORIZATION");
//        $this->setCommand("PURCHASE");
        $this->setMerchantReference("ABC678901");
        $this->setAmount("21000");
        $this->setCustomerEmail("a.kamal@isglobal.co");
        $this->setOrderDescription("New Payment4");
        
        //Gen Signature.
        $boAPS = new BOAPS();
        
        $this->setSignaturePrefix("15Z5uFc0S7/iIjpL6mao1O_}");
        $this->setSignaturePostfix("15Z5uFc0S7/iIjpL6mao1O_}");
        
        $signature = $boAPS->generateSignature($this);
        $this->setSignature($signature);
        
        //Dynamic Part.
        
        /*
         *   <!--echo "<body>";
          echo "	<form action='https://sbcheckout.payfort.com/FortAPI/paymentPage' method='post' name='frm'>";
          echo "		<input type='hidden' name='command' value='AUTHORIZATION'>";
          echo "		<input type='hidden' name='access_code' value='Ebze0qGC9D0DpexG7Oq0'>";
          echo "		<input type='hidden' name='merchant_identifier' value='5e4abeba'>";
          echo "		<input type='hidden' name='merchant_reference' value='ABC123'>";
          echo "		<input type='hidden' name='amount' value='100'>";
          echo "		<input type='hidden' name='currency' value='SAR'>";
          echo "		<input type='hidden' name='language' value='en'>";
          echo "		<input type='hidden' name='customer_email' value='a.kamal@isglobal.co'>";
          echo "		<input type='hidden' name='signature' value='e7b3c7468242d9e755665b4f3a10b3ca747af3cf8b0a892e5966522723976edd'>";
          echo "          <input type='hidden' name='return_url' value='https://google.com/'>";
          echo "		<input type='hidden' name='order_description' value='Test First Payment'>";
          echo "		<script type='text/javascript'>";
          echo "			document.frm.submit();";
          echo "		</script>";
          echo "	</form>";
          echo "</body>";-->
         */
    }

    public function getCommand() {
        return $this->command;
    }

    public function getAccessCode() {
        return $this->accessCode;
    }

    public function getMerchantIdentifier() {
        return $this->merchantIdentifier;
    }

    public function getMerchantReference() {
        return $this->merchantReference;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function getCustomerEmail() {
        return $this->customerEmail;
    }

    public function getOrderDescription() {
        return $this->orderDescription;
    }

    public function getReturnURL() {
        return $this->returnURL;
    }

    public function setCommand($command) {
        $this->command = $command;
        return $this;
    }

    public function setAccessCode($accessCode) {
        $this->accessCode = $accessCode;
        return $this;
    }

    public function setMerchantIdentifier($merchantIdentifier) {
        $this->merchantIdentifier = $merchantIdentifier;
        return $this;
    }

    public function setMerchantReference($merchantReference) {
        $this->merchantReference = $merchantReference;
        return $this;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
        return $this;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

    public function setLanguage($language) {
        $this->language = $language;
        return $this;
    }

    public function setCustomerEmail($customerEmail) {
        $this->customerEmail = $customerEmail;
        return $this;
    }

    public function setOrderDescription($orderDescription) {
        $this->orderDescription = $orderDescription;
        return $this;
    }

    public function setReturnURL($returnURL) {
        $this->returnURL = $returnURL;
        return $this;
    }

    public function getSignaturePrefix() {
        return $this->signaturePrefix;
    }

    public function getSignaturePostfix() {
        return $this->signaturePostfix;
    }

    public function setSignaturePrefix($signaturePrefix) {
        $this->signaturePrefix = $signaturePrefix;
        return $this;
    }

    public function setSignaturePostfix($signaturePostfix) {
        $this->signaturePostfix = $signaturePostfix;
        return $this;
    }

    public function getHashingAlgorithm() {
        return $this->hashingAlgorithm;
    }

    public function setHashingAlgorithm($hashingAlgorithm) {
        $this->hashingAlgorithm = $hashingAlgorithm;
        return $this;
    }

    public function getSignature() {
        return $this->signature;
    }

    public function setSignature($signature) {
        $this->signature = $signature;
        return $this;
    }
    
    public function getCardNumber() {
        return $this->cardNumber;
    }

    public function getExpiryDate() {
        return $this->expiryDate;
    }

    public function getTokenName() {
        return $this->tokenName;
    }

    public function getCardHolderName() {
        return $this->cardHolderName;
    }

    public function setCardNumber($cardNumber) {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    public function setExpiryDate($expiryDate) {
        $this->expiryDate = $expiryDate;
        return $this;
    }

    public function setTokenName($tokenName) {
        $this->tokenName = $tokenName;
        return $this;
    }

    public function setCardHolderName($cardHolderName) {
        $this->cardHolderName = $cardHolderName;
        return $this;
    }



}
