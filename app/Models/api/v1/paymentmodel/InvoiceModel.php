<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\paymentmodel;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\InvoiceDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\tax\bo\BTax;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Models\api\v1\paymentmodel\InvoiceLinesModel;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class InvoiceModel extends Model implements ModelInterface {

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

    public function saveObject(InvoiceDTO $invoiceDTO) {
        $this->invoice_header = $invoiceDTO->getInvoiceHeader();
        $this->user_id = $invoiceDTO->getUserId();
        $this->order_no = $invoiceDTO->getOrderNo();
        $this->invoice_text = $invoiceDTO->getInvoiceText();
        //Save Gross Amount
//        $this->fillinGrossAmount($invoiceDTO->getInvoiceAmount());
        $this->calculateInvoiceRelatedData($invoiceDTO);

        $this->save();
        $invoiceDTO->setId($this->id);
        return $this->saveInvoiceDetails($invoiceDTO);

//        return $this;
    }

    private function calculateInvoiceRelatedData(InvoiceDTO $invoiceDTO) {
        //Get order master by id by order number.
        $query = "SELECT id AS 'orderMasterId', total_net_price  as 'totalNet', total_gross_price as 'totalGross' FROM isg_order_master WHERE order_no = " . $invoiceDTO->getOrderNo() . " LIMIT 1";
        $result = DBUtil::select($query);
        $totalGross = 0;
        $totalNet = 0;
        if ($result) {
            $this->order_master_id = $result[0]->orderMasterId;
            $invoiceDTO->setOrderMasterId($this->order_master_id);
            $totalGross = $result[0]->totalGross;
            $totalNet = $result[0]->totalNet;
        } else {
            $this->order_master_id = null;
        }

        $this->gross_amount = $totalGross;
        $this->invoice_amount = $totalNet;
    }

    private function saveInvoiceDetails(InvoiceDTO $invoiceDTO) {
        
        if( $invoiceDTO->getOrderMasterId() == null || $invoiceDTO->getOrderMasterId() == ''){
            return AppDTO::$FALSE_AS_STRING;
        }
        
        //Loop on order details.
        $query = "SELECT basic_price, tax_amount, gross_price, id  FROM isg_order_details WHERE isg_order_master_id = " . $invoiceDTO->getOrderMasterId();
        $result = DBUtil::select($query);

        if ($result) {
            foreach ($result as $obj) {
                $basicPrice = $obj->basic_price;
                $taxAmount = $obj->tax_amount;
                $grossPrice = $obj->gross_price;
                $id = $obj->id;
                $orderDetailsDTO = new OrderDetailsDTO();
                $orderDetailsDTO->setBasicPrice($basicPrice);
                $orderDetailsDTO->setTaxAmount($taxAmount);
                $orderDetailsDTO->setGrossPrice($grossPrice);
                $orderDetailsDTO->setId($id);

                $this->fillInvoiceDTO($invoiceDTO, $orderDetailsDTO);

                $invoiceLinesModel = new InvoiceLinesModel();
                $invoiceLinesModel->saveObject($invoiceDTO);
            }
        }
    }

    private function fillInvoiceDTO(InvoiceDTO $invoiceDTO, OrderDetailsDTO $orderDetailsDTO) {
        //Copy Invoice Lines Data.
        $invoiceDTO->setInvoiceHeader($this->invoice_header);
        $invoiceDTO->setInvoiceText($this->invoice_text);
        $invoiceDTO->setInvoiceAmount($orderDetailsDTO->getBasicPrice());
        $invoiceDTO->setTaxPercent($orderDetailsDTO->getTaxAmount());
        $invoiceDTO->setGrossAmount($orderDetailsDTO->getGrossPrice());
        $invoiceDTO->setOrderMasterId($this->order_master_id);
        $invoiceDTO->setOrderDetailsId($orderDetailsDTO->getId());
        $invoiceDTO->setOrderNo($this->order_no);
    }

    private function fillinGrossAmount($amount) {
        $bTax = new BTax();
        $taxPecent = $bTax->getActiveTaxByType(AppDTO::$VAT_TAX_CODE) / 100;

        $this->gross_amount = $amount + ($amount * $taxPecent);
        $this->tax_percent = $taxPecent;
    }

    public function getDTOById($id) {
        $invoiceDTO = new InvoiceDTO();
        $invoiceArr = InvoiceModel::where('id', $id)->get();
        if ($invoiceArr) {
            $invoiceDTO->setId($invoiceArr[0]->id);
            $invoiceDTO->setInvoiceHeader($invoiceArr[0]->invoice_header);
            $invoiceDTO->setUserId($invoiceArr[0]->user_id);
            return $invoiceDTO;
        }
        return null;
    }

    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'isg_invoice';

}
