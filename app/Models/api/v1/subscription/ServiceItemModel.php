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
use App\Http\Controllers\api\v1\dto\ServiceItemDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class ServiceItemModel extends Model implements ModelInterface {

    public function addServiceItem(ServiceItemDTO $serviceItemDTO){
        $this->fillInServiceItem($serviceItemDTO);
        if( $this->save() ){
            $serviceItemDTO->setId($this->id);
        }else{
            $serviceItemDTO->setId(null);
        }
        return $serviceItemDTO;
    }
    
    private function fillInServiceItem(ServiceItemDTO $serviceItemDTO){
        $this->service_name = $serviceItemDTO->getServiceName();
        $this->service_name_ar = $serviceItemDTO->getServiceNameAr();
        $this->service_price = $serviceItemDTO->getServicePrice();
    }
    
    public $timestamps = true;
    protected $table = 'isg_service_item';

}
