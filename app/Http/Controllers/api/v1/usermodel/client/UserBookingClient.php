<?php

namespace App\Http\Controllers\api\v1\usermodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\dto\UserBookingDTO;
use App\Http\Controllers\api\v1\usermodel\bo\BUserBooking;

class UserBookingClient  {

    public function save(Request $request)
    {
        $userBookingDTO = new UserBookingDTO();
        $userBookingDTO->setUserId($request->userId);
        $userBookingDTO->setVendorBookingCalendarId($request->calendarId);
        $userBookingDTO->setUserRemarks($request->userRemarks);
        
             
        
        $bUserBooking = new BUserBooking();
        $userBookingDTO->setApiCall('0');
        return $bUserBooking->saveObject($userBookingDTO);
    }
}
