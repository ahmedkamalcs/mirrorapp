<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

/**
 * Description of UserDTO
 *
 * @author Ahmed Kamal
 */
use App\Http\Controllers\api\v1\dto\UserOtpDTO;
class CompanyProfileDTO implements DTOInterface{

    private $id;
    private $companyName;
    private $active;
    private $companyCode;

    private $businessName;
    private $emailId;
    private $contactName;
    private $contactNumber;
    private $country;
    private $city;
    private $crNumber;
    private $crUpload;
    private $vatNumber;
    private $vatCertificateUpload;
    private $businessLogoUpload;
    private $bankName;
    private $bankAccountNumber;
    private $iban;
    
    private $vatRate;
    private $currency;
    
    private $apiCall = '1';//API Calls Active by Default

    public function getId() {
        return $this->id;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getActive() {
        return $this->active;
    }

    public function getCompanyCode() {
        return $this->companyCode;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
        return $this;
    }

    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

    public function setCompanyCode($companyCode) {
        $this->companyCode = $companyCode;
        return $this;
    }


    public function getBusinessName() {
        return $this->businessName;
    }

    public function getEmailId() {
        return $this->emailId;
    }

    public function getContactName() {
        return $this->contactName;
    }

    public function getContactNumber() {
        return $this->contactNumber;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCrNumber() {
        return $this->crNumber;
    }

    public function getCrUpload() {
        return $this->crUpload;
    }

    public function getVatNumber() {
        return $this->vatNumber;
    }

    public function getVatCertificateUpload() {
        return $this->vatCertificateUpload;
    }

    public function getBusinessLogoUpload() {
        return $this->businessLogoUpload;
    }

    public function getBankName() {
        return $this->bankName;
    }

    public function getBankAccountNumber() {
        return $this->bankAccountNumber;
    }

    public function getIban() {
        return $this->iban;
    }

    public function setBusinessName($businessName) {
        $this->businessName = $businessName;
        return $this;
    }

    public function setEmailId($emailId) {
        $this->emailId = $emailId;
        return $this;
    }

    public function setContactName($contactName) {
        $this->contactName = $contactName;
        return $this;
    }

    public function setContactNumber($contactNumber) {
        $this->contactNumber = $contactNumber;
        return $this;
    }

    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function setCrNumber($crNumber) {
        $this->crNumber = $crNumber;
        return $this;
    }

    public function setCrUpload($crUpload) {
        $this->crUpload = $crUpload;
        return $this;
    }

    public function setVatNumber($vatNumber) {
        $this->vatNumber = $vatNumber;
        return $this;
    }

    public function setVatCertificateUpload($vatCertificateUpload) {
        $this->vatCertificateUpload = $vatCertificateUpload;
        return $this;
    }

    public function setBusinessLogoUpload($businessLogoUpload) {
        $this->businessLogoUpload = $businessLogoUpload;
        return $this;
    }

    public function setBankName($bankName) {
        $this->bankName = $bankName;
        return $this;
    }

    public function setBankAccountNumber($bankAccountNumber) {
        $this->bankAccountNumber = $bankAccountNumber;
        return $this;
    }

    public function setIban($iban) {
        $this->iban = $iban;
        return $this;
    }

    private $hassedPassword = "";

    public function setPassword($password)
    {
        $this->hassedPassword = $password;
    }

    public function getPasasword()
    {
        return $this->hassedPassword;
    }

    public function getApiCall() {
        return $this->apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getVatRate() {
        return $this->vatRate;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function setVatRate($vatRate) {
        $this->vatRate = $vatRate;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }


}
