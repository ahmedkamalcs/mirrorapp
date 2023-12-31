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

class SalonDTO implements DTOInterface {    
    private $userPhoneNo;
    private $salonLogo;
    private $salonGallery;
    private $salonName;
    private $salonArabicName;
    private $salonServiceType;
     private $salonBusinessType;
     private $salonTeamMember;
     private $salonBranchesNo;
     private $salonWorkingDays;
     private $salonWorkingHoursFrom;
     private $salonWorkingHoursTill;
     private $salonIsOffering24Services;
     private $salonClientsType;
     private $isSalonServices;
     private $isHomeServices;
     private $salonId;
     private $isServingFemales;
     private $isServingMales;

    private $salonWorkStyle;
    private $apiCall = '1'; //API Calls Active by Default
    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }
        public function getDTOById($id) {
    }
    function setSalonLogo($logo){
        $this->salonLogo = $logo;
    }
    function getSalonLogo() {
        return $this->salonLogo;
    }
    function setSalonGallery($gallery){
        $this->salonGallery = $gallery;
    }
    function getSalonGallery() {
        return $this->salonGallery;
    }
    function setUserPhoneNo($userPhoneNo) {
        $this->userPhoneNo = $userPhoneNo;
    }
    function getUserPhoneNo() {
        return $this->userPhoneNo;
    }
    function setSalonName( $salonName) {
        $this->salonName = $salonName;
    }
    function getSalonName() {
        return $this->salonName;
    }
    function setSalonArabicName( $salonArabicName) {
        $this->salonArabicName = $salonArabicName;
    }
    function getSalonArabicName() {
        return $this->salonArabicName;
    }
    function setSalonServiceType( $salonServiceType) {
        $this->salonServiceType = $salonServiceType;
    }
    function getSalonServiceType() {
        return $this->salonServiceType;
    }
    function setSalonBusinessType( $salonBusinessType) {
        $this->salonBusinessType = $salonBusinessType;
    }
    function getSalonBusinessType() {
        return $this->salonBusinessType;
    }
    function setSalonTeamMember( $salonTeamMember) {
        $this->salonTeamMember = $salonTeamMember;
    }
    function getSalonTeamMember() {
        return $this->salonTeamMember;
    }
    function setSalonBranchesNo( $salonBranchesNo) {
        $this->salonBranchesNo = $salonBranchesNo;
    }
    function getSalonBranchesNo() {
        return $this->salonBranchesNo;
    }
    function setSalonWorkingDays( $salonWorkingDays) {
        $this->salonWorkingDays = $salonWorkingDays;
    }
    function getSalonWorkingDays() {
        return $this->salonWorkingDays;
    }
    function setSalonWorkingHoursFrom( $salonWorkingHoursFrom) {
        $this->salonWorkingHoursFrom = $salonWorkingHoursFrom;
    }
    function getSalonWorkingHoursFrom() {
        return $this->salonWorkingHoursFrom;
    }
    function setSalonWorkingHoursTill( $salonWorkingHoursTill){
        $this->salonWorkingHoursTill = $salonWorkingHoursTill;
    
    }
    function getSalonWorkingHoursTill() {
        return $this->salonWorkingHoursTill;
    }
    function setSalonIsOffering24Services( $salonIsOffering24Services) {
        $this->salonIsOffering24Services = $salonIsOffering24Services;
    }
    function getSalonIsOffering24Services() {
        return $this->salonIsOffering24Services;
    }
    function setSalonClientsType( $salonClientsType) {
        $this->salonClientsType = $salonClientsType;
    }
    function getSalonClientsType() {
        return $this->salonClientsType;
    }
    function setSalonId($salonId) {
        $this->salonId = $salonId;
    }
    function getSalonId() {
        return $this->salonId;
    }
function setSalonWorkStyle( $salonWorkStyle) {
    $this->salonWorkStyle = $salonWorkStyle;
}
function getSalonWorkStyle() {
    return $this->salonWorkStyle;
}
function setIsSalonServices( $isSalonServices) {
    $this->isSalonServices = $isSalonServices;
}
function getIsSalonServices() {
    return $this->isSalonServices;
}
function setIsHomeServices( $isHomeServices) {
    $this->isHomeServices = $isHomeServices;
}
function getIsHomeServices() {
    return $this->isHomeServices;
}
function setIsServingFemales( $isServingFemales) {
    $this->isServingFemales = $isServingFemales;
}
function getIsServingFemales() {
    return $this->isServingFemales;
}
function setIsServingMales( $isServingMales) {
    $this->isServingMales = $isServingMales;
}
function getIsServingMales() {
    return $this->isServingMales;
}
}