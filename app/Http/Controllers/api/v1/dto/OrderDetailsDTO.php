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
class OrderDetailsDTO implements DTOInterface {

    //put your code here

    private $id;
    private $orderText;
    private $orderMasterId;
    private $itemVendorId;
    private $itemMasterId;
    private $basicPrice;
    private $grossPrice;
    private $taxIncluded;
    private $itemName;
    private $currencyCode;
    private $taxId;
    private $taxAmount; //Transaction Amount for Information only.
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setOrderText($orderText) {
        $this->orderText = $orderText;
    }

    public function getOrderText() {
        return $this->orderText;
    }

    public function setOrderMasterId($orderMasterId) {
        $this->orderMasterId = $orderMasterId;
    }

    public function getOrderMasterId() {
        return $this->orderMasterId;
    }

    public function setItemVendorId($itemVendorId) {
        $this->itemVendorId = $itemVendorId;
    }

    public function getItemVendorId() {
        return $this->itemVendorId;
    }

    public function setItemMasterId($itemMasterId) {
        $this->itemMasterId = $itemMasterId;
    }

    public function getItemMasterId() {
        return $this->itemMasterId;
    }

    public function setBasicPrice($basicPrice) {
        $this->basicPrice = $basicPrice;
    }

    public function getBasicPrice() {
        return $this->basicPrice;
    }

    public function setGrossPrice($grossPrice) {
        $this->grossPrice = $grossPrice;
    }

    public function getGrossPrice() {
        return $this->grossPrice;
    }

    public function setTaxIncluded($taxIncluded) {
        $this->taxIncluded = $taxIncluded;
    }

    public function getTaxIncluded() {
        return $this->taxIncluded;
    }

    public function setItemName($itemName) {
        $this->itemName = $itemName;
    }

    public function getItemName() {
        return $this->itemName;
    }

    public function setCurrencyCode($currencyCode) {
        $this->currencyCode = $currencyCode;
    }

    public function getCurrencyCode() {
        return $this->currencyCode;
    }

    public function setTaxId($taxId) {
        $this->taxId = $taxId;
    }

    public function getTaxId() {
        return $this->taxId;
    }

    public function setTaxAmount($taxAmount) {
        $this->taxAmount = $taxAmount;
    }

    public function getTaxAmount() {
        return $this->taxAmount;
    }

    public function getDTOById($id) {
        
    }

}
