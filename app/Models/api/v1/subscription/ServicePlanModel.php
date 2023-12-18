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
use App\Http\Controllers\api\v1\dto\ServicePlanDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class ServicePlanModel extends Model implements ModelInterface {

    public function listServicePlans(){
        /*SELECT sp.id, sp.plan_name, si.service_name, si.service_price, sp.total_price FROM isg_service_plan sp, isg_service_plan_items spi, isg_service_item si
        WHERE sp.id = spi.isg_service_plan_id
        AND si.id = spi.isg_service_item_id
        AND sp.is_active = '1';*/
        
        $query = "SELECT sp.id, sp.plan_name, si.service_name, si.service_price, sp.total_price FROM isg_service_plan sp, isg_service_plan_items spi, isg_service_item si
                    WHERE sp.id = spi.isg_service_plan_id
                    AND si.id = spi.isg_service_item_id
                    AND sp.is_active = '1' ORDER BY sp.total_price asc; ";
        
        return DBUtil::select($query);
    }
    
    public function addServicePlan(ServicePlanDTO $servicePlanDto){
        $this->fillInFromDto($servicePlanDto);
        $result = $this->save();
        if($result){
            $servicePlanDto->setId($this->id);
            return $servicePlanDto;
        }else{
            return null;
        }
    }
    
    private function fillInFromDto(ServicePlanDTO $servicePlanDto){
        $this->plan_name = $servicePlanDto->getPlanName();
        $this->plan_name_ar = $servicePlanDto->getPlanNameAr();
        $this->total_price = $servicePlanDto->getTotalPrice();
        $this->is_active = AppDTO::$FALSE_AS_STRING;
    }
    
    public function activateOrDeactivateServicePlan(ServicePlanDTO $servicePlanDto){
        return DBUtil::updateById('isg_service_plan', $servicePlanDto->getId(), 'is_active', $servicePlanDto->getIsActive()."");
    }
    
    public function updateServicePlanTotalPrice(ServicePlanDTO $servicePlanDto){
        return DBUtil::updateById('isg_service_plan', $servicePlanDto->getId(), 'total_price', $servicePlanDto->getTotalPrice());
    }
    
    public $timestamps = true;
    protected $table = 'isg_service_plan';

}
