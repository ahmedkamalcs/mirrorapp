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
class ServicePlanItemsDTO implements DTOInterface {

    //put your code here

    private $id;
    private $servicePlanId;
    private $serviceItemId;
        
    
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

    public function getServicePlanId() {
        return $this->servicePlanId;
    }

    public function getServiceItemId() {
        return $this->serviceItemId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setServicePlanId($servicePlanId) {
        $this->servicePlanId = $servicePlanId;
    }

    public function setServiceItemId($serviceItemId) {
        $this->serviceItemId = $serviceItemId;
    }


}
