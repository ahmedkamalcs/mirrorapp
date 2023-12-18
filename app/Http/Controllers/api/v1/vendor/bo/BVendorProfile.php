<?php

namespace App\Http\Controllers\api\v1\vendor\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\VendorProfileDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\vendor\VendorProfileModel;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BVendorProfile extends Controller implements BusinessInterface {

    public function saveObject(VendorProfileDTO $vendorProfileDTO) {
        $vendorProfileModel = new VendorProfileModel();
        $object = $vendorProfileModel->saveObject($vendorProfileDTO);
        if ($object) {
            if ($vendorProfileDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";
                $response['Object'] = $object;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($vendorProfileDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Error!!!";
                $response['Object'] = null;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function getDTOById($id) {
        
    }

}
