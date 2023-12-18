<?php

namespace App\Http\Controllers\api\v1\paymentmodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentUserConfiguration;
use App\Http\Controllers\api\v1\dto\PaymentUserConfigurationDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;

class PaymentUserConfigurationClient  {

    
    public function save(Request $request)
    {
//         $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//        $response['Message'] = "Successfully Saved Object";
//        
//        return JsonHandler::getJsonMessage($response);
        
       $paymentUserConfigurationDTO = new PaymentUserConfigurationDTO();
       $paymentUserConfigurationDTO->setPaymentBrandName($request->brandName);
       $paymentUserConfigurationDTO->setUserId($request->userId);
       
      
       
       $bPaymentUserConfiguration = new BPaymentUserConfiguration();
       $paymentUserConfigurationDTO->setApiCall('0');
       return $bPaymentUserConfiguration->saveObject($paymentUserConfigurationDTO);
    }
}
