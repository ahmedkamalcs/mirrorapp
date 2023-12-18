<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\vendor;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\ItemVendorDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;


/**
 * @author ISG
 */
class ItemVendorModel extends Model implements ModelInterface{

    public function saveObject(ItemVendorDTO $itemVendorDTO) {
        //Create New User

        $this->vendor_master_id = $itemVendorDTO->getVendorMasterId();
        $this->item_master_id = $itemVendorDTO->getItemMasterId();
        $this->basic_price = $itemVendorDTO->getBasicPrice();
        $this->gross_price = $itemVendorDTO->getGrossPrice();
        $this->tax_included = $itemVendorDTO->getTaxIncluded();
        $this->tax_id = $itemVendorDTO->getTaxId();
        $this->save();
        $itemVendorDTO->setId($this->id);
        return $this;
    }

    public function getDTOById($id)
    {
        $targetDTO = new ItemVendorDTO();
        $targetArr = ItemVendorModel::where('id', $id )->get();
        if($targetArr)
        {
            $targetDTO->setId($targetArr[0]->id);
            $targetDTO->setVendorMasterId($targetArr[0]->vendor_master_id);
            $targetDTO->setItemMasterId($targetArr[0]->item_master_id);
            $targetDTO->setBasicPrice($targetArr[0]->basic_price);
            $targetDTO->setTaxIncluded($targetArr[0]->tax_included);
            $targetDTO->setTaxId($targetArr[0]->tax_id);
            //TODO set Currency Code. ItemVendorMasterModel. getDTOById.
            return $targetDTO;
        }
        return null;
    }



    public $timestamps = true;
    protected $table = 'isg_item_vendor';

}
