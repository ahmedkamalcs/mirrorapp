<?php
namespace App\Http\Controllers\api\v1\salon\bo;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\SalonDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Models\api\v1\salon\SalonGallery;
use App\Models\api\v1\salon\SalonServices;
use App\Models\api\v1\salon\SalonMaster;
use App\Http\Controllers\api\v1\util\JsonHandler;
use Random\RandomError;
class BSalon extends Controller implements BusinessInterface { 
    public function SalonGalleryAndLogo(SalonDTO $salonDTO ) {
        //Salon Logo 
        $salonLogo= $salonDTO->getSalonLogo();
        $salonLogo_name= md5(Rand(1000,10000));
        $salonLogo_ext=strtolower($salonLogo->getClientOriginalExtension());
        $salonLogo_full_name=  $salonLogo_name.".". $salonLogo_ext;
        $salonLogo_url= AppDTO::$salonLogoPath.".".$salonLogo_full_name;
        $salonLogo->move(AppDTO::$salonLogoPath,$salonLogo_full_name);

        // Salon Gallery 
       
        $salonGallery= $salonDTO->getSalonGallery();
        $Galleries = array();
        $images = $salonGallery;
        if($images = $salonGallery){
            foreach($images as $image){
                $salonGallery_name=md5(rand(1000,10000));
                $salonGallery_ext=strtolower($image->getClientOriginalExtension());
                $salonGallery_full_name=  $salonGallery_name.".". $salonGallery_ext;
                $salonGallery_url= AppDTO::$salonGalleryPath.".".$salonGallery_full_name;
                $image->move(AppDTO::$salonGalleryPath,$salonGallery_full_name);
                $Galleries[]=$salonGallery_full_name;
            }
        }
        $salonDTO->setSalonLogo($salonLogo_full_name);
        $salonDTO->setSalonGallery(implode('|',$Galleries));
        $salon_Gallery = new SalonGallery();
        $salon = $salon_Gallery->saveObject($salonDTO);
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Created!";
            $response['SalonGallery'] = $salon; //SalonGallery Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        
        }
      }
    public function lstDefaultServices(ServicesDTO $servicesDTO){
        $salonservicesModel=new SalonServices();
        $salonservices= $salonservicesModel->lstDefaultServices($servicesDTO);
        if ($servicesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Created!";
            $response['data'] = $salonservices; //salone services Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }
    public function SaveDefaultServices(ServicesDTO $servicesDTO){
        $salonservicesModel=new SalonServices();
        $salonservices=$servicesDTO->getSalonServices();
        $serviceDTO=new ServicesDto();
        foreach($salonservices as $salonservice){
            $serviceDTO->setUserPhoneNo($servicesDTO->getUserPhoneNo());
            $serviceDTO->setCategoryId($servicesDTO->getCategoryId());
            $serviceDTO->setSubcategoryId($salonservice['subcategoryId']);
            $serviceDTO->setIsactive($salonservice['isactive']);
            $salonservicesModel->saveDefaultServices($serviceDTO);
        }
        $updatedServices=$salonservicesModel->lstDefaultServices($servicesDTO);
        if ($servicesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Saved!";
            $response['data'] = $updatedServices; //salone services Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }
    public function saveSalonData(SalonDTO $salonDTO){
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataByPhoneNumber($salonDTO->getUserPhoneNo());

        if(!$salonData->isEmpty()){
           $salonDTO->setSalonId($salonData[0]->id);
            $salonData=$salonMasterModel->updateSalonData($salonDTO);
        }else {
            $salonData=$salonMasterModel->SaveSalonData($salonDTO);
        }   
        
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Saved!";
            $response['SalonData'] = $salonData; //salone data Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }  
public function saveSalonWorkStyle(SalonDTO $salonDTO){
    $salonMasterModel=new SalonMaster();
    $salonData=$salonMasterModel->getSalonDataById($salonDTO->getSalonId());
   
    if(!$salonData->isEmpty()){
        $salonData=$salonMasterModel->saveSalonWorkStyle($salonDTO); 
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Saved!";
            $response['SalonData'] = $salonData; //salone data Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }else{
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
            $response['Message'] = "Salon '" .$salonDTO->getSalonId() . "' does not exist!" ;
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }
    
}
public function saveSalonServiceType(SalonDTO $salonDTO){
    $salonMasterModel=new SalonMaster();
    $salonData=$salonMasterModel->getSalonDataById($salonDTO->getSalonId());
   
    if(!$salonData->isEmpty()){
        $salonData=$salonMasterModel->saveSalonServiceType($salonDTO); 
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Saved!";
            $response['SalonData'] = $salonData; //salone data Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }else{
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
            $response['Message'] = "Salon '" .$salonDTO->getSalonId() . "' does not exist!" ;
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }
    
}
public function saveSalonServiceGender(SalonDTO $salonDTO){
    $salonMasterModel=new SalonMaster();
    $salonData=$salonMasterModel->getSalonDataById($salonDTO->getSalonId());
   
    if(!$salonData->isEmpty()){
        $salonData=$salonMasterModel->saveSalonServiceGender($salonDTO); 
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Saved!";
            $response['SalonData'] = $salonData; //salone data Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }else{
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
            $response['Message'] = "Salon '" .$salonDTO->getSalonId() . "' does not exist!" ;
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }
    
}
}