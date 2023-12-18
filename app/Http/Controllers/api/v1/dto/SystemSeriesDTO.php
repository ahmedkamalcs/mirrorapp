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
class SystemSeriesDTO implements DTOInterface {

    //put your code here

    private $id;
    private $seriesName;
    private $lastNumber;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setLastNumber($lastNumber) {
        $this->lastNumber = $lastNumber;
    }

    public function getLastNumber() {
        return $this->lastNumber;
    }

    public function setSeriesName($seriesName) {
        $this->seriesName = $seriesName;
    }

    public function getSeriesName() {
        return $this->seriesName;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

}
