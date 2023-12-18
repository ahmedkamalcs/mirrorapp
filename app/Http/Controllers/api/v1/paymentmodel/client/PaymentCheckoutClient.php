<?php

namespace App\Http\Controllers\api\v1\paymentmodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentCheckout;
use App\Http\Controllers\api\v1\dto\PaymentCheckoutDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;

class PaymentCheckoutClient  {

    
    public function save(Request $request)
    {
//         $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//        $response['Message'] = "Successfully Saved Object";
//        
//        return JsonHandler::getJsonMessage($response);
        
       $paymentCheckoutDTO = new PaymentCheckoutDTO();
       $paymentCheckoutDTO->setPaymentVendorMasterId($request->masterId);
       $bPaymentCheckout = new BPaymentCheckout();
       $paymentCheckoutDTO->setApiCall('0');
       return $bPaymentCheckout->saveObject($paymentCheckoutDTO);
    }
}
