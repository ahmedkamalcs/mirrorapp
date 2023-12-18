<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

/**
 * Description of UserDTO
 *
 * @author Ahmed Kamal
 */
use App\Http\Controllers\api\v1\dto\UserOtpDTO;

class SignupStagingDTO  implements DTOInterface{

    private $id;
    private $email;
    private $mobileNo;
    private $businessType;
    private $otp;
    private $name;
    private $orgName;
    private $password;
    private $status;
    private $signupType;
    private $companyprofileselect;

    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMobileNo() {
        return $this->mobileNo;
    }

    public function getBusinessType() {
        return $this->businessType;
    }

    public function getName() {
        return $this->name;
    }

    public function getOrgName() {
        return $this->orgName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getSignupType() {
        return $this->signupType;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMobileNo($mobileNo) {
        $this->mobileNo = $mobileNo;
    }

    public function setBusinessType($businessType) {
        $this->businessType = $businessType;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setOrgName($orgName) {
        $this->orgName = $orgName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setSignupType($signupType) {
        $this->signupType = $signupType;
    }

    
    public function getOtp() {
        return $this->otp;
    }

    public function setOtp($otp) {
        $this->otp = $otp;
    }
 

    public function getMobileOrEmail(){
        if($this->email != null && $this->email != ''){
            return $this->email;
        }else{
            return $this->mobileNo;
        }
    }
    
    public function setMobileOrEmail($email, $mobile){
        $this->email = $email;
        $this->mobile = $mobile;
    }

    public function getCompanyprofileselect() {
        return $this->companyprofileselect;
    }

    public function setCompanyprofileselect($companyprofileselect) {
        $this->companyprofileselect = $companyprofileselect;
    }


}
