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
class PrivacyPolicyHeaderDTO implements DTOInterface {

    //put your code here
    private $id;
    private $title;
    private $conent;
    private $templateId;
    private $questionnaireId;
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

    public function getTitle() {
        return $this->title;
    }

    public function getConent() {
        return $this->conent;
    }

    public function getTemplateId() {
        return $this->templateId;
    }

    public function getQuestionnaireId() {
        return $this->questionnaireId;
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

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setConent($conent) {
        $this->conent = $conent;
        return $this;
    }

    public function setTemplateId($templateId) {
        $this->templateId = $templateId;
        return $this;
    }

    public function setQuestionnaireId($questionnaireId) {
        $this->questionnaireId = $questionnaireId;
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
