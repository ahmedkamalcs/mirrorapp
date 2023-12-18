<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\vendor;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\VendorBookingCalendarDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;


/**
 * @author ISG
 */
class VendorBookingModel extends Model implements ModelInterface{


    public function saveObject(VendorBookingCalendarDTO $vendorBookingCalendar) {
        //Create New User

        $this->calendar_day = $vendorBookingCalendar->getCalendarDay();
        $this->calendar_time = $vendorBookingCalendar->getCalendarTime();
        $this->calendar_text = $vendorBookingCalendar->getCalendarText();
        $this->vendor_master_id = $vendorBookingCalendar->getVendorMasterId();
        $this->booked = $vendorBookingCalendar->isBooked();
        $this->beautician_name = $vendorBookingCalendar->getBeauticianName();

        $this->save();
        $vendorBookingCalendar->setId($this->id);
        return $this;
    }

    public function getDTOById($id)
    {
        /*
        $targetDTO = new ItemMasterDTO();
        $targetArr = ItemMasterModel::where('id', $id )->get();
        if($targetArr)
        {
            $targetDTO->setId($targetArr[0]->id);
            $targetDTO->setItemName($targetArr[0]->item_name);
            $targetDTO->setPrice($targetArr[0]->price);
            $targetDTO->setTaxIncluded($targetArr[0]->tax_included);
            $targetDTO->setItemDescription($targetArr[0]->item_description);
            $targetDTO->setTaxId($targetArr[0]->tax_id);
            //TODO Set Currency Code in Item Master Model. getDTOById
            return $targetDTO;
        }*/
        return null;
    }




    public $timestamps = true;
    protected $table = 'isg_vendor_booking_calendar';

}
