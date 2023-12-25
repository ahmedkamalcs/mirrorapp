<?php

namespace App\Http\Controllers\api\v1\salon\client;
use App\Http\Controllers\api\v1\salon\bo\BSalon;
use App\Http\Controllers\api\v1\dto\SalonDTO;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class SalonClient {
public function SalonGalleryAndLogo(Request $request ) {
    $salonDTO= new SalonDTO();
    $salonDTO->setSalonLogo($request->file('salonLogo'));
    $salonDTO->setSalonGallery($request->file('salonGallery'));
    $salonDTO->setUserPhoneNo($request->userPhoneNo);
    $bsalon = new BSalon();
   
    return $bsalon->SalonGalleryAndLogo($salonDTO);
}

} 
