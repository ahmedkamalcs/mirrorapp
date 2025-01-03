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
use App\Http\Controllers\api\v1\dto\AppDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class ClientBookingMaster extends Model implements ModelInterface{




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

        $booking= new ClientBookingMaster();
        
        $booking->client_phone=$bookingDTO->getClientPhoneNumber();
        $booking->booking_status="New";
        $booking->booking_date=$bookingDTO->getBookingDate();
        $booking->start_time= $bookingDTO->getBookingFrom();
        $booking->end_time= $bookingDTO->getBookingTo();
        $booking->total_price=$bookingDTO->getPrice();
        
        $booking->save();
        
        return  $booking;
 
    }

    public function updateBooking(BookingDTO $bookingDTO) {

        $booking= ClientBookingMaster::find($bookingDTO->getBookingId());
        
        $booking->booking_status="Updated";
        $booking->booking_date=$bookingDTO->getBookingDate();
        $booking->start_time= $bookingDTO->getBookingFrom();
        $booking->end_time= $bookingDTO->getBookingTo();
    
        $booking->save();
        
        return  $booking;
 
    }
    
 
    public function confirmBooking(BookingDTO $bookingDTO) {

        $booking= ClientBookingMaster::find($bookingDTO->getBookingId());
        
        $booking->booking_status="Confirmed";
        
    
        $booking->save();
        
        return  $booking;
 
    }
    public function cancellBooking(BookingDTO $bookingDTO) {

        $booking= ClientBookingMaster::find($bookingDTO->getBookingId());
        
        $booking->booking_status="Cancelled";
        
    
        $booking->save();
        
        return  $booking;
 
    }

    
    public function getBookingById($bookingId){
        $query = "select * from client_booking_master  
        where id='". $bookingId ."'";
         $bookingDetails = DBUtil::select($query);

        return $bookingDetails;
    }
    
    
    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'client_booking_master';

}