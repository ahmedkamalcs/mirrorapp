<html xmlns='https://www.w3.org/1999/xhtml'>

    <head></head>

    <?php

    
    use App\Http\Controllers\api\v1\dto\APSDTO;

    $apsDTO = new APSDTO(APSDTO::$TRANS_TYPE_TOKENIZATION);
//    $apsDTO->init();
    
   
/*
    echo "<body>";
    echo "	<form action='https://sbcheckout.payfort.com/FortAPI/paymentPage' method='post' name='frm'>";
    
    echo "<label style=\"font-size: 20px\"><u>TOKENIZATION</u></label><br><br>";
    echo "<label>Tokenization Request is sent to <i> \"https://sbcheckout.payfort.com/FortAPI/paymentPage\" </i> </label><br><br>";
    
    echo "		<input type='hidden' name='service_command' value='TOKENIZATION'>";//TOKENIZATION
    echo "		<input type='hidden' name='access_code' value='Ebze0qGC9D0DpexG7Oq0'>";
    echo "		<input type='hidden' name='merchant_identifier' value='5e4abeba'>";
    echo "		<input type='hidden' name='merchant_reference' value='ABC6789011'>";
    
    echo "	 <INPUT type='hidden' NAME='language' value='en' />";
    echo "	 <INPUT type='hidden' NAME='expiry_date' value='2505' />";
    echo "	 <INPUT type='hidden' NAME='card_number' value='5123456789012346' />";
    echo "	 <INPUT type='hidden' NAME='card_security_code' value='123' />";
    echo "		<input type='hidden' name='customer_email' value='";
    echo $apsDTO->getCustomerEmail();
    echo"'>";
    echo "	 <input type='hidden' name='amount' value='100' />";
    //echo "	 <INPUT type='hidden' NAME='card_holder_name' value='**********' />";
    echo "	 <INPUT type='hidden' NAME='return_url' value='https://isglobal.co/' />";
    echo "	 <INPUT type='hidden' NAME='currency' value='SAR' />";
    echo "	 <INPUT type='hidden' NAME='token_name' value='848757587458754854985895' />";
    echo "	 <INPUT type='hidden' NAME='signature' value='";
    echo $apsDTO->getSignature();
    echo "' />";   
    echo "		<script type='text/javascript'>";
    echo "			document.frm.submit();";
    echo "		</script>";
    echo "	</form>";
    echo "</body>";
    */
    
     echo "Signature = " . $apsDTO->getSignature();
    
//    
//    
//    echo "		<input type='hidden' name='command' value='";
//    echo $apsDTO->getCommand();
//    echo"'>";
//    echo "		<input type='hidden' name='access_code' value='";
//    echo $apsDTO->getAccessCode();
//    echo"'>";
//    echo "		<input type='hidden' name='merchant_identifier' value='";
//    echo $apsDTO->getMerchantIdentifier();
//    echo"'>";
//    echo "		<input type='hidden' name='merchant_reference' value='";
//    echo $apsDTO->getMerchantReference();
//    echo"'>";
//    echo "		<input type='hidden' name='amount' value='";
//    echo $apsDTO->getAmount();
//    echo"'>";
//    echo "		<input type='hidden' name='currency' value='";
//    echo $apsDTO->getCurrency();
//    echo"'>";
//    echo "		<input type='hidden' name='language' value='en'>";
//    echo "		<input type='hidden' name='customer_email' value='";
//    echo $apsDTO->getCustomerEmail();
//    echo"'>";
//    echo "		<input type='hidden' name='signature' value='";
//    echo $apsDTO->getSignature();
//    echo"'>";
//    echo "          <input type='hidden' name='return_url' value='";
//    echo $apsDTO->getReturnURL();
//    echo"'>";
//    echo "		<input type='hidden' name='order_description' value='";
//    echo $apsDTO->getOrderDescription();
//    echo"'>";
//    echo "		<script type='text/javascript'>";
//    echo "			document.frm.submit();";
//    echo "		</script>";
//    echo "	</form>";
//    echo "</body>";
    
    
    ?>

    <!--echo "<body>";
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

</html>