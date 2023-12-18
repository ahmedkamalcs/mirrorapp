<?php

namespace App\Http\Controllers\api\v1\paymentmodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentVendorMaster;
use App\Http\Controllers\api\v1\dto\PaymentVendorMasterDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;

class PaymentVendorMasterClient  {


    public function save(Request $request)
    {
//         $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//        $response['Message'] = "Successfully Saved Object";
//
//        return JsonHandler::getJsonMessage($response);

       $paymentVendorMasterDTO = new PaymentVendorMasterDTO();
//       $paymentVendorMasterDTO->setUserId($request->userId);
       $paymentVendorMasterDTO->setSessionId("Session ID is Generated!!!");
       $paymentVendorMasterDTO->setPaymentPayeeId($request->payeeId);
       $paymentVendorMasterDTO->setInvoiceId($request->invoiceId);
       $paymentVendorMasterDTO->setEinvoiceId($request->einvoiceId);

       $bPaymentVendorMaster = new BPaymentVendorMaster();
       $paymentVendorMasterDTO->setApiCall('1');
       return $bPaymentVendorMaster->saveObject($paymentVendorMasterDTO);
    }
}
