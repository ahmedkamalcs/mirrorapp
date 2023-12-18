<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\tax;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\TaxDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\util\DBUtil;
/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class TaxModel extends Model implements ModelInterface{




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



    public function saveObject(TaxDTO $taxDTO)
    {
        $this->amount = $taxDTO->getAmount();
        $this->is_active = $taxDTO->isActive();
        $this->tax_type = $taxDTO->getTaxType();

        $obj = $this->save();
        $taxDTO->setId($this->id);
        $taxDTO->setCreatedAt($this->created_at);
        $taxDTO->setUpdatedAt($this->updated_at);

        return $taxDTO;
    }


    public function getDTOById($id) {
//        $invoiceDTO = new InvoiceDTO();
//        $invoiceArr = InvoiceModel::where('id', $id )->get();
//        if($invoiceArr)
//        {
//            $invoiceDTO->setId($invoiceArr[0]->id);
//            $invoiceDTO->setInvoiceHeader($invoiceArr[0]->invoice_header);
//            $invoiceDTO->setUserId($invoiceArr[0]->user_id);
//            return $invoiceDTO;
//        }
//        return null;
    }

    public function getActiveTaxByType($taxType)
    {
        //TODO Get Tax by Type
        $taxDTO = new TaxDTO();
        $query = "SELECT amount FROM isg_tax WHERE is_active ='1' AND tax_type = '".$taxType."'  ORDER BY updated_at DESC LIMIT 1;";
        $taxArr = DBUtil::select($query);//UserOTP::where('phone_number', $userOtpDTO->getPhoneNumber() )->get();
        if($taxArr)
        {
           return $taxArr[0]->amount;
        }
        return 0;
    }

    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'isg_tax';

}
