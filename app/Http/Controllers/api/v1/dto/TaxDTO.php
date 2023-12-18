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
class TaxDTO implements DTOInterface {

    //put your code here

    private $id;
    private $amount;
    private $createdAt;
    private $updatedAt;
    private $isActive;
    private $taxType;
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

    public function setActive($isActive) {
        $this->isActive = $isActive;
    }

    public function isActive() {
        return $this->isActive;
    }

    public function setTaxType($taxType) {
        $this->taxType = $taxType;
    }

    public function getTaxType() {
        return $this->taxType;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

}
