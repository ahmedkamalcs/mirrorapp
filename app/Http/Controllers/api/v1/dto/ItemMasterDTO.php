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
class ItemMasterDTO implements DTOInterface {

    //put your code here

    private $id;
    private $itemName;
    private $itemMasterId;
    private $price;
    private $taxIncluded;
    private $itemDescription;
    private $taxId;
    private $currencyCode;
    private $itemType;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function setItemDescription($itemDescription) {
        $this->itemDescription = $itemDescription;
    }

    public function getItemDescription() {
        return $this->itemDescription;
    }

    public function setTaxIncluded($taxIncluded) {
        $this->taxIncluded = $taxIncluded;
    }

    public function getTaxIncluded() {
        return $this->taxIncluded;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setItemMasterId($itemMasterId) {
        $this->itemMasterId = $itemMasterId;
    }

    public function getItemMasterId() {
        return $this->itemMasterId;
    }

    public function setItemName($itemName) {
        $this->itemName = $itemName;
    }

    public function getItemName() {
        return $this->itemName;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setTaxId($taxId) {
        $this->taxId = $taxId;
    }

    public function getTaxId() {
        return $this->taxId;
    }

    public function getCurrencyCode() {
        return $this->currencyCode;
    }

    public function setCurrencyCode($currencyCode) {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    public function getItemType() {
        return $this->itemType;
    }

    public function setItemType($itemType) {
        $this->itemType = $itemType;
        return $this;
    }

    public function getDTOById($id) {
        
    }

}
