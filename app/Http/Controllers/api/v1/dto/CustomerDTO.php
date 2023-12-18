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

class CustomerDTO implements DTOInterface {

    private $id;
    private $customerNumber;
    private $firstName;
    private $lastName;
    private $telNo;
    private $email;
    private $address1;
    private $address2;
    private $customerType;
    private $companyName;
    private $companyNameAr;
    private $country;
    private $city;
    private $website;
    private $phone;
    private $contact;
    private $position;
    private $vatNumber;
    private $history;
    private $notes;
    private $apiCall = '1'; //API Calls Active by Default

    public function getId() {
        return $this->id;
    }

    public function getCustomerNumber() {
        return $this->customerNumber;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getTelNo() {
        return $this->telNo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress1() {
        return $this->address1;
    }

    public function getAddress2() {
        return $this->address2;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setCustomerNumber($customerNumber) {
        $this->customerNumber = $customerNumber;
        return $this;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setTelNo($telNo) {
        $this->telNo = $telNo;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setAddress1($address1) {
        $this->address1 = $address1;
        return $this;
    }

    public function setAddress2($address2) {
        $this->address2 = $address2;
        return $this;
    }

    public function getCustomerType() {
        return $this->customerType;
    }

    public function setCustomerType($customerType) {
        $this->customerType = $customerType;
        return $this;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getCompanyNameAr() {
        return $this->companyNameAr;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getCity() {
        return $this->city;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getContact() {
        return $this->contact;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getVatNumber() {
        return $this->vatNumber;
    }

    public function getHistory() {
        return $this->history;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
        return $this;
    }

    public function setCompanyNameAr($companyNameAr) {
        $this->companyNameAr = $companyNameAr;
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

    public function setWebsite($website) {
        $this->website = $website;
        return $this;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function setContact($contact) {
        $this->contact = $contact;
        return $this;
    }

    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    public function setVatNumber($vatNumber) {
        $this->vatNumber = $vatNumber;
        return $this;
    }

    public function setHistory($history) {
        $this->history = $history;
        return $this;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return mixed
     */
    function getApiCall() {
        return $this->apiCall;
    }

    /**
     * @param mixed $apiCall
     * @return CompanyProfileDTO
     */
    function setApiCall($apiCall): self {
        $this->apiCall = $apiCall;
        return $this;
    }

    public function getDTOById($id) {
        
    }

}
