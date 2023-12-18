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


class UserCompanyDTO implements DTOInterface {

    private $id;
    private $createdAt;
    private $updatedAt;
    private $companyId;
    private $companyCode;
    private $usersId;
    private $apiCall = '1'; //API Calls Active by Default
    
    private $userEmail;
    
    public function getUserEmail() {
        return $this->userEmail;
    }

    public function setUserEmail($userEmail) {
        $this->userEmail = $userEmail;
        return $this;
    }

    
    public function getApiCall() {
        return $this->apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function getCompanyId() {
        return $this->companyId;
    }

    public function getCompanyCode() {
        return $this->companyCode;
    }

    public function getUsersId() {
        return $this->usersId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function setCompanyId($companyId) {
        $this->companyId = $companyId;
    }

    public function setCompanyCode($companyCode) {
        $this->companyCode = $companyCode;
    }

    public function setUsersId($usersId) {
        $this->usersId = $usersId;
    }
}
