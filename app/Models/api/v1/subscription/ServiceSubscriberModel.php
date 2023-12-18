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
use App\Http\Controllers\api\v1\dto\ServiceSubscriberDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class ServiceSubscriberModel extends Model implements ModelInterface {

    public function addSeubscriber(ServiceSubscriberDTO $serviceSubscriberDTO) {
        $this->fillInDto($serviceSubscriberDTO);
        $result = $this->save();
        if ($result) {
            $serviceSubscriberDTO->setId($this->id);
            return $serviceSubscriberDTO;
        } else {
            return null;
        }
    }

    public function listSubscriberPlan(ServiceSubscriberDTO $serviceSubscriberDTO) {

//        $this->fillInDto($serviceSubscriberDTO);
//        $result = $this->save();
//        if($result){
//            $serviceSubscriberDTO->setId($this->id);
//            return $serviceSubscriberDTO;
//        }else{
//            return null;
//        }

        $query = "SELECT * FROM isg_service_plan_subscriber sps, isg_service_plan sp, isg_service_subscriber ss
                    WHERE sps.isg_service_subscriber_id = ss.id
                    AND sps.isg_service_plan_id = sp.id
                    AND sps.is_active = '1'
                    AND ss.id = " . $serviceSubscriberDTO->getId();
        
        

        return DBUtil::select($query);
    }

    
    private function fillInDto(ServiceSubscriberDTO $serviceSubscriberDTO) {
        $this->subscriber_name = $serviceSubscriberDTO->getSubscriberName();
        $this->email_id = $serviceSubscriberDTO->getEmailId();
        $this->tell_no = $serviceSubscriberDTO->getTellNo();
//        $this->isg_user_id = $serviceSubscriberDTO->getApiCall();
    }

    public $timestamps = true;
    protected $table = 'isg_service_subscriber';

}
