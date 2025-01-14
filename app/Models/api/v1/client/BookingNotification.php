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
class BookingNotification extends Model implements ModelInterface{




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

    public function SaveBookingNotification(BookingDTO $bookingDTO) {

        $bookingNotification= new BookingNotification();
        
        $bookingNotification->salonId=$bookingDTO->getSalonId();
        $bookingNotification->bookingId=$bookingDTO->getbookingReference();
        $bookingNotification->client_mob_num=$bookingDTO->getClientPhoneNumber();
        $bookingNotification->bookingType=$bookingDTO->getbookingType();
        $bookingNotification->isNotificationOpened=0;
        
        
        $bookingNotification->save();
        
        return  $bookingNotification;
 
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
    

    public function lstSalonInbox(BookingDTO $bookingDTO){
        $query = "select booking_inbox.id,'' as 'clinetProfileImageUrl',isg_user.first_name 'clientName' ,client_booking_master.booking_date 'date',booking_inbox.bookingId , booking_inbox.isNotificationOpened ,booking_inbox.bookingType 'bookingType' from booking_inbox
                  left join isg_user on booking_inbox.client_mob_num=isg_user.user_phone_no
                  inner join client_booking_master on client_booking_master.id=booking_inbox.bookingId
        where ''=''";
        if($bookingDTO->getSalonId()!=""){
            $query=$query." and booking_inbox.salonId='".$bookingDTO->getSalonId()."'";
        }

        if($bookingDTO->getClientPhoneNumber()!="" and $bookingDTO->getClientPhoneNumber()!="+"){
            $query=$query." and booking_inbox.client_mob_num='".$bookingDTO->getClientPhoneNumber()."'";
        }
        $query=$query." order by booking_inbox.created_at DESC , booking_inbox.updated_at DESC";
         $SalonInbox = DBUtil::select($query);

        return $SalonInbox;
    }

    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'booking_inbox';

}