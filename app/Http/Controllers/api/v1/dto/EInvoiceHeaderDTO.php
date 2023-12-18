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

class EInvoiceHeaderDTO implements DTOInterface {

    private $id;
    private $invoiceId;
    private $headerInvoiceNumber;
    private $headerIssueDate;
    private $headerDateOfSupply;
    private $sellerName;
    private $sellerBuildingNo;
    private $sellerStreetName;
    private $sellerDistrict;
    private $sellerCity;
    private $sellerCountry;
    private $sellerPostalCode;
    private $sellerAdditionalNo;
    private $sellerVatNumber;
    private $sellerOtherSellerId;
    private $createdAt;
    private $updatedAt;
    private $eInvoiceLineDTOArr;
    private $totalWithoutTax = 0.0;
    private $totalWithTax = 0.0;
    private $totalDiscount = 0;
    private $totalVAT = 0.0; //LIKE Vat Amount
    private $totalAmountDue = 0.0;
    private $currency;
    //B2C Invoice Header.
    private $vatRate;
    private $orderNo;
    private $companyName;
    private $supplierName;
    private $supplierAddress;
    private $transType;
    private $otherFees = 0.0;
    private $supplierVATNO;
    private $invoiceURL;
    private $invoiceNumber; //Transient
    private $companyVatNo;
    private $einvoiceType;
    private $einvoiceStatus;
    //Used at payEInvoice API.
    private $paymentVendormasterId;
    //Vendor Master Id for Commisstion Setup and Transaction.
    //EInvoice Specific
    private $commissionVendorMasterId;
    //QR COde.
    private $qrCode;
    //Enhancements
    private $customerName;
    private $customerAddress;
    private $customerVatNo;
    private $einvoiceLineArr;
    
    private $vatNo;
     
    
    private $apiCall = '1'; //API Calls Active by Default
    
    private $creditNote;

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getId() {
        return $this->id;
    }

    public function getInvoiceId() {
        return $this->invoiceId;
    }

    public function getHeaderInvoiceNumber() {
        return $this->headerInvoiceNumber;
    }

    public function getHeaderIssueDate() {
        return $this->headerIssueDate;
    }

    public function getHeaderDateOfSupply() {
        return $this->headerDateOfSupply;
    }

    public function getSellerName() {
        return $this->sellerName;
    }

    public function getSellerBuildingNo() {
        return $this->sellerBuildingNo;
    }

    public function getSellerStreetName() {
        return $this->sellerStreetName;
    }

    public function getSellerDistrict() {
        return $this->sellerDistrict;
    }

    public function getSellerCity() {
        return $this->sellerCity;
    }

    public function getSellerCountry() {
        return $this->sellerCountry;
    }

    public function getSellerPostalCode() {
        return $this->sellerPostalCode;
    }

    public function getSellerAdditionalNo() {
        return $this->sellerAdditionalNo;
    }

    public function getSellerVatNumber() {
        return $this->sellerVatNumber;
    }

