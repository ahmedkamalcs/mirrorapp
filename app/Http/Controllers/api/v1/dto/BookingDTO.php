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

class BookingDTO implements DTOInterface {    
    private $clientPhoneNumber;
    private $bookingId;
    private $bookingFrom;
    private $bookingTo;
    private $salonId;
    private $branchId;
     private $emplyeeId;
     private $status;
     private $serviceCategory;
     private $serviceSubCategory;
     private $quantity ;
     private $price;
     private $serviceDuration;
     private $bookingDate;

    private $apiCall = '1'; //API Calls Active by Default
    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }
        public function getDTOById($id) {
    }
    function setServiceDuration($serviceDuration){
        $this->serviceDuration=$serviceDuration;
    }
    function getServiceDuration(){
        return $this->serviceDuration;
    }
    function setServiceCategory($serviceCategory){
        $this->serviceCategory=$serviceCategory;
    }
       function getServiceCategory(){
        return $this->serviceCategory;
    }
    function setBookingDate($bookingDate){
        $this->bookingDate=$bookingDate;
    }
  function getBookingDate(){
        return $this->bookingDate;
    }
    function setServiceSubCategory($serviceSubCategory){
        $this->serviceSubCategory=$serviceSubCategory;
    }
    function getServiceSubCategory(){
        return $this->serviceSubCategory;
    }
    function setQuantity($quantity){
        $this->quantity=$quantity;
    }
    function getQuantity(){
        return $this->quantity;
    }
    function setPrice($price){
        $this->price=$price;
    }
    function getPrice(){
        return $this->price;
    }
    function setBookingId($bookingId){
        $this->bookingId=$bookingId;
    }
    function getBookingId(){
        return $this->bookingId;
    }
    function setClientPhoneNumber($clientPhoneNumber){
        $this->clientPhoneNumber=$clientPhoneNumber;
    }
    function getClientPhoneNumber(){
       return $this->clientPhoneNumber;
    }
    function setBookingFrom($bookingFrom){
        $this->bookingFrom=$bookingFrom;
    }
    function getBookingFrom(){
        return $this->bookingFrom;
    }
    function setBookingTo($bookingTo){
        $this->bookingTo=$bookingTo;
    }
    function getBookingTo(){
        return $this->bookingTo;
    }
    function setSalonId($salonId){
        $this->salonId=$salonId;
    }
    function getSalonId(){
        return $this->salonId;
    }
    function setBranchId($branchId){
        $this->branchId=$branchId;
    }
    function getBranchId(){
        return $this->branchId;
    }

    function setEmployeeId($emplyeeId){
        $this->emplyeeId=$emplyeeId;
    }
    function getEmployeeId(){
        return $this->emplyeeId;
    }
    function setStatus($status){
        $this->status=$status;
    }
    
    function getStatus(){
        return $this->status;
    }
}