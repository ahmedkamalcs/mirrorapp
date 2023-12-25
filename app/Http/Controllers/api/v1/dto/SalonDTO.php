<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationDTO
 *
 * @author Saad Aly
 */

namespace App\Http\Controllers\api\v1\dto;

use App\Http\Controllers\api\v1\util\StringUtil;

class SalonDTO implements DTOInterface {    
    private $userPhoneNo;
    private $salonLogo;
    private $salonGallery;
    private $apiCall = '1'; //API Calls Active by Default
    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }
        public function getDTOById($id) {
    }
    function setSalonLogo($logo){
        $this->salonLogo = $logo;
    }
    function getSalonLogo() {
        return $this->salonLogo;
    }
    function setSalonGallery($gallery){
        $this->salonGallery = $gallery;
    }
    function getSalonGallery() {
        return $this->salonGallery;
    }
    function setUserPhoneNo($userPhoneNo) {
        $this->userPhoneNo = $userPhoneNo;
    }
    function getUserPhoneNo() {
        return $this->userPhoneNo;
    }
}