    public function getSellerOtherSellerId() {
        return $this->sellerOtherSellerId;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setInvoiceId($invoiceId) {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    public function setHeaderInvoiceNumber($headerInvoiceNumber) {
        $this->headerInvoiceNumber = $headerInvoiceNumber;
        return $this;
    }

    public function setHeaderIssueDate($headerIssueDate) {
        $this->headerIssueDate = $headerIssueDate;
        return $this;
    }

    public function setHeaderDateOfSupply($headerDateOfSupply) {
        $this->headerDateOfSupply = $headerDateOfSupply;
        return $this;
    }

    public function setSellerName($sellerName) {
        $this->sellerName = $sellerName;
        return $this;
    }

    public function setSellerBuildingNo($sellerBuildingNo) {
        $this->sellerBuildingNo = $sellerBuildingNo;
        return $this;
    }

    public function setSellerStreetName($sellerStreetName) {
        $this->sellerStreetName = $sellerStreetName;
        return $this;
    }

    public function setSellerDistrict($sellerDistrict) {
        $this->sellerDistrict = $sellerDistrict;
        return $this;
    }

    public function setSellerCity($sellerCity) {
        $this->sellerCity = $sellerCity;
        return $this;
    }

    public function setSellerCountry($sellerCountry) {
        $this->sellerCountry = $sellerCountry;
        return $this;
    }

    public function setSellerPostalCode($sellerPostalCode) {
        $this->sellerPostalCode = $sellerPostalCode;
        return $this;
    }

    public function setSellerAdditionalNo($sellerAdditionalNo) {
        $this->sellerAdditionalNo = $sellerAdditionalNo;
        return $this;
    }

    public function setSellerVatNumber($sellerVatNumber) {
        $this->sellerVatNumber = $sellerVatNumber;
        return $this;
    }

    public function setSellerOtherSellerId($sellerOtherSellerId) {
        $this->sellerOtherSellerId = $sellerOtherSellerId;
        return $this;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getQrCode() {
        return $this->qrCode;
    }

    public function setQrCode($qrCode) {
        $this->qrCode = $qrCode;
        return $this;
    }

    public function getEInvoiceLineDTOArr() {
        return $this->eInvoiceLineDTOArr;
    }

    public function setEInvoiceLineDTOArr($eInvoiceLineDTOArr) {
        $this->eInvoiceLineDTOArr = $eInvoiceLineDTOArr;
//        $this->calculateTotals(); Calculated and Saved at Header table during data entry.
        return $this;
    }

    public function getTotalWithoutTax() {
        return $this->totalWithoutTax;
    }

    public function getTotalWithTax() {
        return $this->totalWithTax;
    }

    public function getTotalDiscount() {
        return $this->totalDiscount;
    }

    public function getTotalVAT() {
        return $this->totalVAT;
    }

    public function getTotalAmountDue() {
        return $this->totalAmountDue;
    }

    public function setTotalWithoutTax($totalWithoutTax) {
        $this->totalWithoutTax = $totalWithoutTax;
        return $this;
    }

    public function setTotalWithTax($totalWithTax) {
        $this->totalWithTax = $totalWithTax;
        return $this;
    }

    public function setTotalDiscount($totalDiscount) {
        $this->totalDiscount = $totalDiscount;
        return $this;
    }

    public function setTotalVAT($totalVAT) {
        $this->totalVAT = $totalVAT;
        return $this;
    }

    public function setTotalAmountDue($totalAmountDue) {
        $this->totalAmountDue = $totalAmountDue;
        return $this;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

    public function calculateTotals() {
        $this->totalWithoutTax = 0;
        $this->totalVAT = 0;
        $this->totalDiscount = 0;
        $this->totalAmountDue = 0;

        //Calculate Total Excluding VAT. //Taxable Amount. Total.
        if ($this->eInvoiceLineDTOArr != null) {
            foreach ($this->eInvoiceLineDTOArr as $invoiceLine) {
                $this->totalWithoutTax += ($invoiceLine->unit_price * $invoiceLine->quantity);
//                $this->totalWithTax += $invoiceLine->unit_price  + ( $invoiceLine->unit_price * ($invoiceLine->tax_rate/100) );
//                $this->totalVAT += ( $invoiceLine->unit_price * ($invoiceLine->tax_rate/100) );
                $this->totalVAT += ( $invoiceLine->unit_price * $invoiceLine->quantity * ($invoiceLine->tax_rate / 100) );
                $this->currency = $invoiceLine->currency;
                //TODO Discount Model.
                $this->totalDiscount += $invoiceLine->discount; //Like Amount
            }

            // ($invoiceLine->discount/100) ;
            $this->totalAmountDue += $this->totalWithoutTax + $this->totalVAT - $this->totalDiscount;
        }
    }

    public function getVatRate() {
        return $this->vatRate;
    }

    public function setVatRate($vatRate) {
        $this->vatRate = $vatRate;
        return $this;
    }

    public function getOrderNo() {
        return $this->orderNo;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getSupplierName() {
        return $this->supplierName;
    }

    public function getSupplierAddress() {
        return $this->supplierAddress;
    }

    public function getTransType() {
        return $this->transType;
    }

    public function getOtherFees() {
        return $this->otherFees;
    }

    public function setOrderNo($orderNo) {
        $this->orderNo = $orderNo;
        return $this;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
        return $this;
    }

    public function setSupplierName($supplierName) {
        $this->supplierName = $supplierName;
        return $this;
    }

    public function setSupplierAddress($supplierAddress) {
        $this->supplierAddress = $supplierAddress;
        return $this;
    }

    public function setTransType($transType) {
        $this->transType = $transType;
        return $this;
    }

    public function setOtherFees($otherFees) {
        $this->otherFees = $otherFees;
        return $this;
    }

    public function getSupplierVATNO() {
        return $this->supplierVATNO;
    }

    public function setSupplierVATNO($supplierVATNO) {
        $this->supplierVATNO = $supplierVATNO;
        return $this;
    }

    public function getInvoiceURL() {
        return $this->invoiceURL;
    }

    public function setInvoiceURL($invoiceURL) {
        $this->invoiceURL = $invoiceURL;
        return $this;
    }

    public function getInvoiceNumber() {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber($invoiceNumber) {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function getCompanyVatNo() {
        return $this->companyVatNo;
    }

    public function setCompanyVatNo($companyVatNo) {
        $this->companyVatNo = $companyVatNo;
        return $this;
    }

    public function getEinvoiceType() {
        return $this->einvoiceType;
    }

    public function setEinvoiceType($einvoiceType) {
        $this->einvoiceType = $einvoiceType;
        return $this;
    }

    /**
     * @return mixed
     */
    function getEinvoiceStatus() {
        return $this->einvoiceStatus;
    }

    /**
     * @param mixed $einvoiceStatus
     * @return EInvoiceHeaderDTO
     */
    function setEinvoiceStatus($einvoiceStatus): self {
        $this->einvoiceStatus = $einvoiceStatus;
        return $this;
    }

    /**
     * @return mixed
     */
    function getPaymentVendormasterId() {
        return $this->paymentVendormasterId;
    }

    /**
     * @param mixed $paymentVendormasterId
     * @return EInvoiceHeaderDTO
     */
    function setPaymentVendormasterId($paymentVendormasterId): self {
        $this->paymentVendormasterId = $paymentVendormasterId;
        return $this;
    }

    /**
     * @return mixed
     */
    function getCommissionVendorMasterId() {
        return $this->commissionVendorMasterId;
    }

    /**
     * @param mixed $commissionVendorMasterId
     * @return EInvoiceHeaderDTO
     */
    function setCommissionVendorMasterId($commissionVendorMasterId): self {
        $this->commissionVendorMasterId = $commissionVendorMasterId;
        return $this;
    }

    public function getDTOById($id) {
        
    }

    public function getCustomerName() {
        return $this->customerName;
    }

    public function getCustomerVatNo() {
        return $this->customerVatNo;
    }

    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }

    public function setCustomerVatNo($customerVatNo) {
        $this->customerVatNo = $customerVatNo;
    }

    public function getCustomerAddress() {
        return $this->customerAddress;
    }

    public function setCustomerAddress($customerAddress) {
        $this->customerAddress = $customerAddress;
    }
    
    public function getEinvoiceLineArr() {
        return $this->einvoiceLineArr;
    }

    public function setEinvoiceLineArr($einvoiceLineArr) {
        $this->einvoiceLineArr = $einvoiceLineArr;
    }
    
    public function getVatNo() {
        return $this->vatNo;
    }

    public function setVatNo($vatNo) {
        $this->vatNo = $vatNo;
        return $this;
    }

    public function getCreditNote() {
        return $this->creditNote;
    }

    public function setCreditNote($creditNote) {
        $this->creditNote = $creditNote;
        return $this;
    }

    

}
