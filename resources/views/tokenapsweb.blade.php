<html xmlns='https://www.w3.org/1999/xhtml'>
    <head></head>
    <?php
    use App\Http\Controllers\api\v1\dto\APSDTO;
    $apsDTO = new APSDTO(APSDTO::$TRANS_TYPE_TOKENIZATION);
   echo $apsDTO->getSignature();

    echo "<body>";
    echo "	<form action='https://sbcheckout.payfort.com/FortAPI/paymentPage' method='post' name='frm'>";
    
    echo "<label style=\"font-size: 20px\"><u>TOKENIZATION</u></label><br><br>";
    echo "<label>Tokenization Request is sent to <i> \"https://sbcheckout.payfort.com/FortAPI/paymentPage\" </i> </label><br><br>";
    
    echo "		<input type='hidden' name='service_command' value='TOKENIZATION'>";//TOKENIZATION
    echo "		<input type='hidden' name='access_code' value='Ebze0qGC9D0DpexG7Oq0'>";
        echo "		<input type='hidden' name='merchant_identifier' value='5e4abeba'>";
    echo "		<input type='hidden' name='merchant_reference' value='ABC6789011'>";
    echo "	 <INPUT type='hidden' NAME='currency' value='SAR' />";
    echo "	 <INPUT type='hidden' NAME='language' value='en' />";
    echo "	 <INPUT type='hidden' NAME='expiry_date' value='2505' />";
    echo "	 <INPUT type='hidden' NAME='card_number' value='5123456789012346' />";
    echo "	 <INPUT type='hidden' NAME='card_security_code' value='123' />";
    echo "	 <INPUT type='hidden' NAME='return_url' value='https://isglobal.co/' />";
//    echo "	 <INPUT type='hidden' NAME='token_name' value='848757587458754854985895' />";
    echo "	 <INPUT type='hidden' NAME='signature' value='";
    echo $apsDTO->getSignature();
    echo "' />";   
    echo "		<script type='text/javascript'>";
    echo "			document.frm.submit();";
    echo "		</script>";
    echo "	</form>";
    echo "</body>";
    ?>
</html>