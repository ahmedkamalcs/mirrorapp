<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

/**
 * Description of VendorDTO
 *
 * @author Ahmed Kamal
 */
class VendorProfileDTO implements DTOInterface {

    //put your code here
    private $id;
    private $vendorMasterId;
    private $profileName;
    private $description;
    private $firstName;
    private $lastName;
    private $profilePicture;
    private $telNo;
    private $mobileNo;
    private $bio;
    private $active;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getVendorMasterId() {
        return $this->vendorMasterId;
    }

    public function getProfileName() {
        return $this->profileName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getProfilePicture() {
        return $this->profilePicture;
    }

    public function getTelNo() {
        return $this->telNo;
    }

    public function getMobileNo() {
        return $this->mobileNo;
    }

    public function getBio() {
        return $this->bio;
    }

    public function isActive() {
        return $this->active;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setVendorMasterId($vendorMasterId) {
        $this->vendorMasterId = $vendorMasterId;
        return $this;
    }

    public function setProfileName($profileName) {
        $this->profileName = $profileName;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
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

    public function setProfilePicture($profilePicture) {
        $this->profilePicture = $profilePicture;
        return $this;
    }

    public function setTelNo($telNo) {
        $this->telNo = $telNo;
        return $this;
    }

    public function setMobileNo($mobileNo) {
        $this->mobileNo = $mobileNo;
        return $this;
    }

    public function setBio($bio) {
        $this->bio = $bio;
        return $this;
    }

    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

}
