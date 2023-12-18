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
class PrivacyPolicyQuestionnaireDTO implements DTOInterface {

    //put your code here

    private $id;
    private $businessType;
    private $applicationType;
    private $websiteURL;
    private $advertising;
    private $socialMediaFacebook;
    private $socialMediaInstgram;
    private $socialMediaTwitter;
    private $socialMediaLinkedIn;
    private $socialMediaYoutube;
    private $active;
    private $createdAt;
    private $updatedAt;
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

    public function getBusinessType() {
        return $this->businessType;
    }

    public function getApplicationType() {
        return $this->applicationType;
    }

    public function getWebsiteURL() {
        return $this->websiteURL;
    }

    public function getAdvertising() {
        return $this->advertising;
    }

    public function getSocialMediaFacebook() {
        return $this->socialMediaFacebook;
    }

    public function getSocialMediaInstgram() {
        return $this->socialMediaInstgram;
    }

    public function getSocialMediaTwitter() {
        return $this->socialMediaTwitter;
    }

    public function getSocialMediaLinkedIn() {
        return $this->socialMediaLinkedIn;
    }

    public function getSocialMediaYoutube() {
        return $this->socialMediaYoutube;
    }

    public function getActive() {
        return $this->active;
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

    public function setBusinessType($businessType) {
        $this->businessType = $businessType;
        return $this;
    }

    public function setApplicationType($applicationType) {
        $this->applicationType = $applicationType;
        return $this;
    }

    public function setWebsiteURL($websiteURL) {
        $this->websiteURL = $websiteURL;
        return $this;
    }

    public function setAdvertising($advertising) {
        $this->advertising = $advertising;
        return $this;
    }

    public function setSocialMediaFacebook($socialMediaFacebook) {
        $this->socialMediaFacebook = $socialMediaFacebook;
        return $this;
    }

    public function setSocialMediaInstgram($socialMediaInstgram) {
        $this->socialMediaInstgram = $socialMediaInstgram;
        return $this;
    }

    public function setSocialMediaTwitter($socialMediaTwitter) {
        $this->socialMediaTwitter = $socialMediaTwitter;
        return $this;
    }

    public function setSocialMediaLinkedIn($socialMediaLinkedIn) {
        $this->socialMediaLinkedIn = $socialMediaLinkedIn;
        return $this;
    }

    public function setSocialMediaYoutube($socialMediaYoutube) {
        $this->socialMediaYoutube = $socialMediaYoutube;
        return $this;
    }

    public function setActive($active) {
        $this->active = $active;
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

}
