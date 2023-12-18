<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

use App\Models\api\v1\vendor\VendorMasterModel;
use App\Models\api\v1\vendor\ItemMasterModel;

/**
 * Description of PaymentProviderConfigDTO
 *
 * @author Ahmed Kamal
 */
class ItemVendorDTO implements DTOInterface {

    //put your code here

    private $id;
    private $vendorMasterId;
    private $itemMasterId;
    private $basicPrice;
    private $grossPrice;
    private $taxIncluded;
    private $taxId;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function setTaxId($taxId) {
        $this->taxId = $taxId;
    }

    public function getTaxId() {
        return $this->taxId;
    }

    public function setTaxIncluded($taxIncluded) {
        $this->taxIncluded = $taxIncluded;
    }

    public function getTaxIncluded() {
        return $this->taxIncluded;
    }

    public function setBasicPrice($basicPrice) {
        $this->basicPrice = $basicPrice;
    }

    public function getBasicPrice() {
        return $this->basicPrice;
    }

    public function setItemMasterId($itemMasterId) {
        $this->itemMasterId = $itemMasterId;
    }

    public function getItemMasterId() {
        return $this->itemMasterId;
    }

    public function setVendorMasterId($vendorMasterId) {
        $this->vendorMasterId = $vendorMasterId;
    }

    public function getVendorMasterId() {
        return $this->vendorMasterId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getGrossPrice() {
        return $this->grossPrice;
    }

    public function setGrossPrice($grossPrice) {
        $this->grossPrice = $grossPrice;
        return $this;
    }

    public function listVendorForSelectItems() {
        $vendorMasterModel = new VendorMasterModel();
        return $vendorMasterModel->listVendorForSelectItems();
    }

    public function listItemForSelectItems() {
        $itemMasterModel = new ItemMasterModel();
        return $itemMasterModel->listItemForSelectItems();
    }

    public function getDTOById($id) {
        
    }

}
