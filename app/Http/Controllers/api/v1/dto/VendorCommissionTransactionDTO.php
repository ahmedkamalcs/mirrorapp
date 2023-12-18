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
class VendorCommissionTransactionDTO implements DTOInterface {

    //put your code here

    private $id;
    private $vendoMasterId;
    private $vendorCommissionSetupId;
    private $orderDetailsId;
    private $grossAmount;
    private $netAmount;
    private $orderMasterId;
    private $orderDetailsNetAmount;
    private $orderDGrossAmount;
    private $commissionPercent;
    private $commissionFixedAmount;
    private $einvoiceId;
    private $type;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setOrderDGrossAmount($orderDGrossAmount) {
        $this->orderDGrossAmount = $orderDGrossAmount;
    }

    public function getOrderDGrossAmount() {
        return $this->orderDGrossAmount;
    }

    public function setOrderMasterId($orderMasterId) {
        $this->orderMasterId = $orderMasterId;
    }

    public function getOrderMasterId() {
        return $this->orderMasterId;
    }

    public function setOrderDetailsNetAmount($orderDetailsNetAmount) {
        $this->orderDetailsNetAmount = $orderDetailsNetAmount;
    }

    public function getOrderDetailsNetAmount() {
        return $this->orderDetailsNetAmount;
    }

    public function setCommissionPercent($commissionPercent) {
        $this->commissionPercent = $commissionPercent == null || $commissionPercent == '' ? 0 : $commissionPercent;
    }

    public function getCommissionPercent() {
        return $this->commissionPercent;
    }

    public function setCommissionFixedAmount($commissionFixedAmount) {
        $this->commissionFixedAmount = $commissionFixedAmount == null || $commissionFixedAmount == '' ? 0 : $commissionFixedAmount;
    }

    public function getCommissionFixedAmount() {
        return $this->commissionFixedAmount;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setVendorMasterId($vendorMasterId) {
        $this->vendoMasterId = $vendorMasterId;
    }

    public function getVendorMasterId() {
        return $this->vendoMasterId;
    }

    public function setVendorCommissionSetupId($vendorCommissionSetupId) {
        $this->vendorCommissionSetupId = $vendorCommissionSetupId;
    }

    public function getVendorCommisionSetupId() {
        return $this->vendorCommissionSetupId;
    }

    public function setOrderDetailsId($orderDetailsId) {
        $this->orderDetailsId = $orderDetailsId;
    }

    public function getOrderDetailsId() {
        return $this->orderDetailsId;
    }

    public function setGrossAmount($grossAmount) {
        $this->grossAmount = $grossAmount;
    }

    public function getGrossAmount() {
        return $this->grossAmount;
    }

    public function setNetAmount($netAmount) {
        $this->netAmount = $netAmount;
    }

    public function getNetAmount() {
        return $this->netAmount;
    }

    /**
     * @return mixed
     */
    function getEinvoiceId() {
        return $this->einvoiceId;
    }

    /**
     * @param mixed $einvoiceId
     * @return VendorCommissionTransactionDTO
     */
    function setEinvoiceId($einvoiceId): self {
        $this->einvoiceId = $einvoiceId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getType() {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return VendorCommissionTransactionDTO
     */
    function setType($type): self {
        $this->type = $type;
        return $this;
    }

}
