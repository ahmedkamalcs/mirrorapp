<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationDTO
 *
 * @author Saad Aly
 */

namespace App\Http\Controllers\api\v1\dto;

use App\Http\Controllers\api\v1\util\StringUtil;

class ServicesDTO implements DTOInterface {    
    private $userPhoneNo;
    private $categoryId;
    private $subcategory;
    private $salonServices;
    private $subcategoryId;
    private $isactive;
    private $isServingFemales;
    private $isServingMales;
    private $serviceDescription;
    private $serviceDuration;
    private $servicePrice;
    private $apiCall = '1'; //API Calls Active by Default
    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }
        public function getDTOById($id) {
    }
    function setCategoryId($categoryId){
        $this->categoryId = $categoryId;
    }
    function getCategoryId() {
        return $this->categoryId;
    }
    function setSubcategory($subcategory){
        $this->subcategory = $subcategory;
    }
    function getSubcategory() {
        return $this->subcategory;
    }
    function setUserPhoneNo($userPhoneNo) {
        $this->userPhoneNo = $userPhoneNo;
    }
    function getUserPhoneNo() {
        return $this->userPhoneNo;
    }
    function setSalonServices($salonservices) {
        $this->salonServices = $salonservices;
    }
    function getSalonServices() {
        return $this->salonServices;
    }
    function setSubcategoryId($subcategoryId) {
        $this->subcategoryId = $subcategoryId;
    }  
    function getSubCategoryId(){
        return $this->subcategoryId;
    }
    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }
    function getIsactive() {
        return $this->isactive;
    }
    function setIsServingFemales($isServingFemales){
        $this->isServingFemales=$isServingFemales;
    }
    function getIsServingFemales(){
        return $this->isServingFemales;
    }
    
    function setIsServingMales($isServingMales){
        $this->isServingMales=$isServingMales;
    }
    function getIsServingMales(){
        return $this->isServingMales;
    }
    function setServiceDescription($serviceDescription){
        $this->serviceDescription=$serviceDescription;
    }
    
    function getServiceDescription(){
        return $this->serviceDescription;
    }
    function setServiceDuration($serviceDuration){
        $this->serviceDuration=$serviceDuration;
    }
    
    function getServiceDuration(){
        return $this->serviceDuration;
    }
    function setServicePrice($servicePrice){
        $this->servicePrice=$servicePrice;
    }
    
    function getServicePrice(){
        return $this->servicePrice;
    }

}