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

class PaymentPayeeDTO implements DTOInterface {

    private $id;
    private $payeeName;
    private $userId;
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

    public function setPayeeName($payeeName) {
        $this->payeeName = $payeeName;
    }

    public function getPayeeName() {
        return $this->payeeName;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUserId() {
        return $this->userId;
    }

}
