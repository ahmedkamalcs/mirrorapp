<?php

namespace App\Http\Controllers\api\v1\subscription\client;
use App\Http\Controllers\api\v1\order\bo\BOrderDetails;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\listing\bo\BProductListing;
use App\Http\Controllers\api\v1\dto\ProductListingDTO;
use App\Http\Controllers\api\v1\subscription\bo\BServicePlanSubscriber;
use App\Http\Controllers\api\v1\dto\ServicePlanSubscriberDTO;

class ServicePlanSubscriberClient  {
    
    public function addSubscriberToAPlan(Request $request) {

        $bServicePlanSubscriber = new BServicePlanSubscriber();
        $ervicePlanSubscriberDTO = new ServicePlanSubscriberDTO();
        $ervicePlanSubscriberDTO->setPlanId($request->planId);
        $ervicePlanSubscriberDTO->setSubscriberId($request->subscriberId);
        $ervicePlanSubscriberDTO->setActiveFrom($request->activeFrom);
        $ervicePlanSubscriberDTO->setActiveTo($request->activeTo);
        $ervicePlanSubscriberDTO->setApiCall('1');
        return $bServicePlanSubscriber->addSubscriberToAPlan($ervicePlanSubscriberDTO);
    }
    
    
    public function activateServicePlan(Request $request) {
        
        $bServicePlanSubscriber = new BServicePlanSubscriber();
        $servicePlanSubscriberDTO = new ServicePlanSubscriberDTO();
        $servicePlanSubscriberDTO->setId($request->subscriberPlanId);
        
        $servicePlanSubscriberDTO->setApiCall('1');
        return $bServicePlanSubscriber->activateServicePlan($servicePlanSubscriberDTO);
    }
    
    public function deActivateServicePlan(Request $request) {
        
        $bServicePlanSubscriber = new BServicePlanSubscriber();
        $servicePlanSubscriberDTO = new ServicePlanSubscriberDTO();
        $servicePlanSubscriberDTO->setId($request->subscriberPlanId);
        
        $servicePlanSubscriberDTO->setApiCall('1');
        return $bServicePlanSubscriber->deActivateServicePlan($servicePlanSubscriberDTO);
    }
}
