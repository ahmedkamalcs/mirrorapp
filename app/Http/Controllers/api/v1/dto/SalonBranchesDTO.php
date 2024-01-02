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

class SalonBranchesDTO implements DTOInterface {    
    private $branchId;
    private $salonId;
    private $branchAddress;
    private $branchLongtitude;
    private $branchLatitude;
    private $apiCall = '1'; //API Calls Active by Default
    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }
        public function getDTOById($id) {
    }
public function setSalonId($salonId) {
    $this->salonId = $salonId;
}
public function getSalonId() {
    return $this->salonId;
}
public function setBranchAddress($branchAddress) {
    $this->branchAddress = $branchAddress;
}
public function getBranchAddress() {
    return $this->branchAddress;
}
public function setBranchLongtitude($branchLongtitude) {
    $this->branchLongtitude =$branchLongtitude;
}
public function getBranchLongtitude() {
    return $this->branchLongtitude;
}
public function setBranchLatitude($branchLatitude) {
    $this->branchLatitude=$branchLatitude;
}
public function getBranchLatutude(){
    return $this->branchLatitude;
}
public function setBranchId( $branchId) {
    $this->branchId = $branchId;
}
public function getBranchId() {
    return $this->branchId;
}
}