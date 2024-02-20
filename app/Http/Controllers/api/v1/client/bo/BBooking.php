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
use App\Models\api\v1\salon\SalonInvoices;
use App\Models\api\v1\salon\PaymentInvoices;
use App\Models\api\v1\client\ServiceCategory;
use App\Http\Controllers\api\v1\dto\SalonEmployeeDTO;
use App\Http\Controllers\api\v1\dto\SalonBranchesDTO;
use App\Http\Controllers\api\v1\util\JsonHandler;
use Random\RandomError;
use App\Http\Controllers\api\v1\dto\SalonInvoiceDTO;
use App\Http\Controllers\api\v1\dto\JsonHandlerDTO;
use App\Models\api\v1\client\ClientBooking;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

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
        $categoryresult=array();
        if ($categoryarr) {
            foreach( $categoryarr as $Category){
                If($Category->icon != null  or $Category->icon !=""){
                    $Category->icon=AppDTO::$serverlink . AppDTO::$serviceCategoryIconPath . $Category->icon;
                }
                    $categoryresult[]=$Category;
            }
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Category List");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("CategoriesLst");
                $jsonHandlerDto->setResultInArr($categoryresult);
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
       /* if($bookingDTO->getEmployeeId()!="" or $bookingDTO->getEmployeeId()!=null){
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
        }*/
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
    public function lstAvailableTimeSlot(BookingDTO $bookingDTO){
        $servicesDTO= new ServicesDTO();
        $servicesDTO->setSalonId($bookingDTO->getSalonId());
        $servicesDTO->setCategoryId($bookingDTO->getServiceCategory());
        $servicesDTO->setSubcategoryId($bookingDTO->getServiceSubCategory());
        $salonServiceModel= new SalonServices();
        $salonBookingModel=new  ClientBooking();
        $allBooked=$salonBookingModel->lstServiceBooking($bookingDTO);
        $serviceDateails=$salonServiceModel->LstSalonService($servicesDTO);
        $bookingSeat=1;
        if ($serviceDateails){
            if($serviceDateails[0]->working_hours_till=="12:00 AM"){
                $serviceDateails[0]->working_hours_till="23:59:59 PM";
            }
            $stackSlot = array();
            $bookedSlot = array();
            $bookingDuration=$serviceDateails[0]->service_duration;
            for ($time = $serviceDateails[0]->working_hours_from; $time < $serviceDateails[0]->working_hours_till;) {
                $bookedSeat=0; 
                $availableSeat=0;   
                $timeAndDuration = date("H:i:s", (strtotime($bookingDuration) + strtotime($time)));

                foreach($allBooked as $bookedslot){
                        $bookedEndTime = date("H:i A", strtotime($bookedslot->booking_to));
                        $bookedStartTime = date("H:i A", strtotime($bookedslot->booking_from));
                        if ((($time >= $bookedStartTime && $time < $bookedEndTime) || ($bookedStartTime >= $time && $bookedStartTime < $timeAndDuration)) ){
                            $bookedSeat += $bookedslot->quantity;
                        } else {
                            $bookedSeat += 0;
                        }
                    }
                    $availableSeat=$bookingSeat-$bookedSeat;
                    if($availableSeat>0){
                     array_push($stackSlot,date("H:i:s", strtotime($time)));
                    }
                    $time=strtotime($time)- strtotime("00:00:00") + strtotime(date("H:i:s",$bookingDuration*60));
                    IF($time>strtotime("23:59:59")){
                        break;
                    }
                        $time = date("H:i:s", $time);
                  
           }
           $finalSlot=array();
           date_default_timezone_set("Asia/Riyadh");
            $currentTime= date("H:i:s");
            $currentDate=date("Y-m-d");
//            echo $currentDate;
           foreach($stackSlot as $slot){
                if ($currentDate==$bookingDTO->getBookingDate()){
                    if ($slot>$currentTime){
                        $endtime=date("h:i A",strtotime($slot)  + strtotime(date("H:i:s",$bookingDuration*60)));
                        $slot= date("h:i A", strtotime($slot)) . " - ". $endtime;
                        array_push($finalSlot,$slot);
                    }

                }else {
                    $endtime=date("h:i A",strtotime($slot)  + strtotime(date("H:i:s",$bookingDuration*60)));
                    $slot= date("h:i A", strtotime($slot)) . " - ". $endtime;
                    array_push($finalSlot,$slot);
                }
           }
           if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Available Times");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultHead("Time Slot");
            $jsonHandlerDto->setResultInArr($finalSlot);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
        }else {
            if ($bookingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $finalSlot=array();
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Service does not exist");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($finalSlot);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }

    }
    public function savePayment(SalonInvoiceDTO $salonInvoiceDTO){
        $salonMasterModel=new SalonMaster();
        $bookingModel = new ClientBooking();
        $salonInvoiceModel=new SalonInvoices();
        $isNewInvoice=false;
        $salonData=$salonMasterModel->getSalonDataById($salonInvoiceDTO->getSalonId());
    
        if($salonData->isEmpty()){
            if ($salonInvoiceDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {

                        $jsonHandlerDto = new JsonHandlerDTO();
                        $jsonHandlerDto->setMessage("Salon '" .$salonInvoiceDTO->getSalonId() . "' does not exist!");
                        $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        $salonBookigs=$salonInvoiceDTO->getBookingId();
        $invoice=array();
        foreach($salonBookigs as $booking){
            $bookDetails=$bookingModel->getBookingById($booking);
            
            if($bookDetails){
                if($bookDetails[0]->invoice_reference=="" or $bookDetails[0]->invoice_reference==null){
                    $salonInvoiceDTO->setBookingId($booking);
                    $invoice=$salonInvoiceModel->saveSalonInvoice($salonInvoiceDTO);
                    $isNewInvoice=true;
                    break;
                }
            }
        }
        if($isNewInvoice){
            foreach($salonBookigs as $booking){
                $bookDetails=$bookingModel->getBookingById($booking);
                if($bookDetails[0]->invoice_reference=="" or $bookDetails[0]->invoice_reference==null){
                $bookDetails=$bookingModel->updateInvoiceReference($booking,$invoice['id']);
                }
            }
            if ($salonInvoiceDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Saved Successfully");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("PaymentDetails");
                $jsonHandlerDto->setResultInArr($invoice);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        if ($salonInvoiceDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Booking already has invoice References");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultHead("PaymentDetails");
            $jsonHandlerDto->setResultInArr($invoice);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }


    }
    public function updatePayment(SalonInvoiceDTO $salonInvoiceDTO){
        $salonMasterModel=new SalonMaster();
        $bookingModel = new ClientBooking();
        $paymentInvoiceModel= new PaymentInvoices();
        $salonInvoiceModel=new SalonInvoices();
        $salonData=$salonMasterModel->getSalonDataById($salonInvoiceDTO->getSalonId());
    
        if($salonData->isEmpty()){
            if ($salonInvoiceDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {

                        $jsonHandlerDto = new JsonHandlerDTO();
                        $jsonHandlerDto->setMessage("Salon '" .$salonInvoiceDTO->getSalonId() . "' does not exist!");
                        $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
       
        $salonBookigs=$salonInvoiceDTO->getBookingId();
        $invoice=array();
        $prevouse_invocie="";
        foreach($salonBookigs as $booking){
            $bookDetails=$bookingModel->getBookingById($booking); 
            if($bookDetails){
                
                if($bookDetails[0]->invoice_reference != $prevouse_invocie){
                    $prevouse_invocie=$bookDetails[0]->invoice_reference;
                    if($salonInvoiceDTO->getPaymentStatus()=="Paid"){
                        $invoice= $salonInvoiceModel->updatePaymentStatus($bookDetails[0]->invoice_reference,$salonInvoiceDTO->getPaymentStatus(),$salonInvoiceDTO->getPaymentResponse());
                        $salonInvoiceDTO->setInvoiceId($bookDetails[0]->invoice_reference);
                        $payment=$paymentInvoiceModel->savePayment($salonInvoiceDTO);
                    }else{
                        $invoice=$salonInvoiceModel->updatePaymentStatus($bookDetails[0]->invoice_reference,$salonInvoiceDTO->getPaymentStatus(),$salonInvoiceDTO->getPaymentResponse());
                    }
                }
            }
        }

            if ($salonInvoiceDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Saved Successfully");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultHead("PaymentDetails");
                $jsonHandlerDto->setResultInArr($invoice);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
    }
}