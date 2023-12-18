<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

use App\Http\Controllers\api\v1\dto\AppDTO;

/**
 * Description of PaymentProviderConfigDTO
 *
 * @author Ahmed Kamal
 */
class VendorBookingCalendarDTO implements DTOInterface {

    //put your code here

    private $id;
    private $calendarDay;
    private $calendarTime;
    private $calendarText;
    private $vendorMasterId;
    private $booked;
    private $beauticianName;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setBeauticianName($beauticianName) {
        $this->beauticianName = $beauticianName;
    }

    public function getBeauticianName() {
        return $this->beauticianName;
    }

    public function setCalendarTime($calendarTime) {
        $this->calendarTime = $calendarTime;
    }

    public function getCalendarTime() {
        return $this->calendarTime;
    }

    public function setCalendarText($calendarText) {
        $this->calendarText = $calendarText;
    }

    public function getCalendarText() {
        return $this->calendarText;
    }

    public function setVendorMasterId($vendorMasterId) {
        $this->vendorMasterId = $vendorMasterId;
    }

    public function getVendorMasterId() {
        return $this->vendorMasterId;
    }

    public function setBooked($booked) {
        $this->booked = $booked == null || $booked == '' ? '0' : $booked;
    }

    public function isBooked() {
        return $this->booked;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setCalendarDay($calendarDay) {
        $this->calendarDay = $calendarDay;
    }

    public function getCalendarDay() {
        return $this->calendarDay;
    }

}
