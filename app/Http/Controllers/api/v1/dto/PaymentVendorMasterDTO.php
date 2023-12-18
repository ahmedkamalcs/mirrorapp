<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

use Webpatser\Uuid\Uuid;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;

/**
 * Description of PaymentProviderConfigDTO
 *
 * @author Ahmed Kamal
 */
class PaymentVendorMasterDTO implements DTOInterface {

    public function __construct() {
        $args = func_get_args(); //any function that calls this method can take an arbitrary number of parameters
        switch (func_num_args()) {
            //delegate to helper methods
            case 0:
                $this->construct0();
                break;
            case 1:
                $this->construct1($args[0]);
                break;
            case 2:
                $this->construct2($args[0], $args[1]);
                break;
//            case 3:
//                $this->construct3($args[0], $args[1], $args[2]);
//                break;
            default:
                trigger_error('Incorrect number of arguments for Foo::__construct', E_USER_WARNING);
        }
    }

    /**
     * Default constructor. with zero parameters.
     */
    public function construct0() {
        $this->setUUID(Uuid::generate());
    }

    /**
     * Default constructor with 1 parameter.
     */
    public function construct1($targetServer) {
        
    }

    /**
     * Constructor with two parameters.
     * @param type $param1 target parameter 1
     * @param type $param2 target parameter 2
     */
    public function construct2($ticket, $userId) {
        
    }

    //put your code here
    private $id;
    private $sessionId;
    private $UUID;
    private $userId;
    private $paymentVendorDetailsDTO;
    private $invoiceId;
    private $paymentPayeeId;
    private $einvoiceId;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function setInvoiceId($invoiceId) {
        $this->invoiceId = $invoiceId;
    }

    public function getInvoiceId() {
        return $this->invoiceId;
    }

    public function setPaymentPayeeId($paymentPayeeId) {
        $this->paymentPayeeId = $paymentPayeeId;
    }

    public function getPaymentPayeeId() {
        return $this->paymentPayeeId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setSessionId($sessionId) {
        $this->sessionId = $sessionId;
    }

    public function getSessionId() {
        return $this->sessionId;
    }

    public function setUUID($UUID) {
        $this->UUID = $UUID;
    }

    public function getUUID() {
        return $this->UUID;
    }

    public function setPaymentVendorDetailsDTO(PaymentVendorDetailsDTO $paymentVendorDetailsDTO) {
        $this->paymentVendorDetailsDTO = $paymentVendorDetailsDTO;
    }

    public function getPaymentVendorDetailsDTO() {
        return $this->paymentVendorDetailsDTO;
    }

    /**
     * @return mixed
     */
    function getEinvoiceId() {
        return $this->einvoiceId;
    }

    /**
     * @param mixed $einvoiceId
     * @return PaymentVendorMasterDTO
     */
    function setEinvoiceId($einvoiceId): self {
        $this->einvoiceId = $einvoiceId;
        return $this;
    }

}
