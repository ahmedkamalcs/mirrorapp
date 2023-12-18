<?php

namespace App\Http\Controllers\api\v1\order\client;
use App\Http\Controllers\api\v1\order\bo\BOrderDetails;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;

class OrderDetailsClient  {
    public function save(Request $request)
    {
        $orderDetailsDTO = new OrderDetailsDTO();
        $orderDetailsDTO->setOrderText($request->text);
        $orderDetailsDTO->setOrderMasterId($request->masterId);
        $orderDetailsDTO->setItemVendorId($request->itemVendorId);
        $orderDetailsDTO->setItemMasterId($request->itemMasterId);
        $orderDetailsDTO->setBasicPrice($request->basicPrice);
        $orderDetailsDTO->setGrossPrice($request->grossPrice);
        $orderDetailsDTO->setTaxIncluded($request->taxIncluded);
        $orderDetailsDTO->setItemName($request->itemName);
        $orderDetailsDTO->setCurrencyCode($request->currencyCode);
        $orderDetailsDTO->setTaxId($request->taxId);
        
        $bOrderDetails = new BOrderDetails();
//        $orderDetailsDTO->setApiCall('1');
        return $bOrderDetails->saveObject($orderDetailsDTO);
        
        
    }
}
