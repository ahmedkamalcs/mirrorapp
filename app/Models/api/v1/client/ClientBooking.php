<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\client;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\BookingDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\sns\bo\BSnsService;
use App\Http\Controllers\api\v1\dto\SnsDTO;
use App\Http\Controllers\isgapi\api\v1\util\StringUtil;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class ClientBooking extends Model implements ModelInterface{




    /**
     * Constructor routing function.
     * Switch between constructors.
     */
    public function __construct() {
        $args = func_get_args(); //any function that calls this method can take an arbitrary number of parameters
        switch (func_num_args()) {
            //delegate to helper methods
            case 0:
                $this->construct0();
                break;
            case 1:
                $this->construct1($args[0]);
                break;
            case 2:
                $this->construct2($args[0], $args[1]);
            case 3:
                $this->construct3($args[0], $args[1], $args[2]);
                break;
            default:
                trigger_error('Incorrect number of arguments for Foo::__construct', E_USER_WARNING);
        }
    }

    /*
     * Default constructor.
     */
    public function construct0() {

    }

    /**
     * Constructor with one parameter.
     * @param type $request
     */
    public function construct1($request) {
    }

    /**
     * Constructor with three parameters.
     * @author ISG
     * @param type $taskTitle target task title.
     * @param type $taskDescription target task description.
     */
    public function construct2($userId, $eventTitleEn, $eventTitleAr) {
    }

    public function SaveBooking(BookingDTO $bookingDTO) {

        $booking= new ClientBooking();
        
        $booking->client_phone=$bookingDTO->getClientPhoneNumber();
        $booking->booking_status="Pending";
        $booking->booking_date=$bookingDTO->getBookingDate();
        $booking->booking_from= $bookingDTO->getBookingFrom();
        $booking->booking_to= $bookingDTO->getBookingTo();
        $booking->salon_id= $bookingDTO->getSalonId();
        $booking->branch_id= $bookingDTO->getBranchId();
        $booking->employee_id= $bookingDTO->getEmployeeId();
        $booking->category_id=$bookingDTO->getServiceCategory();
        $booking->subcategory_id=$bookingDTO->getServiceSubCategory();
        $booking->quantity=$bookingDTO->getQuantity();
        $booking->price=$bookingDTO->getPrice();
        
        $booking->save();
        
        return  $booking;
 
    }

    public function updateBooking(BookingDTO $bookingDTO) {

        $booking= ClientBooking::find($bookingDTO->getBookingId());
        
        $booking->booking_status="Pending";
        $booking->booking_date=$bookingDTO->getBookingDate();
        $booking->booking_from= $bookingDTO->getBookingFrom();
        $booking->booking_to= $bookingDTO->getBookingTo();
    
        $booking->save();
        
        return  $booking;
 
    }
    public function saveBookingNotes(BookingDTO $bookingDTO){
         $booking= ClientBooking::find($bookingDTO->getBookingId());
        
        $booking->notes=$bookingDTO->getbookingNotes();
        
    
        $booking->save();
        return $booking;
    }
    public function updateInvoiceReference($id,$invoiceReference){
         $booking= ClientBooking::find($id);
         $booking->invoice_reference=$invoiceReference;
         $booking->save();
         return $booking;
    }
    public function confirmBooking(BookingDTO $bookingDTO) {

        $booking= ClientBooking::find($bookingDTO->getBookingId());
        
        $booking->booking_status="Confirmed";
        
    
        $booking->save();
        
        return  $booking;
 
    }
    public function cancellBooking(BookingDTO $bookingDTO) {

        $booking= ClientBooking::find($bookingDTO->getBookingId());
        
        $booking->booking_status="Cancelled";
        
    
        $booking->save();
        
        return  $booking;
 
    }

    public function lstBooking(BookingDTO $bookingDTO){
        //$query = "select * from client_booking "
          // if($bookingDTO->)
    }
    public function lstServiceBooking(BookingDTO $bookingDTO){
        $query = "select * from client_booking  
        where category_id='".$bookingDTO->getServiceCategory()."' and subcategory_id='".$bookingDTO->getServiceSubCategory()."' and salon_id='".$bookingDTO->getsalonId()."'
         and booking_status!='Cancelled' and booking_date='".$bookingDTO->getBookingDate()."'";
         $bookingDetails = DBUtil::select($query);

        return $bookingDetails;
    }
    public function getBookingById($bookingId){
        $query = "select * from client_booking  
        where id='". $bookingId ."'";
         $bookingDetails = DBUtil::select($query);

        return $bookingDetails;
    }
    public function updateBookingPaidStatus($id,$Paidstatus){
        $booking= ClientBooking::find($id);
        
        $booking->ispaid=$Paidstatus;
        
    
        $booking->save();
        
        return  $booking;
    }
    public function lstSalonPaymentDetailsByClientPhone(BookingDTO $bookingDTO){
        $query = "select cb.id bookingId, sg.logo salonLogo, sm.name salonEnglishName, sm.arabic_name salonArabicName,br.address salonAddress,br.longtitude,br.latitude,cb.notes,cb.booking_date , cb.booking_from , cb.booking_to
        ,ssub.arabic_name serviceArabicName, ssub.english_name serviceEnglishName,sser.service_duration ,cb.quantity,cb.price from 
        client_booking cb inner join salon_master sm on sm.id=cb.salon_id 
        left join salon_branches br on br.id=cb.branch_id  and br.salon_id=cb.salon_id
        left join salon_gallery sg on sm.user_phone_no=sg.user_phone_no 
        inner join services_subcategory ssub on cb.category_id=ssub.category_id and ssub.id=cb.subcategory_id
        inner join salon_services sser on sser.user_phone_no=sm.user_phone_no and cb.category_id=sser.category_id and cb.subcategory_id=sser.subcategory_id
         where cb.salon_id='".$bookingDTO->getSalonId()."' and cb.client_phone='".$bookingDTO->getClientPhoneNumber(). "'
          and cb.ispaid=0 ORDER by cb.booking_date , cb.booking_from ";
         $bookingDetails = DBUtil::select($query);

        return $bookingDetails;
    }
    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'client_booking';

}