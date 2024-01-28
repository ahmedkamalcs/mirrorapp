<?php
namespace App\Http\Controllers\api\v1\client\bo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\BookingDTO;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Models\api\v1\salon\SalonMaster;
use App\Models\api\v1\salon\SalonBranches;
use App\Models\api\v1\salon\SalonServices;
use App\Models\api\v1\salon\SalonEmployee;
use App\Models\api\v1\client\ServiceCategory;
use App\Http\Controllers\api\v1\dto\SalonEmployeeDTO;
use App\Http\Controllers\api\v1\dto\SalonBranchesDTO;
use App\Http\Controllers\api\v1\util\JsonHandler;
use Random\RandomError;
use App\Http\Controllers\api\v1\dto\JsonHandlerDTO;
use App\Models\api\v1\client\ClientBooking;

class BBooking extends Controller implements BusinessInterface { 
        
    public function SaveBooking(BookingDTO $bookingDTO){
        //checking salon
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataById($bookingDTO->getSalonId());
    
        if($salonData->isEmpty()){
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {

                        $jsonHandlerDto = new JsonHandlerDTO();
                        $jsonHandlerDto->setMessage("Salon '" .$bookingDTO->getSalonId() . "' does not exist!");
                        $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        //Checking Emplyee
        $salonEmplyeeDTO=new SalonEmployeeDTO();
        $salonEmplyeeDTO->setEmployeehId($bookingDTO->getEmployeeId());
        $salonEmplyeeDTO->setSalonId($bookingDTO->getSalonId());
        $salonEmployeeModel= new SalonEmployee();
        $employeeData= $salonEmployeeModel->getSalonEmployeebyId($salonEmplyeeDTO);
        
        if(!$employeeData){
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                        $jsonHandlerDto = new JsonHandlerDTO();
                        $jsonHandlerDto->setMessage("Employee does not exist! ");

                        $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            }

        }

    /*   //checking branches
        $salonBranchesDTO= new SalonBranchesDTO();
        $salonBranchesDTO->setBranchId($bookingDTO->getBranchId());
        $salonBranchesDTO->setSalonId($bookingDTO->getSalonId());
        $salonBranchesModel=new SalonBranches();
        $salonBranches=$salonBranchesModel->getBranchDataDTO($salonBranchesDTO);
        
        if(!$salonBranches){
        
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Branch'" .$salonBranchesDTO->getBranchId() . "' does not exist!" ;
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Branch'" .$salonBranchesDTO->getBranchId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }*/  
        //Save Booking 
        $clientBookingModel= new ClientBooking();
        $bookingObject=$clientBookingModel->SaveBooking($bookingDTO);
        if ($bookingObject) {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Booked Successfully!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("BookingDetails");
                $jsonHandlerDto->setResultInArr($bookingObject);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
               
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        
        

    }
    public function UpdateBooking(BookingDTO $bookingDTO){
       
        $clientBookingModel= new ClientBooking();
        $bookingObject=$clientBookingModel->updateBooking($bookingDTO);
        if ($bookingObject) {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Booked Successfully!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("BookingDetails");
                $jsonHandlerDto->setResultInArr($bookingObject);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
               
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        
        

    }
    public function CancellBooking(BookingDTO $bookingDTO){
       
        $clientBookingModel= new ClientBooking();
        $bookingObject=$clientBookingModel->cancellBooking($bookingDTO);
        if ($bookingObject) {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Cancelled Successfully!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("BookingDetails");
                $jsonHandlerDto->setResultInArr($bookingObject);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
               
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        
        

    }
    public function ConfirmBooking(BookingDTO $bookingDTO){
       
        $clientBookingModel= new ClientBooking();
        $bookingObject=$clientBookingModel->confirmBooking($bookingDTO);
        if ($bookingObject) {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Confirmed Successfully!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("BookingDetails");
                $jsonHandlerDto->setResultInArr($bookingObject);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
               
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        
        

    }
    public function lstCategory(){
        $bookingDTO=new BookingDTO();
        $serviceCategoryModel=new ServiceCategory();
        $categoryarr=$serviceCategoryModel->lstCategory();
        if ($categoryarr) {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Category List");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("CategoriesLst");
                $jsonHandlerDto->setResultInArr($categoryarr);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
               
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }

    }
    public function lstSalonBooking(BookingDTO $bookingDTO){

         //checking salon
        $salonMasterModel=new SalonMaster();
        $salonData=$salonMasterModel->getSalonDataById($bookingDTO->getSalonId());
    
        if($salonData->isEmpty()){
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {

                        $jsonHandlerDto = new JsonHandlerDTO();
                        $jsonHandlerDto->setMessage("Salon '" .$bookingDTO->getSalonId() . "' does not exist!");
                        $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
        if($bookingDTO->getEmployeeId()!="" or $bookingDTO->getEmployeeId()!=null){
                //Checking Emplyee
                $salonEmplyeeDTO=new SalonEmployeeDTO();
                $salonEmplyeeDTO->setEmployeehId($bookingDTO->getEmployeeId());
                $salonEmplyeeDTO->setSalonId($bookingDTO->getSalonId());
                $salonEmployeeModel= new SalonEmployee();
                $employeeData= $salonEmployeeModel->getSalonEmployeebyId($salonEmplyeeDTO);
                
                if(!$employeeData){
                    if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                                $jsonHandlerDto = new JsonHandlerDTO();
                                $jsonHandlerDto->setMessage("Employee does not exist! ");

                                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                        return JsonHandler::getJsonMessage($jsonHandlerDto);
                    }

                }   
        }
        $clientBookingModel= new ClientBooking();
        $bookingObject=$clientBookingModel->lstBooking($bookingDTO);
        if ($bookingObject) {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Booking List");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("SalonBokingLst");
                $jsonHandlerDto->setResultInArr($bookingObject);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
               
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }

        
    }
    public function lstSalonByCategory(ServicesDTO $serviceDTO){
        
        $salonServiceModel=new SalonServices();
        $categoryarr=$salonServiceModel->lstSalonByCategory($serviceDTO);
        if ($categoryarr) {
            if ($serviceDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon List");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("SalonLst");
                $jsonHandlerDto->setResultInArr($categoryarr);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($serviceDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
               
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }
}