<?php

namespace App\Http\Controllers\api\v1\salon\client;
use App\Http\Controllers\api\v1\salon\bo\BSalon;
use App\Http\Controllers\api\v1\dto\SalonDTO;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
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

public  function lstDefaultServices(Request $request) {
    $servicesDTO= new ServicesDTO();
    $servicesDTO->setUserPhoneNo($request->userPhoneNo);
    $servicesDTO->setCategoryId($request->serviceId);
    $bsalon = new BSalon();
   
    return $bsalon->lstDefaultServices($servicesDTO);
} 
public function saveDefaultServices(Request $request){
    $servicesDTO= new ServicesDTO();
    $servicesDTO->setUserPhoneNo($request->userPhoneNo);
    $servicesDTO->setCategoryId($request->salonCategoryId);
    $servicesDTO->setSalonServices($request->salonServices); 
    $bsalon = new BSalon();
    
    return $bsalon->saveDefaultServices($servicesDTO);

}
}