<?php

namespace App\Http\Controllers\api\v1\einvoice\client;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\einvoice\EInvoiceHeaderModel;
use App\Http\Controllers\api\v1\dto\EInvoiceLineDTO;
use App\Http\Controllers\api\v1\einvoice\bo\BEInvoiceLine;
use Illuminate\Http\Request;

class EInvoiceLineClient {

    public function save(Request $request) {
        $eInvoiceLineDTO = new EInvoiceLineDTO();
        $eInvoiceLineDTO->setItemName($request->itemName);
        $eInvoiceLineDTO->setUnitPrice($request->unitPrice);
        $eInvoiceLineDTO->setQuantity($request->quantity);
        $eInvoiceLineDTO->setTaxableAmount($request->taxableAmount);
        $eInvoiceLineDTO->setDiscount($request->discount);
        $eInvoiceLineDTO->setTaxRate($request->taxRate);
        $eInvoiceLineDTO->setTaxAmount($request->taxAmount);
        $eInvoiceLineDTO->setSubtotalIncludingVAT($request->subtotalIncludingVat);
        $eInvoiceLineDTO->setCurency($request->currency);
        $eInvoiceLineDTO->setEinvoiceHeaderId($request->einvoiceHeaderId);

        $bEInvoiceLine = new BEInvoiceLine();
//        $eInvoiceLineDTO->setApiCall('0');
        return $bEInvoiceLine->saveObject($eInvoiceLineDTO);
    }

}
