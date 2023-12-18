<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\einvoice;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\ItemMasterDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\sys\bo\BSystemSeries;
use App\Http\Controllers\api\v1\dto\SystemSeriesDTO;
use App\Http\Controllers\api\v1\dto\EInvoiceLineDTO;
use App\Http\Controllers\api\v1\tax\bo\BTax;
use App\Models\api\v1\vendor\ItemMasterModel;
use App\Models\api\v1\vendor\ItemVendorModel;
use App\Http\Controllers\api\v1\dto\ItemVendorDTO;
use App\Http\Controllers\api\v1\vendor\bo\BVendorCommissionTransaction;

/**
 * @author ISG 
 */
class EInvoiceLineModel extends Model implements ModelInterface {

    public function saveObject(EInvoiceLineDTO $einvoiceLineDTO) {
        //Create New User
        $this->fillInDTO($einvoiceLineDTO);


        $this->save();


        return $this;
    }

    private function fillInDTO(EInvoiceLineDTO $einvoiceLineDTO) {
        $this->item_name = $einvoiceLineDTO->getItemName();
        $this->unit_price = $einvoiceLineDTO->getUnitPrice();
        $this->quantity = $einvoiceLineDTO->getQuantity();
        $this->taxable_amount = $einvoiceLineDTO->getTaxableAmount();
        $this->gross_amount = $einvoiceLineDTO->getGrossAmount();
        $this->discount = $einvoiceLineDTO->getDiscount();
        $this->amount_after_discount = $einvoiceLineDTO->getAmountAfterDiscount();
        $this->tax_rate = $einvoiceLineDTO->getTaxRate();
        $this->tax_amount = $einvoiceLineDTO->getTaxAmount();
        $this->subtotal = $einvoiceLineDTO->getSubtotalIncludingVAT();//Including VAT
        $this->currency = $einvoiceLineDTO->getCurency();
        $this->einvoice_simplified_invoice_header_id = $einvoiceLineDTO->getEinvoiceHeaderId();
    }

    
    
    public function getDTOById($id) {
        $targetUserDTO = new UserDTO("", "");
        $userArr = User::where('id', $id)->get();
        if ($userArr) {
            $targetUserDTO->setId($userArr[0]->id);
            $targetUserDTO->setUserName($userArr[0]->user_name);
            $targetUserDTO->setFirstName($userArr[0]->first_name);
            $targetUserDTO->setLastName($userArr[0]->last_name);
            return $targetUserDTO;
        }
        return null;
    }

    public $timestamps = true;
    protected $table = 'einvoice_simplified_invoice_line';

}
