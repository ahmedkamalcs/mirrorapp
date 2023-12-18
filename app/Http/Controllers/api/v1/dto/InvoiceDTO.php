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
class InvoiceDTO implements DTOInterface {

    //put your code here

    private $id;
    private $invoiceHeader;
    private $invoiceText;
    private $invoiceAmount;
    private $invoiceType;
    private $invoiceStatus;
    private $userId;
    private $taxPercent;
    private $grossAmount;
    private $orderNo;
    private $orderMasterId;
    private $orderDetailsId;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function setInvoiceStatus($invoiceStatus) {
        $this->invoiceStatus = $invoiceStatus;
    }

    public function getInvoiceStatus() {
        if ($this->invoiceStatus == null || $this->invoiceStatus == '') {
            return AppDTO::$INVOICE_STATUS_NOT_PAID;
        }
        return $this->invoiceStatus;
    }

    public function setInvoiceType($invoiceType) {
        $this->invoiceType = $invoiceType;
    }

    public function getInvoiceType() {
        if ($this->invoiceType == null || $this->invoiceType == '') {
            return AppDTO::$INVOICE_TYPE_PAID;
        }
        return $this->invoiceType;
    }

    public function setInvoiceText($invoiceText) {
        $this->invoiceText = $invoiceText;
    }

    public function getInvoiceText() {
        return $this->invoiceText;
    }

    public function setOrderDetailsId($orderDetailsId) {
        $this->orderDetailsId = $orderDetailsId;
    }

    public function getOrderDetailsId() {
        return $this->orderDetailsId;
    }

    public function setOrderMasterId($orderMasterId) {
        $this->orderMasterId = $orderMasterId;
    }

    public function getOrderMasterId() {
        return $this->orderMasterId;
    }

    public function setOrderNo($orderNo) {
        $this->orderNo = $orderNo;
    }

    public function getOrderNo() {
        return $this->orderNo;
    }

    public function setTaxPercent($taxPercent) {
        $this->taxPercent = $taxPercent;
    }

    public function getTaxPercent() {
        return $this->taxPercent;
    }

    public function setGrossAmount($grossAmount) {
        $this->grossAmount = $grossAmount;
    }

    public function getGrossAmount() {
        return $this->grossAmount;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setInvoiceHeader($invoiceHeader) {
        $this->invoiceHeader = $invoiceHeader;
    }

    public function getInvoiceHeader() {
        return $this->invoiceHeader;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setInvoiceAmount($invoiceAmount) {
        $this->invoiceAmount = $invoiceAmount;
    }

    public function getInvoiceAmount() {
        return $this->invoiceAmount;
    }

    public function getDTOById($id) {
        
    }

}
