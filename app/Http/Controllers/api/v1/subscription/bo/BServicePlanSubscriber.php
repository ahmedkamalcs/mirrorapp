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
use App\Http\Controllers\api\v1\dto\ServicePlanSubscriberDTO;
use App\Models\api\v1\subscription\ServicePlanSubscriberModel;

class BServicePlanSubscriber extends Controller implements BusinessInterface {

    public function addSubscriberToAPlan(ServicePlanSubscriberDTO $servicePlanSubscriberDTO) {
        $servicePlanSubscriberModel = new ServicePlanSubscriberModel();
        $dto = $servicePlanSubscriberModel->addSubscriberToAPlan($servicePlanSubscriberDTO);
        if ($servicePlanSubscriberDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($dto != null) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $planData['Id'] = $dto->getId();
                $planData['Plan-Id'] = $dto->getPlanId();
                $planData['Subscriber-Id'] = $dto->getSubscriberId();
                $planData['Active-From'] = $dto->getActiveFrom();
                $planData['Active-To'] = $dto->getActiveTo();
                $planData['Is-Active'] = $dto->getIsAvtive();
                $response['Data'] = $planData;
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
            }else{
                return null;
            }
        }
    }
    
    public function activateServicePlan(ServicePlanSubscriberDTO $servicePlanSubscriberDTO) {
        $servicePlanSubscriberModel = new ServicePlanSubscriberModel();
        $servicePlanSubscriberDTO->setIsActive(AppDTO::$TRUE_AS_STRING);
        $result = $servicePlanSubscriberModel->activateOrDeactivateServicePlan($servicePlanSubscriberDTO);
                
        if ($servicePlanSubscriberDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($result) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Successfully Activated!!!";                
                return JsonHandler::getJsonMessage($response);
            } else {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Failed To Acticate!!!";
                return JsonHandler::getJsonMessage($response);
            }
        } else {//Web Routing
            if ($result) {
                return AppDTO::$TRUE_AS_STRING;
            }else{
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }
    
    public function deActivateServicePlan(ServicePlanSubscriberDTO $servicePlanSubscriberDTO) {
        $servicePlanSubscriberModel = new ServicePlanSubscriberModel();
        $servicePlanSubscriberDTO->setIsActive(AppDTO::$FALSE_AS_STRING);
        $result = $servicePlanSubscriberModel->activateOrDeactivateServicePlan($servicePlanSubscriberDTO);
                
        if ($servicePlanSubscriberDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($result) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Successfully DeActivated!!!";                
                return JsonHandler::getJsonMessage($response);
            } else {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Failed To DeActicate!!!";
                return JsonHandler::getJsonMessage($response);
            }
        } else {//Web Routing
            if ($result) {
                return AppDTO::$TRUE_AS_STRING;
            }else{
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function getDTOById($id) {
        
    }

}
