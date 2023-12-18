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
class RootAccountDTO implements DTOInterface{
    
    private $id;
    private $companyName;
    private $rootAccountCode;
    private $companyCode;
    private $createdAt;
    private $updatedAt;
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

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getRootAccountCode() {
        return $this->rootAccountCode;
    }

    public function getCompanyCode() {
        return $this->companyCode;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
        return $this;
    }

    public function setRootAccountCode($rootAccountCode) {
        $this->rootAccountCode = $rootAccountCode;
        return $this;
    }

    public function setCompanyCode($companyCode) {
        $this->companyCode = $companyCode;
        return $this;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }


}
