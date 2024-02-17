<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationDTO
 *
 * @author ISG
 */

namespace App\Http\Controllers\api\v1\dto;

use App\Http\Controllers\api\v1\util\StringUtil;

class SalonInvoiceDTO implements DTOInterface {    
    private $invoiceId;
    private $salon_id;
    private $salon_mob_num;
    private $client_mob_num;
    private $client_id;
    private $amount;
     private $booking_id;
     private $payment_status;
     private $payment_response;
     

    private $apiCall = '1'; //API Calls Active by Default
    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }
        public function getDTOById($id) {
    }
    function getInvoiceId(){
        return $this->invoiceId;
    }
    function setInvoiceId($InvoiceId){
        $this->invoiceId=$InvoiceId;
    }
    function setSalonId($salon_id){
        $this->salon_id=$salon_id;
    }
    function getSalonId(){
        return $this->salon_id;
    }
    function setSalonMobile($salon_mob_num){
        $this->salon_mob_num=$salon_mob_num;
    }
    function getSalonMobile(){
        return $this->salon_mob_num;
    }
    function setClientMobile($client_mob_num){
        $this->client_mob_num=$client_mob_num;
    }
    function getClientMobile(){
        return $this->client_mob_num;
    }
    function setClientId($client_id){
        $this->$client_id=$client_id;
    }
    function getClientId(){
        return $this->client_id;
    }
    function setInvoiceAmount($amount){
        $this->amount=$amount;
    }
    function getInvoiceAmount(){
        return $this->amount;
    }
    function setBookingId($booking_id){
        $this->booking_id=$booking_id;
    }
    function getBookingId(){
        return $this->booking_id;
    }
    function setPaymentStatus($payment_status){
        $this->payment_status=$payment_status;
    }
    function getPaymentStatus(){
        return $this->payment_status;
    }
    function setPaymentResponse($payment_response){
        $this->payment_response=$payment_response;
    }
    function getPaymentResponse(){
        return $this->payment_response;
    }

}