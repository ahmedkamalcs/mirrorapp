<?php

namespace App\Http\Controllers\api\v1\order\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\OrderMasterDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\order\OrderMasterModel;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BOrderMaster extends Controller implements BusinessInterface {

    public function saveObject(OrderMasterDTO $orderMasterDTO) {

        $orderMasterModel = new OrderMasterModel();
        $obj = $orderMasterModel->saveObject($orderMasterDTO);

        if ($obj) {
            if ($orderMasterDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";
                $response['Object'] = $obj;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($orderMasterDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
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
