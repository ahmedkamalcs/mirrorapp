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
use App\Http\Controllers\api\v1\dto\ServicePlanItemsDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class ServicePlanItemsModel extends Model implements ModelInterface {

    
    public function addServicePlanItem(ServicePlanItemsDTO $servicePlanItemsDto){
     
        $this->fillInDto($servicePlanItemsDto);
        $result = $this->save();
        if($result){
            $servicePlanItemsDto->setId($this->id);
            return $servicePlanItemsDto;
        }else{
            return null;
        }
    }
    
    private function fillInDto(ServicePlanItemsDTO $servicePlanItemsDto){
        $this->isg_service_plan_id = $servicePlanItemsDto->getServicePlanId();
        $this->isg_service_item_id = $servicePlanItemsDto->getServiceItemId();
    }
    
    public $timestamps = true;
    protected $table = 'isg_service_plan_items';

}
