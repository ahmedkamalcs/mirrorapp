<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\subscription\bo\BServicePlan;

/**
 * Description of PaymentProviderConfigDTO
 *
 * @author Ahmed Kamal
 */
class ServicePlanDTO implements DTOInterface {

    //put your code here

    private $id;
    private $planName;
    private $planNameAr;
    private $isActive;
    private $totalPrice;
    private $createdAt;
    private $updatedAt;
    private $servicePlanArr;
    
    
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

    public function getPlanName() {
        return $this->planName;
    }

    public function getPlanNameAr() {
        return $this->planNameAr;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
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

    public function setPlanName($planName) {
        $this->planName = $planName;
        return $this;
    }

    public function setPlanNameAr($planNameAr) {
        $this->planNameAr = $planNameAr;
        return $this;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
        return $this;
    }

    public function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
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

    public function listServicePlan(){
        $bSericePlan = new BServicePlan();
        $this->servicePlanArr = $bSericePlan->listServicePlans($this);
    }
    
    public function getServicePlanArr(){
        return $this->servicePlanArr;
    }
    

}
