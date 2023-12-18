<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\paymentmodel;

use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\vendor\bo\BVendorCommissionTransaction;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\PaymentUserInvoiceDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\paymentmodel\bo\BPaymentPayee;
use App\Http\Controllers\api\v1\dto\PaymentPayeeDTO;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\paymentmodel\bo\BInvoice;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class PaymentEInvoiceModel extends Model {




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



    public function saveObject(EInvoiceHeaderDTO $eInvoiceDTO)
    {
        $this->amount = $eInvoiceDTO->getTotalAmountDue();
        $this->einvoice_header_id = $eInvoiceDTO->getId();
        $this->payment_vendor_master_id = $eInvoiceDTO->getPaymentVendormasterId();

        $obj = $this->save();
        //Update E-Invoice Status
        DBUtil::updateByColName("einvoice_simplified_invoice_header", "id", $eInvoiceDTO->getId(), "invoice_status",AppDTO::$EINVOICE_STATUS_PAID);

        //Save Commission
        $bVendorCommissionTransaction = new BVendorCommissionTransaction();
        $bVendorCommissionTransaction->postEInvoiceVendorCommission($eInvoiceDTO);

        return $obj;
    }

    public function getTotalPaidInvoiceAmount(PaymentUserInvoiceDTO $userInvoiceDTO)
    {
        $query = "SELECT SUM(payee_amount) AS 'total' FROM isg_payment_user_invoice WHERE invoice_id = ". $userInvoiceDTO->getInvoiceId();
        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->total;
        }else{
            return 0;
        }
    }

    public function getTotalInvoiceAmount(PaymentUserInvoiceDTO $userInvoiceDTO)
    {
        $query = "SELECT invoice_amount as 'amount' FROM invoice WHERE id = ". $userInvoiceDTO->getInvoiceId();
        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->amount;
        }else{
            return 0;
        }
    }



    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'einvoice_payment';

}
