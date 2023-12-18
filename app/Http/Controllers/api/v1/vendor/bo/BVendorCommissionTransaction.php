<?php

namespace App\Http\Controllers\api\v1\vendor\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\VendorMasterDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\vendor\VendorMasterModel;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
USE App\Models\api\v1\vendor\VendorCommissionSetupModel;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use App\Http\Controllers\api\v1\dto\VendorCommissionTransactionDTO;
use App\Models\api\v1\vendor\VendorCommissionTransactionModel;

class BVendorCommissionTransaction extends Controller implements BusinessInterface {

    public function getDTOById($id) {

    }

    public function postVendorCommission(OrderDetailsDTO $orderDetailsDTO) {
        //1. Retreive Vendor Setup
        $commissionSetupModel = new VendorCommissionSetupModel();
        $commissionSetupDTO = $commissionSetupModel->getDTOByVendorId($orderDetailsDTO->getItemVendorId());

        if ($commissionSetupDTO == null) {//No Commission Setup for this Vendor
            return;
        }
        //2. Check Commision Type.
        //3.Store Amounts by CommissionTransactionDTO.
        $netAmount = 0.0;
        $grossAmount = 0.0;
        /* if($commissionSetupDTO->getCommissionType() == AppDTO::$COMMISSION_TYPE_FIXED_AMOUNT)
          {
          $netAmount = $grossAmount = $commissionSetupDTO->getAmount();
          }else if($commissionSetupDTO->getCommissionType() == AppDTO::$COMMISSION_TYPE_PERCENT)
          {
          $netAmount = $orderDetailsDTO->getBasicPrice()   * $commissionSetupDTO->getPercent();
          $grossAmount = $orderDetailsDTO->getGrossPrice() * $commissionSetupDTO->getPercent();
          } */

        if ($commissionSetupDTO->getPercent() != null && !empty($commissionSetupDTO->getPercent())) {
            $netAmount = $orderDetailsDTO->getBasicPrice() * $commissionSetupDTO->getPercent();
            $grossAmount = $orderDetailsDTO->getGrossPrice() * $commissionSetupDTO->getPercent();
        }

        if ($commissionSetupDTO->getAmount() != null && !empty($commissionSetupDTO->getAmount())) {
            $netAmount += $commissionSetupDTO->getAmount();
             $grossAmount += $commissionSetupDTO->getAmount();
        }

        //Build DTO
        $vendorCommissionTransDTO = new VendorCommissionTransactionDTO();
        $vendorCommissionTransDTO->setGrossAmount($grossAmount);
        $vendorCommissionTransDTO->setNetAmount($netAmount);
        $vendorCommissionTransDTO->setOrderDetailsId($orderDetailsDTO->getId());
        $vendorCommissionTransDTO->setVendorCommissionSetupId($commissionSetupDTO->getId());
        $vendorCommissionTransDTO->setVendorMasterId($orderDetailsDTO->getItemVendorId());
        $vendorCommissionTransDTO->setOrderMasterId($orderDetailsDTO->getOrderMasterId());
        $vendorCommissionTransDTO->setOrderDetailsNetAmount($orderDetailsDTO->getBasicPrice());
        //TODO Bug: Fix Order Gross Price.
        $vendorCommissionTransDTO->setOrderDGrossAmount($orderDetailsDTO->getGrossPrice());
//        if(!empty($commissionSetupDTO->getAmount()) )
//        {
            $vendorCommissionTransDTO->setCommissionFixedAmount($commissionSetupDTO->getAmount());
//        }
//        if(!empty($commissionSetupDTO->getPercent()))
//        {
            $vendorCommissionTransDTO->setCommissionPercent($commissionSetupDTO->getPercent());
//        }

        $vendorCommissionTransModel = new VendorCommissionTransactionModel();
        $vendorCommissionTransModel->saveObject($vendorCommissionTransDTO);
    }

    public function postEInvoiceVendorCommission(EInvoiceHeaderDTO $einvoiceHeaderDTO) {
        //1. Retreive Vendor Setup
        $commissionSetupModel = new VendorCommissionSetupModel();
        $commissionSetupDTO = $commissionSetupModel->getDTOByVendorId($einvoiceHeaderDTO->getCommissionVendorMasterId());

        if ($commissionSetupDTO == null) {//No Commission Setup for this Vendor
            return;
        }
        //2. Check Commision Type.
        //3.Store Amounts by CommissionTransactionDTO.
        $netAmount = 0.0;
        $grossAmount = 0.0;
        /* if($commissionSetupDTO->getCommissionType() == AppDTO::$COMMISSION_TYPE_FIXED_AMOUNT)
          {
          $netAmount = $grossAmount = $commissionSetupDTO->getAmount();
          }else if($commissionSetupDTO->getCommissionType() == AppDTO::$COMMISSION_TYPE_PERCENT)
          {
          $netAmount = $orderDetailsDTO->getBasicPrice()   * $commissionSetupDTO->getPercent();
          $grossAmount = $orderDetailsDTO->getGrossPrice() * $commissionSetupDTO->getPercent();
          } */

        if ($commissionSetupDTO->getPercent() != null && !empty($commissionSetupDTO->getPercent())) {
            $netAmount =  $einvoiceHeaderDTO->getTotalAmountDue() * $commissionSetupDTO->getPercent();
            $grossAmount = $einvoiceHeaderDTO->getTotalAmountDue() * $commissionSetupDTO->getPercent();
        }

        if ($commissionSetupDTO->getAmount() != null && !empty($commissionSetupDTO->getAmount())) {
            $netAmount += $commissionSetupDTO->getAmount();
             $grossAmount += $commissionSetupDTO->getAmount();
        }

        //Build DTO
        $vendorCommissionTransDTO = new VendorCommissionTransactionDTO();
        $vendorCommissionTransDTO->setGrossAmount($grossAmount);
        $vendorCommissionTransDTO->setNetAmount($netAmount);
        // $vendorCommissionTransDTO->setOrderDetailsId($orderDetailsDTO->getId());
        $vendorCommissionTransDTO->setVendorCommissionSetupId($commissionSetupDTO->getId());
        $vendorCommissionTransDTO->setVendorMasterId($einvoiceHeaderDTO->getCommissionVendorMasterId());
        $vendorCommissionTransDTO->setEinvoiceId($einvoiceHeaderDTO->getId());
        // $vendorCommissionTransDTO->setOrderMasterId($orderDetailsDTO->getOrderMasterId());
        // $vendorCommissionTransDTO->setOrderDetailsNetAmount($orderDetailsDTO->getBasicPrice());
        //TODO Bug: Fix Order Gross Price.
        // $vendorCommissionTransDTO->setOrderDGrossAmount($orderDetailsDTO->getGrossPrice());
//        if(!empty($commissionSetupDTO->getAmount()) )
//        {
            $vendorCommissionTransDTO->setCommissionFixedAmount($commissionSetupDTO->getAmount());
//        }
//        if(!empty($commissionSetupDTO->getPercent()))
//        {
            $vendorCommissionTransDTO->setCommissionPercent($commissionSetupDTO->getPercent());
//        }

        $vendorCommissionTransModel = new VendorCommissionTransactionModel();
        $vendorCommissionTransModel->saveObject($vendorCommissionTransDTO);
    }

}
