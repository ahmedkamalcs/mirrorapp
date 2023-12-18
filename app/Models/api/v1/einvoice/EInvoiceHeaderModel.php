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
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use App\Http\Controllers\api\v1\tax\bo\BTax;
use App\Models\api\v1\vendor\ItemMasterModel;
use App\Models\api\v1\vendor\ItemVendorModel;
use App\Http\Controllers\api\v1\dto\ItemVendorDTO;
use App\Http\Controllers\api\v1\vendor\bo\BVendorCommissionTransaction;
use App\Http\Controllers\api\v1\einvoice\bo\BEInvoiceHeader;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;
use App\Models\api\v1\companyprofile\CompanyProfile;

/**
 * @author ISG
 */
class EInvoiceHeaderModel extends Model implements ModelInterface {

    public function saveObject(EInvoiceHeaderDTO $einvoiceHeaderDTO) {

        $sysSeriesDTO = BSystemSeries::getEInvoiceNumberSeries();
        $this->fillInDTO($einvoiceHeaderDTO, $sysSeriesDTO);

        $this->save();
        $einvoiceHeaderDTO->setId($this->id);

        //Save E-Invoice Series
        BSystemSeries::updateSeries($sysSeriesDTO);

        return $this;
    }

    private function fillInDTO(EInvoiceHeaderDTO $einvoiceHeaderDTO, $sysSeriesDTO) {
        //E-Invoice Template.
        $this->invoice_id = $einvoiceHeaderDTO->getInvoiceId(); //$sysSeriesDTO->getLastNumber(); //TODO Connect Invoice with E-Invoice numbering
        $this->header_invoice_number = BEInvoiceHeader::getFormatedNumberSeries(BSystemSeries::getEInvoiceNumberSeries()); //BSystemSeries::getEInvoiceNumberSeries();//$einvoiceHeaderDTO->getHeaderInvoiceNumber();
        $this->header_issue_date = $einvoiceHeaderDTO->getHeaderIssueDate();
        $this->header_date_of_supply = $einvoiceHeaderDTO->getHeaderDateOfSupply();
        $this->seller_name = $einvoiceHeaderDTO->getSellerName();
        $this->seller_building_no = $einvoiceHeaderDTO->getSellerBuildingNo();
        $this->seller_street_name = $einvoiceHeaderDTO->getSellerStreetName();
        $this->seller_district = $einvoiceHeaderDTO->getSellerDistrict();
        $this->seller_city = $einvoiceHeaderDTO->getSellerCity();
        $this->seller_country = $einvoiceHeaderDTO->getSellerCountry();
        $this->seller_postal_code = $einvoiceHeaderDTO->getSellerPostalCode();
        $this->seller_additional_no = $einvoiceHeaderDTO->getSellerAdditionalNo();
        $this->seller_vat_number = $einvoiceHeaderDTO->getSellerVatNumber();
        $this->seller_other_seller_id = $einvoiceHeaderDTO->getSellerOtherSellerId();


        //B2C E-Invoice.
        $this->supplier_vat_no = $einvoiceHeaderDTO->getSupplierVATNO();
        $this->order_no = $einvoiceHeaderDTO->getOrderNo();
        $this->company_name = $einvoiceHeaderDTO->getCompanyName();
        $this->customer_name = $einvoiceHeaderDTO->getCustomerName();
        $this->customer_address = $einvoiceHeaderDTO->getCustomerAddress();
        $this->trans_type = $einvoiceHeaderDTO->getTransType();
        $this->vat_rate = $einvoiceHeaderDTO->getVatRate();
        $this->other_fees = $einvoiceHeaderDTO->getOtherFees();
        $this->total_amount_excluding_vat = $einvoiceHeaderDTO->getTotalWithoutTax();
        $this->vat_amount = $einvoiceHeaderDTO->getTotalVAT();
        $this->total_amount_including_vat = $einvoiceHeaderDTO->getTotalWithTax();

        $this->invoice_url = $einvoiceHeaderDTO->getInvoiceURL();
        $this->customer_vat_no = $einvoiceHeaderDTO->getCustomerVatNo();
        $this->einvoice_type = $einvoiceHeaderDTO->getEinvoiceType();
        $this->einvoice_no = $einvoiceHeaderDTO->getInvoiceNumber();
        $this->invoice_status = $einvoiceHeaderDTO->getEinvoiceStatus();

        $this->total_discount = $einvoiceHeaderDTO->getTotalDiscount();
//        $this->fillInCompanyCode();
        CompanyProfile::fillInCompanyCode($this);
        
       
    }

//    private function fillInCompanyCode() {
//        //fill in company profile data
//        $this->company_code = 0;
//        $bCompanyProfile = new BCompanyProfile();
//        $companyCode = $bCompanyProfile->getActiveCompanyCode();
//        $this->company_code = $companyCode;
//    }

//    public static function getFormatedNumberSeries($sysSeriesDTO)
//    {
//        //Format Series for E-Invoice.
//        $nextInvoiceId = "2200" . $sysSeriesDTO->getLastNumber();//TODO change 2200 to dynamic value in DB.
//        return $nextInvoiceId;
//    }

