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
use App\Http\Controllers\api\v1\dto\ServicePlanItemsDTO;
use App\Models\api\v1\subscription\ServicePlanItemsModel;

class BservicePlanItems extends Controller implements BusinessInterface {

    public function addServicePlanItem(ServicePlanItemsDTO $servicePlanItemsDto) {
        $servicePlanModel = new ServicePlanItemsModel();
        $dto = $servicePlanModel->addServicePlanItem($servicePlanItemsDto);
        if ($servicePlanItemsDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($dto != null) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $planData['Id'] = $dto->getId();
                $planData['Plan-Id'] = $dto->getServicePlanId();
                $planData['Service-Id'] = $dto->getServiceItemId();
                $response['Plan-Data'] = $planData;
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
