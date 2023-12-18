<?php

namespace App\Http\Controllers\api\v1\subscription\client;
use App\Http\Controllers\api\v1\order\bo\BOrderDetails;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\listing\bo\BProductListing;
use App\Http\Controllers\api\v1\dto\ProductListingDTO;
use App\Http\Controllers\api\v1\dto\ServicePlanItemsDTO;
use App\Http\Controllers\api\v1\subscription\bo\BservicePlanItems;

class ServicePlanItemsClient  {
   
    public function addServicePlanItem(Request $request){
        $bServicePlanItems = new BservicePlanItems();
        $servicePlanItemsDto = new ServicePlanItemsDTO();
        $servicePlanItemsDto->setServicePlanId($request->planId);
        $servicePlanItemsDto->setServiceItemId($request->serviceId);
        $servicePlanItemsDto->setApiCall('1');
        return $bServicePlanItems->addServicePlanItem($servicePlanItemsDto);
    }
}
