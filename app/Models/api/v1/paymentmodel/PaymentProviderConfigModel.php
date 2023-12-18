<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\paymentmodel;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\PaymentProviderConfigDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class PaymentProviderConfigModel extends Model {

    public static $STATUS_ACTIVE = 'Active';


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

    /*
     * Default constructor.
     */
    public function construct0() {

    }

    /**
     * Constructor with one parameter.
     * @param type $request
     */
    public function construct1($request) {
    }

    /**
     * Constructor with three parameters.
     * @author ISG
     * @param type $taskTitle target task title.
     * @param type $taskDescription target task description.
     */
    public function construct2($userId, $eventTitleEn, $eventTitleAr) {
    }

    /**
     * Do create event.
     * @return string save status, message.
     */
    public function getActiveRecord($targetServer) {

//        $targetServerValue =( $targetServer == null || $targetServer == '' ) ? BPayment::$PAYMENT_SERVER_PROD : $targetServer;//Default is production server.

//        $query = "select * from payment_provider_config where Status = 'Active' and target_server = '".$targetServerValue ."'";
//        return $query;

//        $config = PaymentProviderConfigModel::whereStatus(PaymentProviderConfigModel::$STATUS_ACTIVE)->first();
         $config = PaymentProviderConfigModel::where([
//
                    ['Status', '=', PaymentProviderConfigModel::$STATUS_ACTIVE],
                    ['target_server', '=', $targetServer]
                ])->first();

//        $config = DBUtil::select($query);
        return $config;
    }

    public function saveObject(PaymentProviderConfigDTO $paymentProviderConfigDTO)
    {
        $this->provider_name = $paymentProviderConfigDTO->getProviderName();
        return $this->save();
    }

    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = false;
    protected $table = 'isg_payment_provider_config';

}
