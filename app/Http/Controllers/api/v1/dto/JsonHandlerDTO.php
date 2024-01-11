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
use App\Http\Controllers\api\v1\dto\JsonHandlerDTO;
class JsonHandlerDTO implements DTOInterface{

    private $message;
    private $isSuccess;
    private $jsonData;
    private $resultInArr;
    private $resultHead;
    
    public function getResultHead() {
        return $this->resultHead;
    }

    public function setResultHead($resultHead) {
        $this->resultHead = $resultHead;
        return $this;
    }

            
    public function getMessage() {
        return $this->message;
    }

    public function getIsSuccess() {
        return $this->isSuccess;
    }

    public function getJsonData() {
        return $this->jsonData;
    }

    public function getResultInArr() {
        return $this->resultInArr;
    }

    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function setIsSuccess($isSuccess) {
        $this->isSuccess = $isSuccess;
        return $this;
    }

    public function setJsonData($jsonData) {
        $this->jsonData = $jsonData;
        return $this;
    }

    public function setResultInArr($resultInArr) {
        $this->resultInArr = $resultInArr;
        return $this;
    }

        
    public function getApiCall() {
        
    }

    public function getDTOById($id) {
        
    }

    public function setApiCall($apiCall) {
        
    }

}
