<?php

namespace App\Http\Controllers\api\v1\subscription\client;
use App\Http\Controllers\api\v1\order\bo\BOrderDetails;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\listing\bo\BProductListing;
use App\Http\Controllers\api\v1\dto\ProductListingDTO;
use App\Http\Controllers\api\v1\subscription\bo\BServiceItem;
use App\Http\Controllers\api\v1\dto\ServiceItemDTO;

class ServiceItemClient  {
    public function addServiceItem(Request $request)
    {
        $bServiceItem = new BServiceItem();
        $serviceItemDTO = new ServiceItemDTO();
        
        $serviceItemDTO->setServiceName($request->serviceName);
        $serviceItemDTO->setServiceNameAr($request->serviceNameAr);
        $serviceItemDTO->setServicePrice($request->servicePrice);
        
        $serviceItemDTO->setApiCall('1');
        return $bServiceItem->addServiceItem($serviceItemDTO);
    }
}
