<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\order;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\ItemMasterDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\sys\bo\BSystemSeries;
use App\Http\Controllers\api\v1\dto\SystemSeriesDTO;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\tax\bo\BTax;
use App\Models\api\v1\vendor\ItemMasterModel;
use App\Models\api\v1\vendor\ItemVendorModel;
use App\Http\Controllers\api\v1\dto\ItemVendorDTO;
use App\Http\Controllers\api\v1\vendor\bo\BVendorCommissionTransaction;

/**
 * @author ISG
 */
class OrderDetailsModel extends Model implements ModelInterface {

    public function saveObject(OrderDetailsDTO $orderDetailsDTO) {
        //Create New User

        $this->order_text = $orderDetailsDTO->getOrderText();
        $this->order_master_id = $orderDetailsDTO->getOrderMasterId();
        $this->item_vendor_id = $orderDetailsDTO->getItemVendorId();
        $this->item_master_id = $orderDetailsDTO->getItemMasterId();

        //Get Tax amount
        //TODO Business::Dynamically Calculate Taxes per order transactions
        $bTax = new BTax();
        $vatAmount = $bTax->getActiveTaxByType(AppDTO::$VAT_TAX_CODE);
        $orderDetailsDTO->setTaxAmount($vatAmount);
        //Check Tax Included.Start
        $this->storeItemInfoAndTax($orderDetailsDTO);
        //Check Tax Included.End

        $this->tax_included = $orderDetailsDTO->getTaxIncluded();
        $this->item_name = $orderDetailsDTO->getItemName();
        $this->currency_code = $orderDetailsDTO->getCurrencyCode();
        $this->tax_id = $orderDetailsDTO->getTaxId();
        $this->tax_amount = $vatAmount;

        $this->save();
        $orderMasterModel = new OrderMasterModel();
        $orderMasterModel->updateOrderTotals($orderDetailsDTO);
        $orderDetailsDTO->setId($this->id);

        //Save Vendor Commission. Trans.
        $bVendorCommissionTrans = new BVendorCommissionTransaction();
        $bVendorCommissionTrans->postVendorCommission($orderDetailsDTO);

        return $this;
    }



    public function getDTOById($id) {
        $targetUserDTO = new UserDTO("", "");
        $userArr = User::where('id', $id)->get();
        if ($userArr) {
            $targetUserDTO->setId($userArr[0]->id);
            $targetUserDTO->setUserName($userArr[0]->user_name);
            $targetUserDTO->setFirstName($userArr[0]->first_name);
            $targetUserDTO->setLastName($userArr[0]->last_name);
            return $targetUserDTO;
        }
        return null;
    }

    public function createUserByPhoneNumber(UserDTO $userDTO) {
        $userDTO->setIsPhoneVerified(AppDTO::$TRUE_AS_STRING);
        $userDTO->setUserActive(AppDTO::$TRUE_AS_STRING);
        return $this->createUser($userDTO);
    }

    public $timestamps = false; //TODO add updated at and created at .
    protected $table = 'isg_order_details';

    private function storeItemInfoAndTax(OrderDetailsDTO $orderDetailsDTO) {
        $itemVendorModel = new ItemVendorModel();
        $itemMasterModel = new ItemMasterModel();
        $itemMasterDTO = $itemMasterModel->getDTOById($orderDetailsDTO->getItemMasterId());
        $itemVendorDTO = $itemVendorModel->getDTOById($orderDetailsDTO->getItemVendorId());

        if($itemMasterDTO->getTaxIncluded() == AppDTO::$FALSE_AS_STRING)
        {
            $orderDetailsDTO->setTaxId($itemMasterDTO->getTaxId());
            $orderDetailsDTO->setTaxIncluded($itemMasterDTO->getTaxIncluded());
            $orderDetailsDTO->setBasicPrice($itemMasterDTO->getPrice());
            $this->basic_price = $orderDetailsDTO->getBasicPrice();
            $this->gross_price = $orderDetailsDTO->getBasicPrice() + $orderDetailsDTO->getBasicPrice() * $orderDetailsDTO->getTaxAmount();
        }else if ($itemVendorDTO->getTaxIncluded() == AppDTO::$FALSE_AS_STRING)
        {
            $orderDetailsDTO->setTaxId($itemVendorDTO->getTaxId());
            $orderDetailsDTO->setTaxIncluded($itemVendorDTO->getTaxIncluded());
            $orderDetailsDTO->setBasicPrice($itemVendorDTO->getBasicPrice());
            $this->basic_price = $orderDetailsDTO->getBasicPrice();
            $this->gross_price = $orderDetailsDTO->getBasicPrice() + $orderDetailsDTO->getBasicPrice() * $orderDetailsDTO->getTaxAmount();

        }else{//Save Basic Price
            if($itemVendorDTO->getBasicPrice() != null && $itemVendorDTO->getBasicPrice() != 0)
            {
                $orderDetailsDTO->setBasicPrice($itemVendorDTO->getBasicPrice());
                $orderDetailsDTO->setTaxId($itemVendorDTO->getTaxId());
                $orderDetailsDTO->setTaxIncluded($itemVendorDTO->getTaxIncluded());
                $this->basic_price = $orderDetailsDTO->getBasicPrice();
                $this->gross_price = $orderDetailsDTO->getBasicPrice();
            }else if($itemMasterDTO->getPrice() != null && $itemMasterDTO->getPrice() != 0)
            {
                $orderDetailsDTO->setBasicPrice($itemMasterDTO->getPrice());
                $orderDetailsDTO->setTaxId($itemMasterDTO->getTaxId());
                $orderDetailsDTO->setTaxIncluded($itemMasterDTO->getTaxIncluded());
                $this->basic_price = $orderDetailsDTO->getBasicPrice();
                $this->gross_price = $orderDetailsDTO->getBasicPrice();
            }
        }
        //Save Item Name
        $orderDetailsDTO->setItemName($itemMasterDTO->getItemName());
        $orderDetailsDTO->setGrossPrice($this->gross_price);
    }

}
