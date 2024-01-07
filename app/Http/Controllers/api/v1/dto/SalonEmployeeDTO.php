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

class SalonEmployeeDTO implements DTOInterface {    
    private $employeeId;
    private $salonId;
    private $employeePhoneNo;
    private $employeeName;
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

public function setEmployeehId( $employeeId) {
    $this->employeeId = $employeeId;
}
public function getEmployeehId() {
    return $this->employeeId;
}
public function setEmployeePhoneNo($employeePhoneNo) {
    $this->employeePhoneNo = $employeePhoneNo;
}
public function getEmployeePhoneNo() {
    return $this->employeePhoneNo;
}
public function setEmployeeName($employeeName) {
    $this->employeeName = $employeeName;
}
public function getEmployeeName() {
    return $this->employeeName;
}

}