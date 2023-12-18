<?php

namespace App\Http\Controllers\api\v1\paymentmodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentProviderConfig;
use App\Http\Controllers\api\v1\dto\PaymentProviderConfigDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;

class PaymentProviderConfigClient  {

    
    public function save(Request $request)
    {
//         $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//        $response['Message'] = "Successfully Saved Object";
//        
//        return JsonHandler::getJsonMessage($response);
        
       $paymentProviderConfigDTO = new PaymentProviderConfigDTO();
       $paymentProviderConfigDTO->setProviderName($request->providerName);
       
      
       
       $bPaymentProviderConfig = new BPaymentProviderConfig();
       $paymentProviderConfigDTO->setApiCall('0');
       return $bPaymentProviderConfig->saveObject($paymentProviderConfigDTO);
    }
}
