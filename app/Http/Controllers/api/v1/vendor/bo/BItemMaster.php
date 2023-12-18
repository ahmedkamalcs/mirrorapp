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
use App\Models\api\v1\vendor\ItemMasterModel;
use App\Http\Controllers\api\v1\dto\ItemMasterDTO;


class BItemMaster extends Controller implements BusinessInterface {


    public function getDTOById($id) {
//        $itemVendorModel = new ItemVendorModel();
//        return $itemVendorModel->getDTOById($id);
        return null;
    }
    
    public function listItems()
    {
        $itemMasterModel = new ItemMasterModel();
        return $itemMasterModel->listAllItems();
        //Return list of items.
    }
    
    public function listAllItemService()
    {
        $itemMasterModel = new ItemMasterModel();
        return $itemMasterModel->listAllItemService();
        //Return list of items.
    }
    
    public function saveObject(ItemMasterDTO $itemMasterDTO) {
        $itemMasterModel = new ItemMasterModel();
        return $itemMasterModel->saveObject($itemMasterDTO);
    }
    
    
    
}
