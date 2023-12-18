<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\vendor;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\ItemMasterDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Models\api\v1\companyprofile\CompanyProfile;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;


/**
 * @author ISG
 */
class ItemMasterModel extends Model implements ModelInterface{


    public function saveObject(ItemMasterDTO $itemMasterDTO) {
        //Create New User
        $this->item_name = $itemMasterDTO->getItemName();
        $this->price = $itemMasterDTO->getPrice();
        $this->tax_included = $itemMasterDTO->getTaxIncluded();
        $this->item_description = $itemMasterDTO->getItemDescription();
        $this->currency_code = $itemMasterDTO->getCurrencyCode();

        $this->item_type = $itemMasterDTO->getItemType();
        CompanyProfile::fillInCompanyCode($this);
        $this->save();
        $itemMasterDTO->setId($this->id);
        return $itemMasterDTO;
    }

    public function getDTOById($id)
    {
        $targetDTO = new ItemMasterDTO();
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
        }
        return null;
    }


    public function createUserByPhoneNumber(UserDTO $userDTO)
    {
        $userDTO->setIsPhoneVerified(AppDTO::$TRUE_AS_STRING);
        $userDTO->setUserActive(AppDTO::$TRUE_AS_STRING);
        return $this->createUser($userDTO);
    }

    public function listAllItems() {

        $bCompanyProfile = new BCompanyProfile();
        $companyCode = $bCompanyProfile->getActiveCompanyCode();

        $query = "select * from isg_item_master WHERE item_type = '".AppDTO::$ITEM_TYPE_ITEM. "' and  company_code = '" . $companyCode . "'";;
        $listItemArr = DBUtil::select($query);
        if($listItemArr)
        {
            return $listItemArr;
        }
        return null;
    }

    public function listAllItemService() {

        $bCompanyProfile = new BCompanyProfile();
        $companyCode = $bCompanyProfile->getActiveCompanyCode();

        $query = "select * from isg_item_master WHERE item_type = '".AppDTO::$ITEM_TYPE_SERVICE. "' and  company_code = '" . $companyCode . "'";;
        $listItemArr = DBUtil::select($query);
        if($listItemArr)
        {
            return $listItemArr;
        }
        return null;
    }

    public function listItemForSelectItems()
    {
        $query = "select id, item_name from isg_item_master";
        $userOtpArr = DBUtil::select($query);
        if($userOtpArr)
        {
            return $userOtpArr;
        }
        return null;
    }

    public $timestamps = true;
    protected $table = 'isg_item_master';

}
