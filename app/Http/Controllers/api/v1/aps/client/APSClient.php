<?php

namespace App\Http\Controllers\api\v1\aps\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\v1\ModelFactory;
use App\Http\Model\v1\event\EventCategoryModel;
use App\Http\Controllers\api\v1\dto\InvoiceDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Models\api\v1\paymentmodel\InvoiceModel;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\APSDTO;
use App\Http\Controllers\api\v1\dto\APPDTO;
use App\Http\Controllers\api\v1\dto\JsonHandlerDTO;

/* * *
 * @author ISG.
 * Business event class that handles business logic for Event Details table.
 */
use App\Http\Controllers\api\v1\sns\bo\BSnsService;

class APSClient {

    public function requestAuthorization() {

        $requestParams = array(
            'command' => 'AUTHORIZATION',
            'access_code' => 'Ebze0qGC9D0DpexG7Oq0',
            'merchant_identifier' => '5e4abeba',
            'merchant_reference' => 'XYZ9239-yu898',
            'amount' => '10000',
            'currency' => 'SAR',
            'language' => 'en',
            'customer_email' => 'a.kamal@isglobal.co',
            'signature' => '66721ab94783a04879efe20a85cea6a91cef4b580b4a8df28ab0744179f462c7',
            'order_description' => 'Test First Payment',
        );


        $redirectUrl = 'https://sbcheckout.payfort.com/FortAPI/paymentPage';
        echo "<html xmlns='https://www.w3.org/1999/xhtml'>\n<head></head>\n<body>\n";
        echo "<form action='$redirectUrl' method='post' name='frm'>\n";
        foreach ($requestParams as $a => $b) {
            echo "\t<input type='hidden' name='" . htmlentities($a) . "' value='" . htmlentities($b) . "'>\n";
        }
        echo "\t<script type='text/javascript'>\n";
        echo "\t\tdocument.frm.submit();\n";
        echo "\t</script>\n";
        echo "</form>\n</body>\n</html>";
    }

    //Purhcase by Token Name. 2
    public function signature() {
        $shaString = '';
        // array request
        $arrData = array(
            'access_code' => 'Ebze0qGC9D0DpexG7Oq0',
            'amount' => '100',//Tokenization
            'currency' => 'SAR',
            'customer_email' => 'a.kamal@isglobal.co',//Tokenization
            'customer_ip' => '41.35.171.248',
            'language' => 'en',
            'merchant_identifier' => '5e4abeba',
            'merchant_reference' => 'ABC6789011',
            'return_url' => 'https://isglobal.co/',
            'command' => 'PURCHASE',
            'token_name' => 'd75de7b69d914e098095e260966b363e',
                        
            
//            'expiry_date' => '2505',//Tokenization
            
//            'card_number' => '5123456789012346',//Tokenization
//            'order_description' => 'Test First Payment',//Tokenization
//            'card_security_code' => '123',//Tokenization
//            'token_name' => '848757587458754854985895',//Tokenization
            
        );
        // sort an array by key
        ksort($arrData);
        foreach ($arrData as $key => $value) {
            $shaString .= "$key=$value";
        }
        // make sure to fill your sha request pass phrase
        $shaString = "15Z5uFc0S7/iIjpL6mao1O_}" . $shaString . "15Z5uFc0S7/iIjpL6mao1O_}";

        $signature = hash("SHA256", $shaString);
        // your request signature
        return $signature;
    }
    
