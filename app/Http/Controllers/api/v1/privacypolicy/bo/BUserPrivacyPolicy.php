<?php

namespace App\Http\Controllers\api\v1\privacypolicy\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\einvoice\EInvoiceHeaderModel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\api\v1\privacypolicy\UserPrivacyPolicyModel;
use App\Http\Controllers\api\v1\dto\UserPrivacyPolicyDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BUserPrivacyPolicy extends Controller implements BusinessInterface {

    public function saveObject(UserPrivacyPolicyDTO $userPrivacyPolicyDTO) {
        $userPrivacyPolicyModel = new UserPrivacyPolicyModel();
        $obj = $userPrivacyPolicyModel->saveObject($userPrivacyPolicyDTO);
        if ($obj) {
            if ($userPrivacyPolicyDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";
                $response['Object'] = $obj;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($userPrivacyPolicyDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
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
