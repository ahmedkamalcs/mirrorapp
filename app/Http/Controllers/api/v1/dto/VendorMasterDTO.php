<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 *
 * @author Ahmed Kamal
 */

namespace App\Http\Controllers\api\v1\dto;

class VendorMasterDTO implements DTOInterface {

    private $id;
    private $name;
    private $telNo;
    private $location;
    private $vatCertificate;
    private $crLicense;
    private $bankAccountIBAN;
    private $conactDetails;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setId($id) {
        return $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setTelNo($telNo) {
        $this->telNo = $telNo;
    }

    public function getTelNo() {
        return $this->telNo;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getVatCertificate() {
        return $this->vatCertificate;
    }

    public function getCrLicense() {
        return $this->crLicense;
    }

    public function getBankAccountIBAN() {
        return $this->bankAccountIBAN;
    }

    public function getConactDetails() {
        return $this->conactDetails;
    }

    public function setVatCertificate($vatCertificate) {
        $this->vatCertificate = $vatCertificate;
        return $this;
    }

    public function setCrLicense($crLicense) {
        $this->crLicense = $crLicense;
        return $this;
    }

    public function setBankAccountIBAN($bankAccountIBAN) {
        $this->bankAccountIBAN = $bankAccountIBAN;
        return $this;
    }

    public function setConactDetails($conactDetails) {
        $this->conactDetails = $conactDetails;
        return $this;
    }

}