    //Tokenization..... Meeting with Dina. APS.
//    public function signature() {
//        $shaString = '';
//        // array request
//        $arrData = array(
//            'access_code' => 'Ebze0qGC9D0DpexG7Oq0',
//            'currency' => 'SAR',
//            'language' => 'en',
//            'merchant_identifier' => '5e4abeba',
//            'merchant_reference' => 'ABC6789011',
//            'return_url' => 'https://isglobal.co/',
//            'service_command' => 'TOKENIZATION',
//            
////            'amount' => '100',//Tokenization
////            'expiry_date' => '2505',//Tokenization
////            'customer_email' => 'a.kamal@isglobal.co',//Tokenization
////            'card_number' => '5123456789012346',//Tokenization
////            'order_description' => 'Test First Payment',//Tokenization
////            'card_security_code' => '123',//Tokenization
////            'token_name' => '848757587458754854985895',//Tokenization
//            
//        );
//        // sort an array by key
//        ksort($arrData);
//        foreach ($arrData as $key => $value) {
//            $shaString .= "$key=$value";
//        }
//        // make sure to fill your sha request pass phrase
//        $shaString = "15Z5uFc0S7/iIjpL6mao1O_}" . $shaString . "15Z5uFc0S7/iIjpL6mao1O_}";
//
//        $signature = hash("SHA256", $shaString);
//        // your request signature
//        return $signature;
//    }
public function iOSsignature(Request $request) {
    $shaString  = '';

    $arrData    = array(
    'service_command'    =>'SDK_TOKEN',
    'access_code'        =>APPDTO::$access_code,
    'merchant_identifier'=>APPDTO::$merchant_identifier,
    'device_id'=> $request['device_id'],
    'language'           =>$request['langugage'],
    );
  
    // sort an array by key
    ksort($arrData);
    foreach ($arrData as $key => $value) {
        $shaString .= "$key=$value";
    }
    // make sure to fill your sha request pass phrase
    $shaString = APPDTO::$request_pharse . $shaString . APPDTO::$request_pharse;

    $signature = hash("SHA256", $shaString);
    // your request signature
    return $signature;
}

    public function tokenRequest() {

        $apsDTO = new APSDTO(APSDTO::$TRANS_TYPE_TOKENIZATION);
        $apsDTO->init();

        $url = 'https://sbpaymentservices.payfort.com/FortAPI/paymentApi'; 
        $data = "service_command=" . 'TOKENIZATION' . 
                "&access_code=" . 'Ebze0qGC9D0DpexG7Oq0' .
                "&merchant_identifier=" . '5e4abeba' . 
                "&merchant_reference=" . 'ABC6789010' .
                "&language=" . 'en' .
                "&expiry_date=" . '2505' .
                "&card_number=" . '5123456789012346'. 
                "&card_security_code=" . '123'.
                "&signature=" . $apsDTO->getSignature(). //Generated Signature! Based on APS rules.
                "&return_url=" . 'https://isglobal.co/'.
                "&currency=" . 'SAR'.
                "&token_name=" . 'MY_TOKEN'; 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            
            return curl_error($ch);
        }
        curl_close($ch);
        
        return $responseData;

        /*
          $resposne = "Done!";
          $jsonResult = json_encode($resposne);
          header('Content-Type: application/json; charset=utf-8');
          echo $jsonResult;
          exit(); */
    }
    public function iOStokenRequest(Request $request) {
   
        $apsDTO = new APSDTO(APSDTO::$TRANS_TYPE_TOKENIZATION);
        $apsDTO->init();
        $appClient=new APSClient();
        $url = 'https://sbpaymentservices.payfort.com/FortAPI/paymentApi';

        $arrData = array(
        'service_command' => 'SDK_TOKEN',
        'access_code' =>APPDTO::$access_code,
        'merchant_identifier' => APPDTO::$merchant_identifier,
        'language' => $request['langugage'],
        'device_id'=> $request['device_id'],
        'signature' => $appClient->iOSsignature($request),
        );

        $ch = curl_init( $url );
        # Setup request to send json via POST.
        $data = json_encode($arrData);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        # Print response.
        if (curl_errno($ch)) {
            
            return curl_error($ch);
        }
        curl_close($ch);
        if($result->status=="22"){
            $response = ['sdk_token' =>$result->sdk_token,
            'response_message' => $result->response_message,
            'response_code' => $result->response_code,
            'status'=>$result->status];                   
        }else{
            $response = ['sdk_token' =>"",
            'response_message' => $result->response_message,
            'response_code' => $result->response_code,
            'status'=>$result->status];  
        }

        $jsonResult = json_encode($response);
        return $jsonResult;

        /*
          $resposne = "Done!";
          $jsonResult = json_encode($resposne);
          header('Content-Type: application/json; charset=utf-8');
          echo $jsonResult;
          exit(); */
    }
    
    public function getSignatureForToken()
    {
     $apsDTO = new APSDTO(APSDTO::$TRANS_TYPE_TOKENIZATION);
      
     return $apsDTO->getSignature();
   
    }

}
