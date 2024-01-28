<?php

namespace App\Http\Controllers\api\v1\salon\client;
use App\Http\Controllers\api\v1\salon\bo\BSalon;
use App\Http\Controllers\api\v1\dto\SalonDTO;
use App\Http\Controllers\api\v1\dto\SalonBranchesDTO;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
use App\Http\Controllers\api\v1\dto\SalonEmployeeDTO;
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
    //return $object->salonServices;
    //$object=file_get_contents('php://input');
    //return $request['salonCategoryId'];
    $servicesDTO= new ServicesDTO();
    $servicesDTO->setUserPhoneNo($request['userPhoneNo']);
    $servicesDTO->setCategoryId($request['salonCategoryId']);
    $servicesDTO->setSalonServices($request['salonServices']); 
    $bsalon = new BSalon();
    
    return $bsalon->saveDefaultServices($servicesDTO);

}
public function lstSalonData(Request $request){
    $salonDTO= new SalonDTO();
    $salonDTO->setUserPhoneNo($request->userPhoneNo);
    $bsalon = new BSalon();
   
    return $bsalon->lstSalonData($salonDTO);
}
public function lstWorkStyles(Request $request){
    $salonDTO= new SalonDTO();

    $bsalon = new BSalon();
   
    return $bsalon->LstWorkStyles($salonDTO);
}
public function lstServiceTypes(Request $request){
    $salonDTO= new SalonDTO();

    $bsalon = new BSalon();
   
    return $bsalon->LstServiceTypes($salonDTO);
}
public function lstBusinessTypes(Request $request){
    $salonDTO= new SalonDTO();

    $bsalon = new BSalon();
   
    return $bsalon->lstBusinessTypes($salonDTO);
}

public function saveSalonData(Request $request){
    $salonDTO= new SalonDTO();
    $salonDTO->setUserPhoneNo($request->userPhoneNo);
    $salonDTO->setSalonName($request->salonName);
    $salonDTO->setSalonArabicName($request->salonArabicName);
    $salonDTO->setSalonServiceType($request->salonServiceType);
    $salonDTO->setSalonBusinessType($request->salonBusinessType);
    $salonDTO->setSalonTeamMember($request->salonTeamMember);
    $salonDTO->setSalonBranchesNo($request->salonBranchesNo);
    $salonDTO->setSalonWorkingDaysNumbers($request->salonWorkingDays);
    $salonDTO->setSalonWorkingHoursFrom($request->salonWorkingHoursFrom);
    $salonDTO->setSalonWorkingHoursTill($request->salonWorkingHoursTill);
    $salonDTO->setSalonIsOffering24Services($request->salonIsOffering24Services);
    $salonDTO->setSalonClientsType($request->salonClientsType);
    
    $bsalon = new BSalon();
   
    return $bsalon->saveSalonData($salonDTO);
}
public function saveSalonWorkStyle(Request $request){
    $salonDTO= new SalonDTO();
    $salonDTO->setSalonId($request->salonId);
    $salonDTO->setSalonWorkStyle($request->salonWorkStyle);
    $bsalon = new BSalon();
   
    return $bsalon->saveSalonWorkStyle($salonDTO);
}
public function saveSalonServiceType(Request $request){
    $salonDTO= new SalonDTO();
    $salonDTO->setSalonId($request->salonId);
    $salonDTO->setIsSalonServices($request->salonServices);
    $salonDTO->setIsHomeServices($request->homeServices);
    $bsalon = new BSalon();
   
    return $bsalon->saveSalonServiceType($salonDTO);
}
public function saveSalonServiceGender(Request $request){
    $salonDTO= new SalonDTO();
    $salonDTO->setSalonId($request->salonId);
    $salonDTO->setIsServingFemales($request->servingFemales);
    $salonDTO->setIsServingMales($request->servingMales);
    $bsalon = new BSalon();
   
    return $bsalon->saveSalonServiceGender($salonDTO);
}

public function saveSalonWorkingDays(Request $request){
    $salonDTO= new SalonDTO();
    $salonDTO->setSalonId($request->salonId);
    $workingDays=array();
    $workingDays['Monday']=$request->isWorkingMonday;
    $workingDays['Tuesday']=$request->isWorkingTuesday;
    $workingDays['Wednesday']=$request->isWorkingWednesday;
    $workingDays['Thrusday']=$request->isWorkingThrusday;
    $workingDays['Friday']=$request->isWorkingFriday;
    $workingDays['Saturday']=$request->isWorkingSaturday;
    $workingDays['Sunday']=$request->isWorkingSunday;
    $salonDTO->setSalonWorkingDays($workingDays);
    $bsalon = new BSalon();

    return $bsalon->saveSalonWorkingDays($salonDTO);
}
public function lstSalonBranches(Request $request){
    $salonbranchesDTO= new SalonBranchesDTO();
    $salonbranchesDTO->setSalonId($request->salonId);
    $salonbranchesDTO->setBranchId($request->branchId);
    $bsalon = new BSalon();

   return $bsalon->lstSalonBranches($salonbranchesDTO);
}
public function saveSalonBranches(Request $request){
    $salonbranchesDTO= new SalonBranchesDTO();
    $salonbranchesDTO->setSalonId($request->salonId);
    $salonbranchesDTO->setBranchAddress($request->branchAddress);
    $salonbranchesDTO->setBranchLatitude($request->branchLatitude);
    $salonbranchesDTO->setBranchLongtitude($request->branchLongtitude);
    $salonbranchesDTO->setBranchId($request->branchId);
    $bsalon = new BSalon();

   return $bsalon->saveSalonBranches($salonbranchesDTO);
}
public function lstSalonEmployee(Request $request){
    $salonemployeeDTO= new SalonEmployeeDTO();
    $salonemployeeDTO->setSalonId($request->salonId);
    $salonemployeeDTO->setEmployeehId($request->employeeId);
    
    $bsalon = new BSalon();

   return $bsalon->lstSalonEmployee($salonemployeeDTO);

}
public function saveSalonEmployee(Request $request){
    $salonemployeeDTO= new SalonEmployeeDTO();
    $salonemployeeDTO->setSalonId($request->salonId);
    $salonemployeeDTO->setEmployeePhoneNo($request->employeePhoneNo);
    $salonemployeeDTO->setEmployeeName($request->employeeName);
    $bsalon = new BSalon();

   return $bsalon->saveSalonEmployee($salonemployeeDTO);

}
public function saveSalonCommercial(Request $request){
    $salonDTO= new SalonDTO();
    $salonDTO->setSalonId($request->salonId);
    $salonDTO->setCommercailFile($request->commercialRegistration);
    $salonDTO->setTaxDocument($request->taxDocument);
    $salonDTO->setBank($request->bankId);
    $salonDTO->setIBANDocument($request->IBANDocument);
    $bsalon = new BSalon();

   return $bsalon->saveSalonCommercial($salonDTO);

}
public function updateSalonEmployee(Request $request){
    $salonemployeeDTO= new SalonEmployeeDTO();
    $salonemployeeDTO->setSalonId($request->salonId);
    $salonemployeeDTO->setEmployeePhoneNo($request->employeePhoneNo);
    $salonemployeeDTO->setEmployeeName($request->employeeName);
    $salonemployeeDTO->setEmployeehId($request->employeehId);
    $bsalon = new BSalon();

   return $bsalon->updateSalonEmployee($salonemployeeDTO);

}
public function lstBank(Request $reques){
    $bsalon = new BSalon();

    return $bsalon->lstBank();
}
}