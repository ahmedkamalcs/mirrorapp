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


/**
 * @author ISG
 */
class OrderMasterModel extends Model implements ModelInterface{


    public function saveObject(OrderMasterDTO $orderMasterDTO) {
        //Create New User

        $sysSeriesDTO = BSystemSeries::getOrderNoSeriesDTO();

        $this->order_no = $sysSeriesDTO->getLastNumber()+1;
        $this->order_text = $orderMasterDTO->getOrderText();
        $this->total_net_price = $orderMasterDTO->getTotalNetPrice();
        $this->total_gross_price = $orderMasterDTO->getTotalNetPrice();


        $this->save();
        BSystemSeries::updateSeries($sysSeriesDTO);
        $orderMasterDTO->setId($this->id);
        return $orderMasterDTO;
//        return $this;
    }


    public function updateOrderTotals(OrderDetailsDTO $orderDetailsDTO)
    {
        /*
            UPDATE order_master SET total_net_price = (IFNULL(total_net_price, 0) + 1 ),
            total_gross_price = (IFNULL(total_gross_price, 0) + 1 )
            WHERE order_no = 4
         */

        $targetDTO = $this->getDTOById($orderDetailsDTO->getOrderMasterId());
        $totalNet = $targetDTO->getTotalNetPrice() + $orderDetailsDTO->getBasicPrice();
        $totalGross = $targetDTO->getTotalGrossPrice() + $orderDetailsDTO->getGrossPrice();

        OrderMasterModel::where('id',$orderDetailsDTO->getOrderMasterId())
                ->update(['total_net_price'=>$totalNet, 'total_gross_price'=>$totalGross]);

    }


    public function getDTOById($id)
    {
        $targetDTO = new OrderMasterDTO();
        $objAsArr = OrderMasterModel::where('id', $id )->get();
        if($objAsArr)
        {
            $targetDTO->setId($objAsArr[0]->id);
            $targetDTO->setOrderNo($objAsArr[0]->order_no);
            $targetDTO->setOrderText($objAsArr[0]->order_text);
            $targetDTO->setTotalNetPrice($objAsArr[0]->total_net_price);
            $targetDTO->setTotalGrossPrice($objAsArr[0]->total_gross_price);
            //TODO change order status
            return $targetDTO;
        }
        return null;
    }


    public function createUserByPhoneNumber(UserDTO $userDTO)
    {
        $userDTO->setIsPhoneVerified(AppDTO::$TRUE_AS_STRING);
        $userDTO->setUserActive(AppDTO::$TRUE_AS_STRING);
        return $this->createUser($userDTO);
    }

    public $timestamps = true;
    protected $table = 'isg_order_master';

}
