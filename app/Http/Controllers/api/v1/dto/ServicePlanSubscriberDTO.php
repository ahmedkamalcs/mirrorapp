<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

use App\Http\Controllers\api\v1\dto\AppDTO;

/**
 * Description of PaymentProviderConfigDTO
 *
 * @author Ahmed Kamal
 */
class ServicePlanSubscriberDTO implements DTOInterface {

    //put your code here

    private $id;
    private $planId;
    private $subscriberId;
    private $activeFrom;
    private $activeTo;
    private $isActive;
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

    public function getPlanId() {
        return $this->planId;
    }

    public function getSubscriberId() {
        return $this->subscriberId;
    }

    public function getActiveFrom() {
        return $this->activeFrom;
    }

    public function getActiveTo() {
        return $this->activeTo;
    }

    public function getIsActive() {
        return $this->isAvtive;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPlanId($planId) {
        $this->planId = $planId;
    }

    public function setSubscriberId($subscriberId) {
        $this->subscriberId = $subscriberId;
    }

    public function setActiveFrom($activeFrom) {
        $this->activeFrom = $activeFrom;
    }

    public function setActiveTo($activeTo) {
        $this->activeTo = $activeTo;
    }

    public function setIsActive($isAvtive) {
        $this->isAvtive = $isAvtive;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }


}
