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
class VendorCommissionSetupDTO implements DTOInterface {

    //put your code here

    private $id;
    private $amount;
    private $percent;
    private $commissionType;
    private $vendorMasterId;
    private $type;
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
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setPercent($percent) {
        $this->percent = $percent;
    }

    public function getPercent() {
        return $this->percent;
    }

    public function setCommissionType($commissionType) {
        $this->commissionType = $commissionType;
    }

    public function getCommissionType() {
        return $this->commissionType;
    }

    public function setVendorMasterId($vendorMasterId) {
        $this->vendorMasterId = $vendorMasterId;
    }

    public function getVendorMasterId() {
        return $this->vendorMasterId;
    }

    /**
     * @return mixed
     */
    function getType() {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return VendorCommissionSetupDTO
     */
    function setType($type): self {
        $this->type = $type;
        return $this;
    }

}
