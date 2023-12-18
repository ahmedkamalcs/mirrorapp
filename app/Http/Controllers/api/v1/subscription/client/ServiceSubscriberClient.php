<?php

namespace App\Http\Controllers\api\v1\subscription\client;
use App\Http\Controllers\api\v1\order\bo\BOrderDetails;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\listing\bo\BProductListing;
use App\Http\Controllers\api\v1\dto\ProductListingDTO;
use App\Http\Controllers\api\v1\subscription\bo\BServiceSubscriber;
use App\Http\Controllers\api\v1\dto\ServiceSubscriberDTO;

class ServiceSubscriberClient  {
    public function addSubscriber(Request $request) {

        $bServiceSubscriber = new BServiceSubscriber();
        $serviceSubscriberDTO = new ServiceSubscriberDTO();
        $serviceSubscriberDTO->setSubscriberName($request->subscriberName);
        $serviceSubscriberDTO->setEmailId($request->emailId);
        $serviceSubscriberDTO->setTellNo($request->tellNo);
        $serviceSubscriberDTO->setUserId($request->userId);
        $serviceSubscriberDTO->setApiCall('1');
        return $bServiceSubscriber->addSubscriber($serviceSubscriberDTO);
    }
    public function listSubscriberPlan(Request $request) {

        
        $bServiceSubscriber = new BServiceSubscriber();
        $serviceSubscriberDTO = new ServiceSubscriberDTO();
        $serviceSubscriberDTO->setId($request->subscriberId);
        
        $serviceSubscriberDTO->setApiCall('1');
        return $bServiceSubscriber->listSubscriberPlan($serviceSubscriberDTO);
    }
}
