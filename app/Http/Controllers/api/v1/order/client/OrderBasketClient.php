<?php

namespace App\Http\Controllers\api\v1\order\client;
use App\Http\Controllers\api\v1\order\bo\BOrderMaster;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderBasketDTO;
use App\Http\Controllers\api\v1\order\bo\BOrderBasket;

class OrderBasketClient  {
    public function save(Request $request)
    {
        $orderBasketDTO = new OrderBasketDTO();
        $orderBasketDTO->setUserId($request->userId);
        $orderBasketDTO->setItemVendorId($request->itemVendorId);
        $orderBasketDTO->setName($request->name);
        
        $bOrderBasket = new BOrderBasket();
        $orderBasketDTO->setApiCall('0');
        return $bOrderBasket->saveObject($orderBasketDTO);
    }
    
    public function basketToOrder(Request $request)
    {
        $orderBasketDTO = new OrderBasketDTO();
        $orderBasketDTO->setUserId($request->userId);
        $bOrderBasket = new BOrderBasket();
        $orderBasketDTO->setApiCall('0');
        return $bOrderBasket->basketToOrder($orderBasketDTO);
    }
}
