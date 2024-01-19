<?php
namespace App\Http\Controllers\api\v1\client\bo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\BookingDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Models\api\v1\salon\SalonMaster;
use App\Models\api\v1\salon\SalonBranches;
use App\Models\api\v1\salon\SalonEmployee;
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

        //checking branches
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
        }
        //Save Booking 
        $clientBooking= new ClientBooking();
        $bookingObject=$clientBooking->SaveBooking($bookingDTO);
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

}