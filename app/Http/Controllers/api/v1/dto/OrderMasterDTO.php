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
class OrderMasterDTO implements DTOInterface {

    //put your code here

    private $id;
    private $orderNo;
    private $orderText;
    private $totalNetPrice;
    private $totalGrossPrice;
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

    public function setOrderNo($orderNo) {
        $this->orderNo = $orderNo;
    }

    public function getOrderNo() {
        return $this->orderNo;
    }

    public function setOrderText($orderText) {
        $this->orderText = $orderText;
    }

    public function getOrderText() {
        return $this->orderText;
    }

    public function setTotalNetPrice($totalNetPrice) {
        $this->totalNetPrice = $totalNetPrice;
    }

    public function getTotalNetPrice() {
        return $this->totalNetPrice;
    }

    public function setTotalGrossPrice($totalGrossPrice) {
        $this->totalGrossPrice = $totalGrossPrice;
    }

    public function getTotalGrossPrice() {
        return $this->totalGrossPrice;
    }

}
