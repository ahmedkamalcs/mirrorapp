<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\vendor;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\VendorCommissionSetupDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;


/**
 * @author ISG
 */
class VendorCommissionSetupModel extends Model implements ModelInterface{


    public function saveObject(VendorCommissionSetupDTO $vendorCommissionSetupDTO) {
        //Create New User

        $this->amount = $vendorCommissionSetupDTO->getAmount();
        $this->percent = $vendorCommissionSetupDTO->getPercent();
        $this->commission_type = $vendorCommissionSetupDTO->getCommissionType();
        $this->vendor_master_id = $vendorCommissionSetupDTO->getVendorMasterId();

        $this->save();
        $vendorCommissionSetupDTO->setId($this->id);
        return $this;
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

    public function getDTOByVendorId($vendorId)
    {
        $targetDTO = new VendorCommissionSetupDTO();
        $targetArr = VendorCommissionSetupModel::where('vendor_master_id', $vendorId )->get();

        if(!$targetArr->isEmpty())//Collection. Check
        {
            $targetDTO->setId($targetArr[0]->id);
            $targetDTO->setAmount($targetArr[0]->amount);
            $targetDTO->setPercent($targetArr[0]->percent);
//            $targetDTO->setCommissionType($targetArr[0]->commission_type);
            $targetDTO->setVendorMasterId($targetArr[0]->vendor_master_id);

            //TODO Set Currency Code in Item Master Model. getDTOById
            return $targetDTO;
        }
        return null;
    }





    public $timestamps = true;
    protected $table = 'isg_vendor_commission_setup';

}
