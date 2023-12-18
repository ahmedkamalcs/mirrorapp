<?php

namespace App\Http\Controllers\api\v1\vendor\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\VendorBookingCalendarDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\vendor\VendorBookingModel;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BVendorBookingCalendar extends Controller implements BusinessInterface {

    public function saveObject(VendorBookingCalendarDTO $vendorBookingCalendarDTO) {
        $vendorBookingModel = new VendorBookingModel();
        $object = $vendorBookingModel->saveObject($vendorBookingCalendarDTO);
        if ($object) {
            if ($vendorBookingCalendarDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";
                $response['Object'] = $object;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($vendorBookingCalendarDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Error!!!";

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function getDTOById($id) {
        
    }

    public function listFreeVendorBookingCalendar(VendorBookingCalendarDTO $vendorBookingCalendarDTO) {

        /*
         * SELECT v.name, v.tel_no, v.location, vc.calendar_day, vc.calendar_time,
          vc.calendar_text, vc.beautician_name from vendor_booking_calendar vc, vendor_master v
          WHERE vc.vendor_master_id = v.id AND vc.booked = '0'
         */
        $query = "SELECT v.id as 'vendor_id', v.name, v.tel_no, v.location, vc.id as 'calendar_id',  vc.calendar_day, vc.calendar_time,
            vc.calendar_text, vc.beautician_name from isg_vendor_booking_calendar vc, isg_vendor_master v
            WHERE vc.vendor_master_id = v.id AND vc.booked = '0' AND vc.calendar_day >= CURDATE() ORDER BY vc.calendar_day, vc.calendar_time asc";

        $result = DBUtil::select($query); //UserOTP::where('phone_number', $userOtpDTO->getPhoneNumber() )->get();
        if ($vendorBookingCalendarDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            if ($result) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $response['BookingList'] = $result;
            } else {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $response['BookingList'] = null;
            }
            return JsonHandler::getJsonMessage($response);
        } else {
            if ($result) {
                return $result;
            }
        }
    }

    public function listFreeVendorBookingCalendarByUserId(VendorBookingCalendarDTO $vendorBookingCalendarDTO, $userId) {

        /*
         * SELECT v.name, v.tel_no, v.location, vc.calendar_day, vc.calendar_time,
          vc.calendar_text, vc.beautician_name from vendor_booking_calendar vc, vendor_master v
          WHERE vc.vendor_master_id = v.id AND vc.booked = '0'
         */
        $query = "SELECT v.id as 'vendor_id', vc.user_id, v.name, v.tel_no, v.location, vc.id as 'calendar_id',  vc.calendar_day, vc.calendar_time,
            vc.calendar_text, vc.beautician_name from isg_vendor_booking_calendar vc, isg_vendor_master v
            WHERE vc.vendor_master_id = v.id AND vc.booked = '1'
				AND vc.user_id = " . $userId . "
				ORDER BY vc.calendar_day, vc.calendar_time ASC";

        $result = DBUtil::select($query); //UserOTP::where('phone_number', $userOtpDTO->getPhoneNumber() )->get();
        if ($vendorBookingCalendarDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            if ($result) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $response['BookingList'] = $result;
            } else {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $response['BookingList'] = null;
            }
            return JsonHandler::getJsonMessage($response);
        } else {
            if ($result) {
                return $result;
            }
        }
    }

}
