<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationDTO
 *
 * @author Ahmed Kamal
 */

namespace App\Http\Controllers\api\v1\dto;

use App\Http\Controllers\api\v1\util\StringUtil;

class SnsDTO implements DTOInterface {

    public static $DEFAULT_SENDER_ID = "ISG";
    public static $APP_NAME = "ISGFW";
    private $phoneNumber;
    private $sms;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function __construct($phoneNumber, $otp) {
        $this->phoneNumber = SnsDTO::formatePhoneNumber($phoneNumber);
        $sms = $otp . " is your " . SnsDTO::$APP_NAME . " OTP.";
        $this->sms = $sms;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setSMS($sms) {
        $this->sms = $sms;
    }

    public function getSMS() {
        return $this->sms;
    }

    public static function formatePhoneNumber($phoneNumber) {
        if (StringUtil::startsWith($phoneNumber, "00")) {
            $len = strlen($phoneNumber);
            return "+" . substr($phoneNumber, 2, $len);
        } else if (!StringUtil::startsWith($phoneNumber, "+")) {
            return "+" . $phoneNumber;
        } else {
            return $phoneNumber;
        }
    }

}
