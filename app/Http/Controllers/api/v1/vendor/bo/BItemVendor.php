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
use App\Models\api\v1\vendor\ItemVendorModel;
use App\Http\Controllers\api\v1\dto\ItemVendorDTO;

class BItemVendor extends Controller implements BusinessInterface {


    public function getDTOById($id) {
        $itemVendorModel = new ItemVendorModel();
        return $itemVendorModel->getDTOById($id);
    }

     public function saveObject(ItemVendorDTO $itemVendorDTO) {
         $itemVendorModel = new ItemVendorModel();
         return $itemVendorModel->saveObject($itemVendorDTO);
     }
}
