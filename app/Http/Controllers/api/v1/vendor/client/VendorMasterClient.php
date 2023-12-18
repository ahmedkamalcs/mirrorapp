<?php

namespace App\Http\Controllers\api\v1\vendor\client;

use App\Http\Controllers\api\v1\vendor\bo\BVendorMaster;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\VendorMasterDTO;

class VendorMasterClient {

    public function save(Request $request) {
        $vendorMasterDto = new VendorMasterDTO();
        $vendorMasterDto->setName($request->name);

        $bVendorMaster = new BVendorMaster();
        $vendorMasterDto->setApiCall('1');
        return $bVendorMaster->saveObject($vendorMasterDto);
    }

}
