<?php

namespace App\Http\Controllers\api\v1\vendor\client;
use App\Http\Controllers\api\v1\vendor\bo\BVendorBookingCalendar;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\VendorBookingCalendarDTO;

class VendorBookingCalendarClient  {
    public function save(Request $request)
    {
        $vendorBookingCalendar = new VendorBookingCalendarDTO();
        $vendorBookingCalendar->setCalendarDay($request->calendarDay);
        $vendorBookingCalendar->setCalendarTime($request->calendarTime);
        $vendorBookingCalendar->setCalendarText($request->calendarText);
        $vendorBookingCalendar->setVendorMasterId($request->vendorMasterId);
        $vendorBookingCalendar->setBooked($request->booked);
        $vendorBookingCalendar->setBeauticianName($request->beauticianName);
        
        
        $bVendorBookingCalendar = new BVendorBookingCalendar();
        $vendorBookingCalendar->setApiCall('1');
        return $bVendorBookingCalendar->saveObject($vendorBookingCalendar);
    }
    
    public function listFreeVendorBookingCalendar()
    {
        $bVendorBookingCalendar = new BVendorBookingCalendar();
        $vendorBookingCalnedarDTO = new VendorBookingCalendarDTO();
        $vendorBookingCalnedarDTO->setApiCall('1');
        return $bVendorBookingCalendar->listFreeVendorBookingCalendar($vendorBookingCalnedarDTO);
    }
    
    public function listFreeVendorBookingCalendarByUserId(Request $request)
    {
        $bVendorBookingCalendar = new BVendorBookingCalendar();
        $vendorBookingCalnedarDTO = new VendorBookingCalendarDTO();
        $vendorBookingCalnedarDTO->setApiCall('1');
        return $bVendorBookingCalendar->listFreeVendorBookingCalendarByUserId($vendorBookingCalnedarDTO, $request->userId);
    }
}
