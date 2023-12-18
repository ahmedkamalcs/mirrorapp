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

class EInvoiceLineDTO implements DTOInterface {

    private $id;
    private $einvoiceHeaderId;
    private $itemName;
    private $unitPrice;
    private $quantity;
    private $taxableAmount;
    private $discount;
    private $taxRate;
    private $taxAmount;
    private $subtotalIncludingVAT;
    private $curency;
    private $grossAmount;
    private $amountAfterDiscount;
    private $itemId; //Transient
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

    public function getEinvoiceHeaderId() {
        return $this->einvoiceHeaderId;
    }

    public function getItemName() {
        return $this->itemName;
    }

    public function getUnitPrice() {
        return $this->unitPrice;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getTaxableAmount() {
        return $this->taxableAmount;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getTaxRate() {
        return $this->taxRate;
    }

    public function getTaxAmount() {
        return $this->taxAmount;
    }

    public function getSubtotalIncludingVAT() {
        return $this->subtotalIncludingVAT;
    }

    public function getCurency() {
        return $this->curency;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setEinvoiceHeaderId($einvoiceHeaderId) {
        $this->einvoiceHeaderId = $einvoiceHeaderId;
        return $this;
    }

    public function setItemName($itemName) {
        $this->itemName = $itemName;
        return $this;
    }

    public function setUnitPrice($unitPrice) {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function setTaxableAmount($taxableAmount) {
        $this->taxableAmount = $taxableAmount;
        return $this;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
        return $this;
    }

    public function setTaxRate($taxRate) {
        $this->taxRate = $taxRate;
        return $this;
    }

    public function setTaxAmount($taxAmount) {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    public function setSubtotalIncludingVAT($subtotalIncludingVAT) {
        $this->subtotalIncludingVAT = $subtotalIncludingVAT;
        return $this;
    }

    public function setCurency($curency) {
        $this->curency = $curency;
        return $this;
    }

    public function getItemId() {
        return $this->itemId;
    }

    public function setItemId($itemId) {
        $this->itemId = $itemId;
        return $this;
    }

    public function getDTOById($id) {
        
    }

    public function getGrossAmount() {
        return $this->grossAmount;
    }

    public function setGrossAmount($grossAmount) {
        $this->grossAmount = $grossAmount;
        return $this;
    }

    public function getAmountAfterDiscount() {
        return $this->amountAfterDiscount;
    }

    public function setAmountAfterDiscount($amountAfterDiscount) {
        $this->amountAfterDiscount = $amountAfterDiscount;
        return $this;
    }

}
