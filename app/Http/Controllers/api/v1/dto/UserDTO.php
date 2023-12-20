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

class UserDTO  implements DTOInterface{

    private $id;
    private $userName;
    private $password;
    private $firstName;
    private $FullName;
    private $lastName;
    private $userActive;
    private $userLastLogin;
    private $isEmailVerified;
    private $isPhoneVerified;
    private $phoneNumber;
//    private $userOtpDTO;

    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    private $userEmail;

    function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
    }

//    public function setUserOtpDTO(UserOtpDTO $userOtpDTO)
//    {
//        $this->userOtpDTO = $userOtpDTO;
//    }
//    public function getUserOtpDTO()
//    {
//        return $this->userOtpDTO;
//    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }
    public function setFullName($FullName) {
        $this->FullName = $FullName;
    }
    public function getFullName() {
        return $this->FullName;
    }
    public function getUserName() {
        return $this->userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function isUserActive() {
        return $this->userActive;
    }

    public function setUserActive($userActive) {
        $this->userActive = $userActive;
    }

    public function getUserLastLogin() {
        return $this->userLastLogin;
    }

    public function setUserLastLogin($userLastLogin) {
        $this->userLastLogin = $userLastLogin;
    }

    public function isEmailVerified() {
        return $this->isEmailVerified;
    }

    public function setIsEmailVerified($isEmailVerified) {
        $this->isEmailVerified = $isEmailVerified;
    }

    public function isPhoneVerified() {
        return $this->isPhoneVerified;
    }

    public function setIsPhoneVerified($isPhoneVerified) {
        $this->isPhoneVerified = $isPhoneVerified;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    /**
     * @return mixed
     */
    function getUserEmail() {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     * @return UserDTO
     */
    function setUserEmail($userEmail): self {
        $this->userEmail = $userEmail;
        return $this;
    }

}
