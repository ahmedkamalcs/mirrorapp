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
class UserBookingDTO implements DTOInterface {

    //put your code here

    private $userId;
    private $vendorBookingCalendarId;
    private $userRemarks;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setUserRemarks($userRemarks) {
        $this->userRemarks = $userRemarks;
    }

    public function getUserRemarks() {
        return $this->userRemarks;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setVendorBookingCalendarId($vendorBookingCalendarId) {
        $this->vendorBookingCalendarId = $vendorBookingCalendarId;
    }

    public function getVendorBookingCalendarId() {
        return $this->vendorBookingCalendarId;
    }

}
