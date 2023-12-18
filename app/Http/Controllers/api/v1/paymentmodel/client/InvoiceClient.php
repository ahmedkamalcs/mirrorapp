<?php

namespace App\Http\Controllers\api\v1\paymentmodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BInvoice;
use App\Http\Controllers\api\v1\dto\InvoiceDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;

class InvoiceClient  {

    
    public function save(Request $request)
    {
//         $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//        $response['Message'] = "Successfully Saved Object";
//        
//        return JsonHandler::getJsonMessage($response);
        
       $invoiceDTO = new InvoiceDTO();
       
       $invoiceDTO->setUserId($request->userId);
       $invoiceDTO->setInvoiceHeader($request->invoiceHeader);
       $invoiceDTO->setOrderNo($request->orderNumber);
       $invoiceDTO->setInvoiceText($request->invoiceText);
//       $invoiceDTO->setApiCall('0');
       $bInvoice = new BInvoice();
       return $bInvoice->saveObject($invoiceDTO);
    }
}
