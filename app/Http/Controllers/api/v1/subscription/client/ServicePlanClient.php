<?php

namespace App\Http\Controllers\api\v1\subscription\client;

use App\Http\Controllers\api\v1\order\bo\BOrderDetails;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\listing\bo\BProductListing;
use App\Http\Controllers\api\v1\dto\ProductListingDTO;
use App\Http\Controllers\api\v1\subscription\bo\BServicePlan;
use App\Http\Controllers\api\v1\dto\ServicePlanDTO;
use App\Http\Controllers\api\v1\util\DBUtil;

class ServicePlanClient {

    public function listServicePlans() {
        $bServicePlan = new BServicePlan();
        $servicePlanDTO = new ServicePlanDTO();
        $servicePlanDTO->setApiCall('0');
        return $bServicePlan->listServicePlans($servicePlanDTO);
    }

    public function addServicePlan(Request $request) {

        $bServicePlan = new BServicePlan();
        $servicePlanDTO = new ServicePlanDTO();
        $servicePlanDTO->setPlanName($request->planName);
        $servicePlanDTO->setPlanNameAr($request->planNameAr);
        $servicePlanDTO->setTotalPrice($request->totalPrice);
        $servicePlanDTO->setApiCall('1');
        return $bServicePlan->addServicePlan($servicePlanDTO);
    }

    public function activateServicePlan(Request $request) {
        
        $bServicePlan = new BServicePlan();
        $servicePlanDTO = new ServicePlanDTO();
        $servicePlanDTO->setId($request->planId);
        
        $servicePlanDTO->setApiCall('1');
        return $bServicePlan->activateServicePlan($servicePlanDTO);
    }
    
    public function deActivateServicePlan(Request $request) {
        
        $bServicePlan = new BServicePlan();
        $servicePlanDTO = new ServicePlanDTO();
        $servicePlanDTO->setId($request->planId);
        
        $servicePlanDTO->setApiCall('1');
        return $bServicePlan->deActivateServicePlan($servicePlanDTO);
    }
    
    public function updateServicePlanTotalPrice(Request $request) {
        
        $bServicePlan = new BServicePlan();
        $servicePlanDTO = new ServicePlanDTO();
        $servicePlanDTO->setId($request->planId);
        $servicePlanDTO->setTotalPrice($request->totalPrice);
        
        $servicePlanDTO->setApiCall('1');
        return $bServicePlan->updateServicePlanTotalPrice($servicePlanDTO);
    }

}
