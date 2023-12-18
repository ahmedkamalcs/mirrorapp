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
class ServiceItemDTO implements DTOInterface {

    //put your code here

    private $id;
    private $serviceName;
    private $serviceNameAr;
    private $servicePrice;
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

    public function getServiceName() {
        return $this->serviceName;
    }

    public function getServiceNameAr() {
        return $this->serviceNameAr;
    }

    public function getServicePrice() {
        return $this->servicePrice;
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

    public function setServiceName($serviceName) {
        $this->serviceName = $serviceName;
    }

    public function setServiceNameAr($serviceNameAr) {
        $this->serviceNameAr = $serviceNameAr;
    }

    public function setServicePrice($servicePrice) {
        $this->servicePrice = $servicePrice;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

}
