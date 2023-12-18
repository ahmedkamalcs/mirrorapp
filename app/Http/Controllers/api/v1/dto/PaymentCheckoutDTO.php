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
class PaymentCheckoutDTO implements DTOInterface {

    //put your code here

    private $paymentVendorMasterId;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setPaymentVendorMasterId($paymentVendorMasterId) {
        $this->paymentVendorMasterId = $paymentVendorMasterId;
    }

    public function getPaymentVendorMasterId() {
        return $this->paymentVendorMasterId;
    }

}
