<?php

namespace App\Http\Controllers\api\v1\subscription\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\order\OrderDetailsModel;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\ProductListingDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\ServiceSubscriberDTO;
use App\Models\api\v1\subscription\ServiceSubscriberModel;

class BServiceSubscriber extends Controller implements BusinessInterface {

    public function addSubscriber(ServiceSubscriberDTO $serviceSubscriberDto) {
        $serviceSubscriberModel = new ServiceSubscriberModel();
        $dto = $serviceSubscriberModel->addSeubscriber($serviceSubscriberDto);
        if ($serviceSubscriberDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($dto != null) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $planData['Id'] = $dto->getId();
                $planData['Subscriber-Name'] = $dto->getSubscriberName();
                $planData['E-mail-Id'] = $dto->getEmailId();
                $planData['Tell-No'] = $dto->getTellNo();
                $response['Subscriber-Data'] = $planData;
                return JsonHandler::getJsonMessage($response);
            } else {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Failed To Save!!!";
                $response['Plan-Data'] = null;
                return JsonHandler::getJsonMessage($response);
            }
        } else {//Web Routing
            if ($dto != null) {
                return $dto;
            } else {
                return null;
            }
        }
    }

    public function listSubscriberPlan(ServiceSubscriberDTO $serviceSubscriberDto) {
        
        $serviceSubscriberModel = new ServiceSubscriberModel();
        $dto = $serviceSubscriberModel->listSubscriberPlan($serviceSubscriberDto);
        return $dto;//Return Subscription Plan. All Records!
//        $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//        $response['Message'] = "Success!!!";
//        $response['API'] = $dto;
//        return JsonHandler::getJsonMessage($response);
        if ($serviceSubscriberDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($dto != null) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $planData['Id'] = $dto->getId();
                $planData['Subscriber-Name'] = $dto->getSubscriberName();
                $planData['E-mail-Id'] = $dto->getEmailId();
                $planData['Tell-No'] = $dto->getTellNo();
                $response['Subscriber-Data'] = $planData;
                return JsonHandler::getJsonMessage($response);
            } else {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Failed To Save!!!";
                $response['Plan-Data'] = null;
                return JsonHandler::getJsonMessage($response);
            }
        } else {//Web Routing
            if ($dto != null) {
                return $dto;
            } else {
                return null;
            }
        }
    }

}
