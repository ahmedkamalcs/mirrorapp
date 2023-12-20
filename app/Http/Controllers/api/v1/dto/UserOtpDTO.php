<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

/**
 * Description of PaymentProviderConfigDTO
 *
 * @author Ahmed Kamal
 */
class UserOtpDTO implements DTOInterface {

    //put your code here

    private $id;
    private $phoneNumber;
    private $otp;
    private $apiCall = '1'; //API Calls Active by Default
    private $email;
    private $otpSent;
    private $fullName;
    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getFullName() {
        return $this->fullName;
    }
    public function setPhoneNumber($phoneNumeber) {
        $this->phoneNumber = SnsDTO::formatePhoneNumber($phoneNumeber);
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setOTP($otp) {
        $this->otp = $otp;
    }

    public function getOTP() {
        return $this->otp;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }


    public function getOtpSent() {
        return $this->otpSent;
    }

    public function setOtpSent($otpSent) {
        $this->otpSent = $otpSent;
    }


}
