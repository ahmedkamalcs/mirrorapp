<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\order;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\ItemMasterDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\sys\bo\BSystemSeries;
use App\Http\Controllers\api\v1\dto\SystemSeriesDTO;
use App\Http\Controllers\api\v1\dto\OrderMasterDTO;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\dto\OrderBasketDTO;


/**
 * @author ISG
 */
class OrderBasketModel extends Model implements ModelInterface{


    public function saveObject(OrderBasketDTO $orderBasketDTO) {
        //Create New User


        $this->fillInData($orderBasketDTO);

        $this->save();
        return $this;
    }

    private function fillInData(OrderBasketDTO $orderBasketDTO)
    {
        $this->name =   $orderBasketDTO->getName();
        $this->item_vendor_id = $orderBasketDTO->getItemVendorId();
        $this->user_id = $orderBasketDTO->getUserId();
        $this->status = AppDTO::$ORDER_NO_INPROGRESS;

    }


    public function getDTOById($id)
    {

    }

    public $timestamps = true;
    protected $table = 'isg_order_basket';

}
