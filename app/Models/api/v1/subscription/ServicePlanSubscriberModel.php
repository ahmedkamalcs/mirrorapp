<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\subscription;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\SystemSeriesDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\sns\bo\BSnsService;
use App\Http\Controllers\api\v1\dto\SnsDTO;
use App\Http\Controllers\isgapi\api\v1\util\StringUtil;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\ServicePlanSubscriberDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class ServicePlanSubscriberModel extends Model implements ModelInterface {

    public function addSubscriberToAPlan(ServicePlanSubscriberDTO $servicePlanSubscriberDTO){
        $this->fillInDto($servicePlanSubscriberDTO);
        $result = $this->save();
        if($result){
            $servicePlanSubscriberDTO->setId($this->id);
            return $servicePlanSubscriberDTO;
        }else{
            return null;
        }
    }
    
    private function fillInDto(ServicePlanSubscriberDTO $servicePlanSubscriber){
        $this->isg_service_plan_id = $servicePlanSubscriber->getPlanId();
        $this->isg_service_subscriber_id = $servicePlanSubscriber->getSubscriberId();
        $this->active_from = $servicePlanSubscriber->getActiveFrom();
        $this->active_to = $servicePlanSubscriber->getActiveTo();
        $this->is_active = AppDTO::$FALSE_AS_STRING;
//        $this->isg_user_id = $serviceSubscriberDTO->getApiCall();
    }
    
    public function activateOrDeactivateServicePlan(ServicePlanSubscriberDTO $servicePlanSubscriberDTO){
        return DBUtil::updateById($this->table, $servicePlanSubscriberDTO->getId(), 'is_active', $servicePlanSubscriberDTO->getIsActive()."");
    }
    
    
    public $timestamps = true;
    protected $table = 'isg_service_plan_subscriber';

}
