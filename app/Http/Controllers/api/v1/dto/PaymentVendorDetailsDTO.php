<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\dto;

use Webpatser\Uuid\Uuid;
use App\Http\Controllers\api\v1\dto\PaymentVendorMasterDTO;

/**
 * Description of PaymentProviderConfigDTO
 *
 * @author Ahmed Kamal
 */
class PaymentVendorDetailsDTO implements DTOInterface {

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
        
    }

    /**
     * Default constructor with 1 parameter.
     */
    public function construct1(PaymentVendorMasterDTO $paymentVendorMasterDTO) {
        $this->vendorMasterId = $paymentVendorMasterDTO->getId();
    }

    /**
     * Constructor with two parameters.
     * @param type $param1 target parameter 1
     * @param type $param2 target parameter 2
     */
    public function construct2($param1, $param2) {
        
    }

    //put your code here

    private $vendorMasterId;
    private $message;
    private $apiCall = '1'; //API Calls Active by Default

    function getApiCall() {
        return $this->apiCall;
    }

    function setApiCall($apiCall) {
        $this->apiCall = $apiCall;
    }

    public function getDTOById($id) {
        
    }

    public function getVendorMasterId() {
        return $this->vendorMasterId;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }

}
