<?php

namespace App\Http\Controllers\api\v1\paymentmodel\bo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\v1\ModelFactory;
use App\Http\Model\v1\event\EventCategoryModel;
use App\Http\Controllers\api\v1\dto\PaymentPayeeDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Models\api\v1\paymentmodel\PaymentPayeeModel;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;

/* * *
 * @author ISG.
 * Business event class that handles business logic for Event Details table.
 */

class BPaymentPayee implements BusinessInterface {

    /**
     * Constructor routing function.
     * Switch between constructors.
     */
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
            case 3:
                $this->construct3($args[0], $args[1], $args[2]);
                break;
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
    public function construct1($model) {
        
    }

    /**
     * Constructor with two parameters.
     * @param type $param1 target parameter 1
     * @param type $param2 target parameter 2
     */
    public function construct2($param1, $param2) {
        
    }

    public function saveObject(PaymentPayeeDTO $paymentPayeeDTO) {
        $paymentPayeeModel = new PaymentPayeeModel();
        $paymentPayeeModel->saveObject($paymentPayeeDTO);

        if ($paymentPayeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Saved Object";

            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public function getDTOById($id) {
        $paymentPayeeModel = new PaymentPayeeModel();
        return $paymentPayeeModel->getDTOById($id);
    }

}
