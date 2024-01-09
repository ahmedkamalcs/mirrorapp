<?php
namespace App\Http\Controllers\api\v1\salon\bo;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\SalonDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\UserOtpDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Models\api\v1\salon\SalonGallery;
use App\Models\api\v1\salon\SalonServices;
use App\Models\api\v1\salon\SalonMaster;
use App\Models\api\v1\salon\WorkStyle;
use App\Models\api\v1\salon\ServiceType;
use App\Models\api\v1\salon\BusinessType;
use App\Models\api\v1\salon\SalonBranches;
use App\Models\api\v1\salon\SalonEmployee;
use App\Http\Controllers\api\v1\dto\SalonEmployeeDTO;
use App\Http\Controllers\api\v1\dto\SalonBranchesDTO;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\sns\bo\BUserOtp;
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
        if($salonservices){
            if ($servicesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Salone Services Details ";
                $response['data'] = $salonservices; //salone services Object
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }else {
            if ($servicesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Something went wrong!";
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }
    public function saveDefaultServices(ServicesDTO $servicesDTO){
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
    public function lstSalonData(SalonDTO $salonDTO){
        $salonMasterModel=new SalonMaster();
        $salonData= $salonMasterModel->getSalonDataByPhoneNumber($salonDTO->getUserPhoneNo());
        if($salonData){
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Salone Master Data ";
                $response['SalonData'] = $salonData; //salone Data Object
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }else {
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Salon does not exist!";
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
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
    public Function LstWorkStyles(SalonDTO $salonDTO){
        $WorkStyleModel=new WorkStyle();
        $WorkStylesData= $WorkStyleModel->listAll();
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Work Styles List ";
            $response['WorkStyleList'] = $WorkStylesData; // Work Styles Data Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    } 
    public Function LstServiceTypes(SalonDTO $salonDTO){
        $serviceTypeModel=new ServiceType();
        $serviceType= $serviceTypeModel->listAll();
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Service Types List ";
            $response['ServiceTypeList'] = $serviceType; // Service Types List Data Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    } 
    public Function lstBusinessTypes(SalonDTO $salonDTO){
        $businessTypeModel=new BusinessType();
        $businessType= $businessTypeModel->listAll();
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Business Types List ";
            $response['BusinessTypeList'] = $businessType; // Business Types List Data Object
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
    public function saveSalonWorkingDays(SalonDTO $salonDTO){
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataById($salonDTO->getSalonId());
    
        if(!$salonData->isEmpty()){
            $salonData=$salonMasterModel->saveSalonWorkingDays($salonDTO); 
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
    public function lstSalonBranches(SalonBranchesDTO $salonBranchesDTO){
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataById($salonBranchesDTO->getSalonId());
    
        if($salonData->isEmpty()){
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Salon '" .$salonBranchesDTO->getSalonId() . "' does not exist!" ;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
        
        $salonBranchesModel=new SalonBranches();
        $salonBranches=$salonBranchesModel->getBranchDataDTO($salonBranchesDTO);
        
        if($salonBranches){
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Salon Branches List!";
                $response['BrancheList'] = $salonBranches; //salone data Object
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }else{
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Branch'" .$salonBranchesDTO->getBranchId() . "' does not exist!" ;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }
    public function saveSalonBranches(SalonBranchesDTO $salonBranchesDTO){
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataById($salonBranchesDTO->getSalonId());
    
        if(!$salonData->isEmpty()){
            $salonbranchesModel = new SalonBranches();
            $branchData=$salonbranchesModel->SaveBrachData($salonBranchesDTO); 
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Successfully Saved!";
                $response['BranchData'] = $branchData; //salone data Object
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }else{
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Salon '" .$salonBranchesDTO->getSalonId() . "' does not exist!" ;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }
    public function lstSalonEmployee(SalonEmployeeDTO $salonEmployeeDTO){
        //checking salon 
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataById($salonEmployeeDTO->getSalonId());
    
        if($salonData->isEmpty()){
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!" ;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        $salonEmployeeModel= new SalonEmployee();
        if ($salonEmployeeDTO->getEmployeehId()==""){
            $employeeData= $salonEmployeeModel->getSalonEmployees($salonEmployeeDTO);
        }else{
            $employeeData= $salonEmployeeModel->getSalonEmployeebyId($salonEmployeeDTO);
        }
        if($employeeData){
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Salon Employee List!";
                $response['EmployeeList'] = $employeeData; //salone data Object
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }else{
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Employee '" .$salonEmployeeDTO->getEmployeehId() . "' does not exist!" ;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }
    public function saveSalonEmployee(SalonEmployeeDTO $salonEmployeeDTO){
        //checking salon 
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataById($salonEmployeeDTO->getSalonId());
    
        if($salonData->isEmpty()){
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!" ;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        $salonEmployeeModel= new SalonEmployee();
        $employeeData= $salonEmployeeModel->getSalonEmployeebyPhoneNo($salonEmployeeDTO);
        if($employeeData->isEmpty()){
            $employeeData=$salonEmployeeModel->SaveSalonEmployee($salonEmployeeDTO);
            if($employeeData){
                //Sent OTP to employee
                $userOtpDTO = new UserOtpDTO();
                $userOtpDTO->setFullName($salonEmployeeDTO->getEmployeeName());
                $userOtpDTO->setPhoneNumber($salonEmployeeDTO->getEmployeePhoneNo());
                $userOtpDTO->setUserType("Employee");
                $bUserOtp = new BUserOtp();
                $otp=$bUserOtp->saveOtp($userOtpDTO);

                if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                    $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                    $response['Message'] = "Successfully Saved!";
                    $response['EmployDetails'] = $employeeData; //salone data Object
                    return JsonHandler::getJsonMessage($response);
                } else {
                    return AppDTO::$TRUE_AS_STRING;
                }
            }
        }else{
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_ALREADY_EXIST;
                $response['Message'] = " Phone Number Already Exist! ";
                $response['EmployDetails'] = $employeeData; //salone data Object
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }
    public function updateSalonEmployee(SalonEmployeeDTO $salonEmployeeDTO){
        //checking salon 
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataById($salonEmployeeDTO->getSalonId());
    
        if($salonData->isEmpty()){
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!" ;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        $salonEmployeeModel= new SalonEmployee();
        $employeeData= $salonEmployeeModel->getSalonEmployeebyId($salonEmployeeDTO);
        if(!$employeeData->isEmpty()){
            $employeeData=$salonEmployeeModel->UpdateSalonEmployee($salonEmployeeDTO);
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Successfully updated!";
                $response['BranchData'] = $employeeData; //salone data Object
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }else{
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Employee does not exist! ";
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

}