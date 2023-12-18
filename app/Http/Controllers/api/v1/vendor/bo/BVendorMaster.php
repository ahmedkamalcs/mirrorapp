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
use App\Http\Controllers\api\v1\dto\AppDTO;

class BVendorMaster extends Controller implements BusinessInterface {

    public function saveObject(VendorMasterDTO $vendorMasterDTO) {
        $vendorMasterModel = new VendorMasterModel();

        if ($vendorMasterModel->saveObject($vendorMasterDTO)) {
            if ($vendorMasterDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($vendorMasterDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Error!!!";

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function getDTOById($id) {
        
    }

    public function listAllVendors() {
        $vendorMasterModel = new VendorMasterModel();
        return $vendorMasterModel->listAllVendors();
    }

}
