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
use App\Http\Controllers\api\v1\dto\ServicePlanDTO;
use App\Models\api\v1\subscription\ServicePlanModel;

class BServicePlan extends Controller implements BusinessInterface {

    public function listServicePlans(ServicePlanDTO $servicePlanDTO) {
        $servicePlanModel = new ServicePlanModel();
        $result = $servicePlanModel->listServicePlans();
        if ($servicePlanDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if (count($result) > 0) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $planItemsArr = $this->buildServicePlanArray($result);
                $response['Available-Plans'] = $planItemsArr;
                return JsonHandler::getJsonMessage($response);
            }
        } else {//Web Routing
            if ($result) {//Data Found
                $planItemsArr = $this->buildServicePlanArray($result);
                return $planItemsArr;
            } else {//TODO Add Exception Handling
            }
        }
    }

    public function addServicePlan(ServicePlanDTO $servicePlanDTO) {
        $servicePlanModel = new ServicePlanModel();
        $dto = $servicePlanModel->addServicePlan($servicePlanDTO);
        if ($servicePlanDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($dto != null) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $planData['Id'] = $dto->getId();
                $planData['Plan-Name'] = $dto->getPlanName();
                $planData['Plan-Name-Ar'] = $dto->getPlanNameAr();
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
            }else{
                return null;
            }
        }
    }

    private function buildServicePlanArray($result) {

        $planArr = array();
        $serviceArr = array();
        $planItemsArr = array();

        for ($i = 0; $i < count($result); $i++) {

            if ($i == 0) {//Add First Plan.
                $planArr[] = $result[$i]->plan_name;
                $planArr[] = $result[$i]->total_price;
            }

            if (!in_array($result[$i]->plan_name, $planArr)) {
                $planItemsArr[] = array_merge($planArr, $serviceArr);
                $serviceArr = array();
                $planArr = array();
                //Prepare for the next iteration.
                $planArr[] = $result[$i]->plan_name;
                $planArr[] = $result[$i]->total_price;
                $serviceArr[] = $result[$i]->service_name;
            } else {
                $serviceArr[] = $result[$i]->service_name;
            }
        }

        //Add Last Plan.
//                $planArr[] = $serviceArr[];
        $planItemsArr[] = array_merge($planArr, $serviceArr);
        return $planItemsArr;
    }
    
    public function activateServicePlan(ServicePlanDTO $servicePlanDTO) {
        $servicePlanModel = new ServicePlanModel();
        $servicePlanDTO->setIsActive(AppDTO::$TRUE_AS_STRING);
        $result = $servicePlanModel->activateOrDeactivateServicePlan($servicePlanDTO);
                
        if ($servicePlanDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
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
    
    public function deActivateServicePlan(ServicePlanDTO $servicePlanDTO) {
        $servicePlanModel = new ServicePlanModel();
        $servicePlanDTO->setIsActive(AppDTO::$FALSE_AS_STRING);
        $result = $servicePlanModel->activateOrDeactivateServicePlan($servicePlanDTO);
                
        if ($servicePlanDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($result) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Successfully De-Activated!!!";                
                return JsonHandler::getJsonMessage($response);
            } else {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Failed To De-Acticate!!!";
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
    
    public function updateServicePlanTotalPrice(ServicePlanDTO $servicePlanDTO) {
        $servicePlanModel = new ServicePlanModel();
        $servicePlanDTO->setIsActive(AppDTO::$FALSE_AS_STRING);
        $result = $servicePlanModel->updateServicePlanTotalPrice($servicePlanDTO);
                
        if ($servicePlanDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {//API Routing
            if ($result) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Successfully Updated!!!";                
                return JsonHandler::getJsonMessage($response);
            } else {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Failed To Update!!!";
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
