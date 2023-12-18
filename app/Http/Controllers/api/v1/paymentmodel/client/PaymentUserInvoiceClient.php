<?php

namespace App\Http\Controllers\api\v1\paymentmodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentUserInvoice;
use App\Http\Controllers\api\v1\dto\PaymentUserInvoiceDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;

class PaymentUserInvoiceClient  {

    
    public function save(Request $request)
    {
//         $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//        $response['Message'] = "Successfully Saved Object";
//        
//        return JsonHandler::getJsonMessage($response);
        
       $userInvoiceDTO = new PaymentUserInvoiceDTO($request->payeeId, $request->invoiceId);
       
       $userInvoiceDTO->setCurrencyCode("SAR");
       $userInvoiceDTO->setPayeeAmount($request->amount);
//       $userInvoiceDTO->setApiCall('0');
       $bUserInvoice = new BPaymentUserInvoice();
       return $bUserInvoice->saveObject($userInvoiceDTO);
    }
}