    public function getDTOById(EInvoiceHeaderDTO $einvoiceHeaderDTO) {
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $object = EInvoiceHeaderModel::where('id', $einvoiceHeaderDTO->getId())->get();


        if ($object->isNotEmpty()) {
            $this->fillinEInvoice($object, $einvoiceHeaderDTO);
        } else {
            $einvoiceHeaderDTO = null;
        }

        return $einvoiceHeaderDTO;
    }

    public function getDTOByEInvoiceId($id) {
        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $object = EInvoiceHeaderModel::where('header_invoice_number', $id)->get();


        if ($object->isNotEmpty()) {
            $this->fillinEInvoice($object, $einvoiceHeaderDTO);
        } else {
            $einvoiceHeaderDTO = null;
        }

        return $einvoiceHeaderDTO;
    }

    public function listAllInvoices() {

        $bCompanyProfile = new BCompanyProfile();
        $companyCode = $bCompanyProfile->getActiveCompanyCode();

        $query = "select * from einvoice_simplified_invoice_header where company_code = '" . $companyCode . "'";
        $userOtpArr = DBUtil::select($query);
        if ($userOtpArr) {
            return $userOtpArr;
        }
        return null;
    }
    

    public function listAllInvoicesByInvoiceType($invoiceType) {

        $bCompanyProfile = new BCompanyProfile();
        $companyCode = $bCompanyProfile->getActiveCompanyCode();


//        $query = "select * from einvoice_simplified_invoice_header where einvoice_type ='" . $invoiceType . "' and  company_code = '" . $companyCode . "'";
        $query = "SELECT *, ".
                    " ( CASE WHEN invoice_status = 'Active' ".
                    " THEN 'data_active' ".
                    " WHEN invoice_status = 'Void' ".
                    " THEN 'data_void' ".
                    " WHEN invoice_status = 'Paid' ".
                    " THEN 'data_paid' ".
                    " WHEN invoice_status = 'Not Paid' ".
                    " THEN 'data_Npaid' ELSE 'data_active' ".
                    " END) AS invoicestyle from einvoice_simplified_invoice_header".
                    " where einvoice_type ='" . $invoiceType . "' and  company_code = '" . $companyCode . "'";
                    
        $userOtpArr = DBUtil::select($query);
        if ($userOtpArr) {
            return $userOtpArr;
        }
        return null;
    }

    public function getInvoiceLinesArrbyHeaderId($id) {
        if($id == null){
            return array();
        }
        $invoiceLineArr = EInvoiceLineModel::where('einvoice_simplified_invoice_header_id', $id)->get();
        if ($invoiceLineArr->isNotEmpty()) {
            return $invoiceLineArr;
        } else {
            return array();
        }
    }

