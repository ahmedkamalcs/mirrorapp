<?php

namespace App\Http\Controllers\api\v1\einvoice\client;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\einvoice\EInvoiceHeaderModel;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use App\Http\Controllers\api\v1\einvoice\bo\BEInvoiceHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\AppDTO;

class EInvoiceHeaderClient  {

    public function save(Request $request) {
        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $eInvoiceHeaderDTO->setHeaderInvoiceNumber($request->invoiceNumber);
        $eInvoiceHeaderDTO->setHeaderIssueDate($request->issueDate);
        $eInvoiceHeaderDTO->setHeaderDateOfSupply($request->dateOfSupply);
        $eInvoiceHeaderDTO->setSellerName($request->sellerName);
        $eInvoiceHeaderDTO->setSellerBuildingNo($request->sellerBuildingNo);
        $eInvoiceHeaderDTO->setSellerStreetName($request->sellerStreetName);
        $eInvoiceHeaderDTO->setSellerDistrict($request->sellerDistrict);
        $eInvoiceHeaderDTO->setSellerCity($request->sellerCity);
        $eInvoiceHeaderDTO->setSellerCountry($request->sellerCountry);
        $eInvoiceHeaderDTO->setSellerPostalCode($request->sellerPostalCode);
        $eInvoiceHeaderDTO->setSellerAdditionalNo($request->sellerAdditionalNo);
        $eInvoiceHeaderDTO->setSellerVatNumber($request->sellerVatNumber);
        $eInvoiceHeaderDTO->setSellerOtherSellerId($request->sellerOtherSellerId);
        
        //B2C Header
        
        $eInvoiceHeaderDTO->setSupplierVATNO($request->supplierVatNo);
        $eInvoiceHeaderDTO->setOrderNo($request->orderNo);
        $eInvoiceHeaderDTO->setCompanyName($request->companyName);
        $eInvoiceHeaderDTO->setSupplierName($request->supplierName);
        $eInvoiceHeaderDTO->setSupplierAddress($request->supplierAddress);
        $eInvoiceHeaderDTO->setTransType($request->transType);
        $eInvoiceHeaderDTO->setVatRate($request->vatRate);
        $eInvoiceHeaderDTO->setOtherFees($request->otherFees);
        $eInvoiceHeaderDTO->setTotalWithoutTax($request->totalAmountExcludingVat);
        $eInvoiceHeaderDTO->setTotalVAT($request->vatAmount);
        $eInvoiceHeaderDTO->setTotalWithTax($request->totalAmountIncluingVat);

        $bEInvoiceHeader = new BEInvoiceHeader();
        $eInvoiceHeaderDTO->setApiCall('1');
        return $bEInvoiceHeader->saveObject($eInvoiceHeaderDTO);
    }
    
    public function getEInvoiceHeaderById(Request $request)
    {
        $bEInvoiceHeader = new BEInvoiceHeader();
        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $einvoiceHeaderDTO->setId($request->id);
        $einvoiceHeaderDTO->setApiCall(AppDTO::$TRUE_AS_STRING);
        return $bEInvoiceHeader->getDTOById($einvoiceHeaderDTO);
    }

}
