<?php

namespace App\Http\Controllers\api\v1\listing\client;
use App\Http\Controllers\api\v1\order\bo\BOrderDetails;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\listing\bo\BProductListing;
use App\Http\Controllers\api\v1\dto\ProductListingDTO;

class ProductListingClient  {
    public function listProducts()
    {
        $bProductListing = new BProductListing();
        $productListDTO = new ProductListingDTO();
        $productListDTO->setApiCall('1');
        return $bProductListing->listProducts($productListDTO);
    }
}
