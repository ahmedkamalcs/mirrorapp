<?php

namespace App\Http\Controllers\api\v1\paymentmodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentPayee;
use App\Http\Controllers\api\v1\dto\PaymentPayeeDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;

class PaymentPayeeClient  {

    
    public function save(Request $request)
    {
//         $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//        $response['Message'] = "Successfully Saved Object";
//        
//        return JsonHandler::getJsonMessage($response);
        
       $paymentPayeeDTO = new PaymentPayeeDTO();
       
       $paymentPayeeDTO->setPayeeName($request->payeeName);
       $paymentPayeeDTO->setUserId($request->userId);
       
       $bPaymentPayee = new BPaymentPayee();
       $paymentPayeeDTO->setApiCall('0');
       return $bPaymentPayee->saveObject($paymentPayeeDTO);
    }
}
