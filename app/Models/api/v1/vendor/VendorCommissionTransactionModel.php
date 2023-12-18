<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\vendor;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\VendorCommissionTransactionDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;


/**
 * @author ISG
 */
class VendorCommissionTransactionModel extends Model implements ModelInterface{


    public function saveObject(VendorCommissionTransactionDTO $vendorCommissionTransDTO) {
        //Create New User

        $this->vendor_master_id = $vendorCommissionTransDTO->getVendorMasterId();
        $this->vendor_commission_setup_id = $vendorCommissionTransDTO->getVendorCommisionSetupId();
        $this->order_details_id = $vendorCommissionTransDTO->getOrderDetailsId();
        $this->gross_amount = $vendorCommissionTransDTO->getGrossAmount();
        $this->net_amount = $vendorCommissionTransDTO->getNetAmount();


        $this->order_master_id = $vendorCommissionTransDTO->getOrderMasterId();
        $this->order_details_net_amount = $vendorCommissionTransDTO->getOrderDetailsNetAmount();
        $this->order_details_gross_amount = $vendorCommissionTransDTO->getOrderDGrossAmount();
        $this->commission_percent = $vendorCommissionTransDTO->getCommissionPercent();
        $this->commission_fixed_amount = $vendorCommissionTransDTO->getCommissionFixedAmount();

        //E-Invoice Specific
        $this->einvoice_id = $vendorCommissionTransDTO->getEinvoiceId();

        //TODO Fees Implementation. Starts Here!

        $this->save();
        $vendorCommissionTransDTO->setId($this->id);
        $vendorCommissionTransDTO->setId($this->created_at);
        $vendorCommissionTransDTO->setId($this->updated_at);
        return $vendorCommissionTransDTO;
    }

    public function getDTOById($id)
    {
        /*$targetDTO = new ItemMasterDTO();
        $targetArr = ItemMasterModel::where('id', $id )->get();
        if($targetArr)
        {
            $targetDTO->setId($targetArr[0]->id);
            $targetDTO->setItemName($targetArr[0]->item_name);
            $targetDTO->setPrice($targetArr[0]->price);
            $targetDTO->setTaxIncluded($targetArr[0]->tax_included);
            $targetDTO->setItemDescription($targetArr[0]->item_description);
            $targetDTO->setTaxId($targetArr[0]->tax_id);
            //TODO Set Currency Code in Item Master Model. getDTOById
            return $targetDTO;
        }*/
        return null;
    }






    public $timestamps = true;
    protected $table = 'isg_vendor_commission_transaction';

}
