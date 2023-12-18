<?php

namespace App\Http\Controllers\api\v1\usermodel\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\UserBookingDTO;
use App\Models\api\v1\usermodel\UserBookingModel;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BUserBooking extends Controller implements BusinessInterface {

    public function saveObject(UserBookingDTO $userBookingDTO) {
        $userBookingModel = new UserBookingModel();
        $object = $userBookingModel->saveObject($userBookingDTO);
        if ($object) {
            if ($userBookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";
                $response['Object'] = $object;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($userBookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
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

}