    private function fillinEInvoice($eInvoiceArr, EInvoiceHeaderDTO $einvoiceHeaderDTO) {
        $einvoiceHeaderDTO->setId($eInvoiceArr[0]->id);
//        $einvoiceHeaderDTO->setInvoiceId($eInvoiceArr[0]->invoice_id);//TODO Change to invoice number. Order to Invoice.
        $einvoiceHeaderDTO->setHeaderInvoiceNumber($eInvoiceArr[0]->header_invoice_number);
        $einvoiceHeaderDTO->setHeaderIssueDate($eInvoiceArr[0]->header_issue_date);
        $einvoiceHeaderDTO->setHeaderDateOfSupply($eInvoiceArr[0]->header_date_of_supply);
        $einvoiceHeaderDTO->setSellerName($eInvoiceArr[0]->seller_name);
        $einvoiceHeaderDTO->setSellerBuildingNo($eInvoiceArr[0]->seller_building_no);
        $einvoiceHeaderDTO->setSellerStreetName($eInvoiceArr[0]->seller_street_name);
        $einvoiceHeaderDTO->setSellerDistrict($eInvoiceArr[0]->seller_district);
        $einvoiceHeaderDTO->setSellerCity($eInvoiceArr[0]->seller_city);
        $einvoiceHeaderDTO->setSellerCountry($eInvoiceArr[0]->seller_country);
        $einvoiceHeaderDTO->setSellerPostalCode($eInvoiceArr[0]->seller_postal_code);
        $einvoiceHeaderDTO->setSellerAdditionalNo($eInvoiceArr[0]->seller_additional_no);
        $einvoiceHeaderDTO->setSellerVatNumber($eInvoiceArr[0]->seller_vat_number);
        $einvoiceHeaderDTO->setSellerOtherSellerId($eInvoiceArr[0]->seller_other_seller_id);
        $einvoiceHeaderDTO->setCreatedAt($eInvoiceArr[0]->created_at);
        $einvoiceHeaderDTO->setUpdatedAt($eInvoiceArr[0]->updated_at);

        //B2C E-Invoice.
        $einvoiceHeaderDTO->setSupplierVATNO($eInvoiceArr[0]->supplier_vat_no);
        $einvoiceHeaderDTO->setOrderNo($eInvoiceArr[0]->order_no);
        $einvoiceHeaderDTO->setCompanyName($eInvoiceArr[0]->company_name);
        $einvoiceHeaderDTO->setCustomerName($eInvoiceArr[0]->customer_name);
        $einvoiceHeaderDTO->setCustomerAddress($eInvoiceArr[0]->customer_address);
        $einvoiceHeaderDTO->setTransType($eInvoiceArr[0]->trans_type);
        $einvoiceHeaderDTO->setVatRate($eInvoiceArr[0]->vat_rate);
        $einvoiceHeaderDTO->setOtherFees($eInvoiceArr[0]->other_fees);
        $einvoiceHeaderDTO->setTotalWithoutTax($eInvoiceArr[0]->total_amount_excluding_vat);
        $einvoiceHeaderDTO->setTotalVAT($eInvoiceArr[0]->vat_amount);
        $einvoiceHeaderDTO->setTotalWithTax($eInvoiceArr[0]->total_amount_including_vat);

        $einvoiceHeaderDTO->setInvoiceURL($eInvoiceArr[0]->invoice_url);
        $einvoiceHeaderDTO->setCustomerVatNo($eInvoiceArr[0]->customer_vat_no);

        $einvoiceHeaderDTO->setEinvoiceStatus($eInvoiceArr[0]->invoice_status);
        
        $einvoiceHeaderDTO->setTotalDiscount($eInvoiceArr[0]->total_discount);
        $einvoiceHeaderDTO->setInvoiceNumber($eInvoiceArr[0]->einvoice_no);

//        $this->fillInCompanyCode();
        if($einvoiceHeaderDTO->getApiCall() == AppDTO::$FALSE_AS_STRING){//Web Call
            CompanyProfile::fillInCompanyCode($this);
        }
    }

    public function getInvoiceIdbyEInvoiceNymber(EInvoiceHeaderDTO $eInvoiceHeaderDTO) {
        $query = "select id from einvoice_simplified_invoice_header where einvoice_no = " . $eInvoiceHeaderDTO->getInvoiceNumber();
        $userOtpArr = DBUtil::select($query);
        if ($userOtpArr) {
            return $userOtpArr[0]->id;
        }
        return null;
    }
    
    public function updateTotalAmounts(EInvoiceHeaderDTO $eInvoiceHeaderDTO /* $id, $totalAmountExcludingVat, $vatAmount, $totalAmountIncludingVat*/ ){
        
        
        
        DBUtil::updateColumnsById($this->table, $eInvoiceHeaderDTO->getId(), 'total_amount_excluding_vat', 'vat_amount', 'total_amount_including_vat', 'total_discount', 
                round($eInvoiceHeaderDTO->getTotalWithoutTax(), 2), round( $eInvoiceHeaderDTO->getTotalVAT(), 2), round( $eInvoiceHeaderDTO->getTotalWithTax(), 2), round( $eInvoiceHeaderDTO->getTotalDiscount(), 2));
    }

    public $timestamps = true;
    protected $table = 'einvoice_simplified_invoice_header';

}
