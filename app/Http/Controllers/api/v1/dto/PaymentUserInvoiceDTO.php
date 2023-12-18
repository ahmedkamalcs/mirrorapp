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
class PaymentUserInvoiceDTO implements DTOInterface {

    public function __construct($paymentPayeeId, $invoiceId) {
        $this->paymentPayeeId = $paymentPayeeId;
        $this->invoiceId = $invoiceId;
    }

    //put your code here

    private $id;
    private $currencyCode;
    private $payeeAmount;
    private $paymentPayeeId;
    private $invoiceId;
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

    public function setCurrencyCode($currencyCode) {
        $this->currencyCode = $currencyCode;
    }

    public function getCurrencyCode() {
        return $this->currencyCode;
    }

    public function setPayeeAmount($payeeAmount) {
        $this->payeeAmount = $payeeAmount;
    }

    public function getPayeeAmount() {
        return $this->payeeAmount;
    }

    public function setPaymentPayeeId($paymentPayeeId) {
        $this->paymentPayeeId = $paymentPayeeId;
    }

    public function getPaymentPayeeId() {
        return $this->paymentPayeeId;
    }

    public function setInvoiceId($invoiceId) {
        $this->invoiceId = $invoiceId;
    }

    public function getInvoiceId() {
        return $this->invoiceId;
    }

}
