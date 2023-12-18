<?php

namespace App\Http\Controllers\api\v1\vendor\client;
use App\Http\Controllers\api\v1\vendor\bo\BVendorProfile;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\VendorProfileDTO;

class VendorProfileClient  {
    public function save(Request $request)
    {
        $vendorProfileDTO = new VendorProfileDTO();
        $vendorProfileDTO->setVendorMasterId($request->vendorMasterId);
        $vendorProfileDTO->setProfileName($request->profileName);
        
        $bVendorProfile = new BVendorProfile();
//        $vendorProfileDTO->setApiCall('1');
        return $bVendorProfile->saveObject($vendorProfileDTO);
    }
}
