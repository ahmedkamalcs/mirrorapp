<?php

namespace App\Http\Controllers\api\v1\order\client;
use App\Http\Controllers\api\v1\order\bo\BOrderMaster;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderMasterDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;

class OrderMasterClient  {
    public function save(Request $request)
    {
        $orderMasterDTO = new OrderMasterDTO();
        $orderMasterDTO->setOrderText($request->text);
        $orderMasterDTO->setTotalNetPrice($request->netPrice);
        $orderMasterDTO->setTotalGrossPrice($request->grossPrice);
        
        $bOrderMaster = new BOrderMaster();
//        $orderMasterDTO->setApiCall('0');
        return $bOrderMaster->saveObject($orderMasterDTO);
    }
}
