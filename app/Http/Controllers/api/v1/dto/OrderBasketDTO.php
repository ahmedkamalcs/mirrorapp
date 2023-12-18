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
class OrderBasketDTO implements DTOInterface {

    //put your code here

    private $id;
    private $name;
    private $deleted;
    private $itemVendorId;
    private $userId;
    //Transient. Basket TO Order.
    private $orderText;
    private $totalNetPrice;
    private $totalGrossPrice;
    private $status;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDeleted() {
        return $this->deleted;
    }

    public function getItemVendorId() {
        return $this->itemVendorId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setDeleted($deleted) {
        $this->deleted = $deleted;
        return $this;
    }

    public function setItemVendorId($itemVendorId) {
        $this->itemVendorId = $itemVendorId;
        return $this;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
        return $this;
    }

    public function getOrderText() {
        return $this->orderText;
    }

    public function getTotalNetPrice() {
        return $this->totalNetPrice;
    }

    public function getTotalGrossPrice() {
        return $this->totalGrossPrice;
    }

    public function setOrderText($orderText) {
        $this->orderText = $orderText;
        return $this;
    }

    public function setTotalNetPrice($totalNetPrice) {
        $this->totalNetPrice = $totalNetPrice;
        return $this;
    }

    public function setTotalGrossPrice($totalGrossPrice) {
        $this->totalGrossPrice = $totalGrossPrice;
        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function getDTOById($id) {
        
    }

}
