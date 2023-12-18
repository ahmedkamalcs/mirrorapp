<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\usermodel;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\UserBookingDTO;
use App\Models\api\v1\vendor\VendorBookingModel;

/**
 * @author ISG
 */
class UserBookingModel extends Model implements ModelInterface {

    public function saveObject(UserBookingDTO $userBookingDTO) {
        //Create New User

        $this->user_id = $userBookingDTO->getUserId();
        $this->vendor_booking_calendar_id = $userBookingDTO->getVendorBookingCalendarId();
        $this->user_remarks = $userBookingDTO->getUserRemarks();

        $this->save();
        $this->bookCalendarTime($userBookingDTO);
        return $this;
    }

    public function bookCalendarTime(UserBookingDTO $userBookingDTO) {
        //Get Calendar Object by Id.
        VendorBookingModel::where('id', $userBookingDTO->getVendorBookingCalendarId())
                ->update(['user_id' => $userBookingDTO->getUserId(), 'booked' => AppDTO::$TRUE_AS_STRING]);
    }

    public function listUserBookingByVendorId($vendorId) {
        $query = "select user_id, vendor_booking_calendar_id from isg_user_booking";

        $result = DBUtil::select($query);

        return $result;
    }

    public function getDTOById($id) {

    }

    public $timestamps = true;
    protected $table = 'isg_user_booking';

}
