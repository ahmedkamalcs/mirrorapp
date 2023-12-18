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
class ServiceSubscriberDTO implements DTOInterface {

    //put your code here

    private $id;
    private $subscriberName;
    private $emailId;
    private $tellNo;
    private $userId;
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

    public function getSubscriberName() {
        return $this->subscriberName;
    }

    public function getEmailId() {
        return $this->emailId;
    }

    public function getTellNo() {
        return $this->tellNo;
    }

    public function getUserId() {
        return $this->userId;
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

    public function setSubscriberName($subscriberName) {
        $this->subscriberName = $subscriberName;
    }

    public function setEmailId($emailId) {
        $this->emailId = $emailId;
    }

    public function setTellNo($tellNo) {
        $this->tellNo = $tellNo;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }


}
