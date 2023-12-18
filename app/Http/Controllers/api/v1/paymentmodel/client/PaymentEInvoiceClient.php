<?php

namespace App\Http\Controllers\api\v1\paymentmodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentUserInvoice;
use App\Http\Controllers\api\v1\dto\PaymentUserInvoiceDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentEInvoice;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Models\api\v1\paymentmodel\PaymentEInvoiceModel;

class PaymentEInvoiceClient  {


    public function save(Request $request)
    {

       $paymentEInvoiceDTO = new EInvoiceHeaderDTO();
       $paymentEInvoiceDTO->setTotalAmountDue($request->amount);
       $paymentEInvoiceDTO->setId($request->einvoiceId);
       $paymentEInvoiceDTO->setPaymentVendormasterId($request->paymentVendorMasterId);
       $paymentEInvoiceDTO->setCommissionVendorMasterId($request->commissionVendorMasterId);

       $bEInvoice = new BPaymentEInvoice();
       $paymentEInvoiceDTO->setApiCall('0');
       return $bEInvoice->saveObject($paymentEInvoiceDTO);
    }
}
