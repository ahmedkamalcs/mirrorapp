<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use App\Http\Controllers\api\v1\einvoice\bo\BEInvoiceHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Controllers\api\v1\sys\bo\BSystemSeries;
use App\Http\Controllers\api\v1\einvoice\bo\BEInvoiceLine;
use App\Http\Controllers\api\v1\dto\EInvoiceLineDTO;
use App\Http\Controllers\isgapi\api\v1\util\DateUtil;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Requests\EInvoiceRequest;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;
use App\Http\Controllers\api\v1\dto\CompanyProfileDTO;
use App\Models\api\v1\companyprofile\CompanyProfile;
use App\Http\Controllers\api\v1\util\DBUtil;

class EinvoiceWebController extends BaseController {

    public function index() {
        return view('apsweb');
    }

    public function initInvoice($eInvoiceId) {
        //TODO. Code Binding Here!
        $bEInvoiceHeader = new BEInvoiceHeader();
        $einvoiceHeaderDTO = $bEInvoiceHeader->getDTOById($eInvoiceId);

        if ($einvoiceHeaderDTO == null) {
            $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
            $einvoiceHeaderDTO->setId(null);
        }

        return view('b2cinvoice', compact('einvoiceHeaderDTO'));
    }

    public function initEInvoice($eInvoiceId) {
        //TODO. Code Binding Here!
        $bEInvoiceHeader = new BEInvoiceHeader();
        $einvoiceHeaderDTO = $bEInvoiceHeader->getDTOById($eInvoiceId);

        if ($einvoiceHeaderDTO == null) {
            $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
            $einvoiceHeaderDTO->setId(null);
        }
        return view('b2ceinvoice', compact('einvoiceHeaderDTO'));
    }

    public function listInvoicesB2B() {
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
//        $einvoiceHeaderDTO->setHeaderInvoiceNumber("AAAA900");
//
        $bEInvoiceHeader = new BEInvoiceHeader();
        $einvoiceArr = $bEInvoiceHeader->listAllInvoicesByInvoiceType(AppDTO::$EINVOICE_TYPE_B2B);

        return view('pages.einvoiceb2b', compact('einvoiceArr'));
    }

    public function listInvoicesB2C() {
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
//        $einvoiceHeaderDTO->setHeaderInvoiceNumber("AAAA900");
//
        $bEInvoiceHeader = new BEInvoiceHeader();
        $einvoiceArr = $bEInvoiceHeader->listAllInvoicesByInvoiceType(AppDTO::$EINVOICE_TYPE_B2C);

        return view('pages.einvoiceb2c', compact('einvoiceArr'));
    }

    public function initEInvoiceInDashboardB2B($eInvoiceId) {
        $bEInvoiceHeader = new BEInvoiceHeader();
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $einvoiceHeaderDTO = $bEInvoiceHeader->getDTOByEInvoiceId($eInvoiceId);

        $einvoiceHeaderDTO->setCreditNote(AppDTO::$FALSE_AS_STRING);
        
        if ($einvoiceHeaderDTO == null) {
            $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
            $einvoiceHeaderDTO->setId(null);
        }
        return view('b2beinvoice', compact('einvoiceHeaderDTO'));
    }
    
    public function initCreditNoteB2B($eInvoiceId) {
        $bEInvoiceHeader = new BEInvoiceHeader();
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $einvoiceHeaderDTO = $bEInvoiceHeader->getDTOByEInvoiceId($eInvoiceId);
 
        $einvoiceHeaderDTO->setCreditNote(AppDTO::$TRUE_AS_STRING);
        
        if ($einvoiceHeaderDTO == null) {
            $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
            $einvoiceHeaderDTO->setId(null);
        }
        return view('b2beinvoice', compact('einvoiceHeaderDTO'));
    }
    
    public function initCreditNoteB2C($eInvoiceId) {
        $bEInvoiceHeader = new BEInvoiceHeader();
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $einvoiceHeaderDTO = $bEInvoiceHeader->getDTOByEInvoiceId($eInvoiceId);
 
        $einvoiceHeaderDTO->setCreditNote(AppDTO::$TRUE_AS_STRING);
        
        if ($einvoiceHeaderDTO == null) {
            $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
            $einvoiceHeaderDTO->setId(null);
        }
        return view('b2beinvoice', compact('einvoiceHeaderDTO'));
    }

    public function initEInvoiceInDashboardB2C($eInvoiceId) {
        $bEInvoiceHeader = new BEInvoiceHeader();
        $einvoiceHeaderDTO = $bEInvoiceHeader->getDTOByEInvoiceId($eInvoiceId);

        if ($einvoiceHeaderDTO == null) {
            $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
            $einvoiceHeaderDTO->setId(null);
        }
        return view('b2ceinvoice', compact('einvoiceHeaderDTO'));
    }

    public function importInvoicesFromExcelB2B(Request $request) {

//        $this->validate($request, [
//            'uploaded_file' => 'required|file|mimes:xls,xlsx'
//        ]);
        $the_file = $request->file('uploaded_file');

        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $row_limit = $sheet->getHighestDataRow();
//            $column_limit = $sheet->getHighestDataColumn();
            $row_range = range(2, $row_limit);
//            $column_range = range('A', $column_limit);
            $startcount = 2;
            $data = array();
//            echo count($row_range);
//            die;
            $bCompanyProfile = new BCompanyProfile();
            $companyProfileDTO = $bCompanyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());

            //Totals
            $totalAmountExcludingVat = 0.0;
            $totalVatAmount = 0.0;
            $totalAmountIncludingVat = 0.0;
            $totalDiscount = 0.0;

            foreach ($row_range as $row) {
//                $data[] = [
//                    'header_invoice_number' => BEInvoiceHeader::getFormatedNumberSeries(BSystemSeries::getEInvoiceNumberSeries()),
//                    'seller_name' => $sheet->getCell('A' . $row)->getValue(),
//                    'seller_building_no' => $sheet->getCell('B' . $row)->getValue()
//                $data[] = ['seller_name' => $sheet->getCell('A' . $row)->getValue()];
//                echo \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($sheet->getCell('A' . $row)->getValue());
////                print_r($data);
////                echo $row;
//                die;


                $eInvoiceLineDTO = $this->fillInInvoiceDataAndSaveB2B($sheet, $row, $companyProfileDTO);
//                break;
//                ];

                $totalAmountExcludingVat = $totalAmountExcludingVat + $eInvoiceLineDTO->getAmountAfterDiscount();
                $totalVatAmount = $totalVatAmount + $eInvoiceLineDTO->getTaxAmount();
                $totalAmountIncludingVat = $totalAmountIncludingVat + $eInvoiceLineDTO->getGrossAmount();
                $totalDiscount = $totalDiscount + $eInvoiceLineDTO->getDiscount();

                $startcount++;
            }
//            die;
//            DB::table('einvoice_simplified_invoice_header')->insert($data);
            //Update Header 
            /*
              Total Amount Excluding VAT = Total Taxable Amount
              Vat Amount = Total Vat Amount
              Total Amount Including VAT = Total Gross Amount
             */

            $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();

            $eInvoiceHeaderDTO->setId($eInvoiceLineDTO->getEinvoiceHeaderId());
            $eInvoiceHeaderDTO->setTotalWithoutTax($totalAmountExcludingVat);
            $eInvoiceHeaderDTO->setTotalVAT($totalVatAmount);
            $eInvoiceHeaderDTO->setTotalWithTax($totalAmountIncludingVat);
            $eInvoiceHeaderDTO->setTotalDiscount($totalDiscount);

            $bEInvoiceHeader = new BEInvoiceHeader();
            $bEInvoiceHeader->updateTotalAmounts($eInvoiceHeaderDTO);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }

    public function importInvoicesFromExcelB2C(Request $request) {

//        $this->validate($request, [
//            'uploaded_file' => 'required|file|mimes:xls,xlsx'
//        ]);
        $the_file = $request->file('uploaded_file');

        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $row_limit = $sheet->getHighestDataRow();
//            $column_limit = $sheet->getHighestDataColumn();
            $row_range = range(2, $row_limit);
//            $column_range = range('A', $column_limit);
            $startcount = 2;
            $data = array();
//            echo count($row_range);
//            die;
            $bCompanyProfile = new BCompanyProfile();
            $companyProfileDTO = $bCompanyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());

            //Totals
            $totalAmountExcludingVat = 0.0;
            $totalVatAmount = 0.0;
            $totalAmountIncludingVat = 0.0;
            $totalDiscount = 0.0;

            foreach ($row_range as $row) {
//                $data[] = [
//                    'header_invoice_number' => BEInvoiceHeader::getFormatedNumberSeries(BSystemSeries::getEInvoiceNumberSeries()),
//                    'seller_name' => $sheet->getCell('A' . $row)->getValue(),
//                    'seller_building_no' => $sheet->getCell('B' . $row)->getValue()
//                $data[] = ['seller_name' => $sheet->getCell('A' . $row)->getValue()];
//                echo \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($sheet->getCell('A' . $row)->getValue());
////                print_r($data);
////                echo $row;
//                die;


                $eInvoiceLineDTO = $this->fillInInvoiceDataAndSaveB2C($sheet, $row, $companyProfileDTO);
//                break;
//                ];

                $totalAmountExcludingVat = $totalAmountExcludingVat + $eInvoiceLineDTO->getAmountAfterDiscount();
                $totalVatAmount = $totalVatAmount + $eInvoiceLineDTO->getTaxAmount();
                $totalAmountIncludingVat = $totalAmountIncludingVat + $eInvoiceLineDTO->getGrossAmount();
                $totalDiscount = $totalDiscount + $eInvoiceLineDTO->getDiscount();

                $startcount++;
            }
//            die;
//            DB::table('einvoice_simplified_invoice_header')->insert($data);
            //Update Header 
            /*
              Total Amount Excluding VAT = Total Taxable Amount
              Vat Amount = Total Vat Amount
              Total Amount Including VAT = Total Gross Amount
             */

            $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();

            $eInvoiceHeaderDTO->setId($eInvoiceLineDTO->getEinvoiceHeaderId());
            $eInvoiceHeaderDTO->setTotalWithoutTax($totalAmountExcludingVat);
            $eInvoiceHeaderDTO->setTotalVAT($totalVatAmount);
            $eInvoiceHeaderDTO->setTotalWithTax($totalAmountIncludingVat);
            $eInvoiceHeaderDTO->setTotalDiscount($totalDiscount);

            $bEInvoiceHeader = new BEInvoiceHeader();
            $bEInvoiceHeader->updateTotalAmounts($eInvoiceHeaderDTO);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }

    private function fillInInvoiceDataAndSaveB2B($sheet, $row, CompanyProfileDTO $companyProfileDTO) {
        //Validate
//        if ( $sheet->getCell('A' . $row)->getValue() == null )
//        {
//            return;
//        }
        //Save Invoice Header
        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        // $eInvoiceHeaderDTO->setEinvoiceStatus(AppDTO::$EINVOICE_STATUS_ACTIVE);//EInvoice Is Active By Default
//        $eInvoiceHeaderDTO->setHeaderIssueDate($sheet->getCell('A' . $row)->getValue());//TODO Format Date
//        $time = strtotime($sheet->getCell('A' . $row)->getValue());
////        $newformat = date('Y-m-d', $time);
//        echo $time; die;
        $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($sheet->getCell('A' . $row)->getValue());
        $eInvoiceHeaderDTO->setHeaderIssueDate($date);

        $eInvoiceHeaderDTO->setSupplierVATNO($sheet->getCell('B' . $row)->getValue());
        $eInvoiceHeaderDTO->setInvoiceNumber($sheet->getCell('C' . $row)->getValue());
        $eInvoiceHeaderDTO->setInvoiceURL(AppDTO::$EINVOICE_URL);

        $eInvoiceHeaderDTO->setEinvoiceType(AppDTO::$EINVOICE_TYPE_B2B);

        $eInvoiceHeaderDTO->setOrderNo($sheet->getCell('D' . $row)->getValue());
//        $eInvoiceHeaderDTO->setCompanyName($sheet->getCell('E' . $row)->getValue());
        $eInvoiceHeaderDTO->setCompanyName($companyProfileDTO->getBusinessName());
        $eInvoiceHeaderDTO->setCustomerName($sheet->getCell('E' . $row)->getValue());
        $eInvoiceHeaderDTO->setCustomerAddress($sheet->getCell('F' . $row)->getValue());
        $eInvoiceHeaderDTO->setCustomerVatNo($sheet->getCell('G' . $row)->getValue());
        $eInvoiceHeaderDTO->setTransType($sheet->getCell('H' . $row)->getValue());
//        $eInvoiceHeaderDTO->setVatRate($sheet->getCell('J' . $row)->getValue());
        $eInvoiceHeaderDTO->setVatRate($companyProfileDTO->getVatRate());
//        $eInvoiceHeaderDTO->setOtherFees($sheet->getCell('I' . $row)->getValue()); //Like Discount at header
        $eInvoiceHeaderDTO->setEinvoiceStatus($sheet->getCell('J' . $row)->getValue());
//        $eInvoiceHeaderDTO->setTotalWithoutTax($request->totalAmountExcludingVat); //Calculated
//        $eInvoiceHeaderDTO->setTotalVAT($request->vatAmount);//Calculated
//        $eInvoiceHeaderDTO->setTotalWithTax($request->totalAmountIncluingVat);//Calculated

        $bEInvoiceHeader = new BEInvoiceHeader();

        if ($this->invoiceNumber != $eInvoiceHeaderDTO->getInvoiceNumber()) {
            $this->invoiceNumber = $eInvoiceHeaderDTO->getInvoiceNumber();
            $invoiceHeaderObj = $bEInvoiceHeader->saveObjectReturnObj($eInvoiceHeaderDTO);
            $this->invoiceHeaderId = $invoiceHeaderObj->id;
        }

//        //Totals
//        $totalAmountExcludingVat = 0.0;
//        $totalVatAmount = 0.0;
//        $totalAmountIncludingVat = 0.0;
        //Save Invoice Lines.
        //Get Invoice Id.
//        $eInvoiceHeaderId = $invoiceHeaderObj->id;
        $eInvoiceHeaderId = $this->invoiceHeaderId;
//        echo $invoiceId;
//        die;

        $eInvoiceLineDTO = new EInvoiceLineDTO();
        $eInvoiceLineDTO->setItemName($sheet->getCell('K' . $row)->getValue());
        $eInvoiceLineDTO->setItemId($sheet->getCell('L' . $row)->getValue());
        $eInvoiceLineDTO->setUnitPrice($sheet->getCell('M' . $row)->getValue());
        $eInvoiceLineDTO->setQuantity($sheet->getCell('N' . $row)->getValue());
//        $eInvoiceLineDTO->setTaxableAmount($sheet->getCell('O' . $row)->getValue());//D Enhancement

        $eInvoiceLineDTO->setDiscount($sheet->getCell('P' . $row)->getValue());
//        $eInvoiceLineDTO->setTaxRate($sheet->getCell('S' . $row)->getValue());
        $eInvoiceLineDTO->setTaxableAmount($sheet->getCell('M' . $row)->getValue() * $sheet->getCell('N' . $row)->getValue()); //A Taxable amount = Gross Amount = Unit Price * Quantity

        $discount = 0.0;
        if ($eInvoiceLineDTO->getDiscount() != 0) {
            if ($eInvoiceLineDTO->getDiscount() < 1) {//Percent
                $discount = $eInvoiceLineDTO->getDiscount() * $eInvoiceLineDTO->getTaxableAmount();
            } else {//Value
                $discount = $eInvoiceLineDTO->getDiscount();
            }
        }

        $eInvoiceLineDTO->setAmountAfterDiscount($eInvoiceLineDTO->getTaxableAmount() - $discount);

        $eInvoiceLineDTO->setTaxRate($eInvoiceHeaderDTO->getVatRate());
//        $eInvoiceLineDTO->setTaxAmount($sheet->getCell('Q' . $row)->getValue());//D
        $eInvoiceLineDTO->setTaxAmount($eInvoiceLineDTO->getAmountAfterDiscount() * $eInvoiceLineDTO->getTaxRate()); //A Tax Amount = Gross Amount * VAT Rate
//        $eInvoiceLineDTO->setCurency($sheet->getCell('U' . $row)->getValue());
        //Enhancemment
        $eInvoiceLineDTO->setGrossAmount($eInvoiceLineDTO->getAmountAfterDiscount() + $eInvoiceLineDTO->getTaxAmount());

        $eInvoiceLineDTO->setCurency($companyProfileDTO->getCurrency());
        $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);

        $bEInvoiceLine = new BEInvoiceLine();
        $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO);

        //Update Header 
        /*
          Total Amount Excluding VAT = Total Taxable Amount
          Vat Amount = Total Vat Amount
          Total Amount Including VAT = Total Gross Amount
         */



//        $eInvoiceHeaderDTO->setId($eInvoiceHeaderId);
//        $eInvoiceHeaderDTO->setTotalAmountExcludingVat($totalAmountExcludingVat);
//        $eInvoiceHeaderDTO->setTotalVatAmount($totalVatAmount);
//        $eInvoiceHeaderDTO->setTotalAmountIncludingVat($totalAmountIncludingVat);

        return $eInvoiceLineDTO;
    }

    private function fillInInvoiceDataAndSaveB2C($sheet, $row, CompanyProfileDTO $companyProfileDTO) {
        //Validate
//        if ( $sheet->getCell('A' . $row)->getValue() == null )
//        {
//            return;
//        }
        //Save Invoice Header
        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        // $eInvoiceHeaderDTO->setEinvoiceStatus(AppDTO::$EINVOICE_STATUS_ACTIVE);//EInvoice Is Active By Default
//        $eInvoiceHeaderDTO->setHeaderIssueDate($sheet->getCell('A' . $row)->getValue());//TODO Format Date
//        $time = strtotime($sheet->getCell('A' . $row)->getValue());
////        $newformat = date('Y-m-d', $time);
//        echo $time; die;
        $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($sheet->getCell('A' . $row)->getValue());
        $eInvoiceHeaderDTO->setHeaderIssueDate($date);

        $eInvoiceHeaderDTO->setSupplierVATNO($sheet->getCell('B' . $row)->getValue());
        $eInvoiceHeaderDTO->setInvoiceNumber($sheet->getCell('C' . $row)->getValue());
        $eInvoiceHeaderDTO->setInvoiceURL(AppDTO::$EINVOICE_URL_B2C);

        $eInvoiceHeaderDTO->setEinvoiceType(AppDTO::$EINVOICE_TYPE_B2C);

        $eInvoiceHeaderDTO->setOrderNo($sheet->getCell('D' . $row)->getValue());
//        $eInvoiceHeaderDTO->setCompanyName($sheet->getCell('E' . $row)->getValue());
        $eInvoiceHeaderDTO->setCompanyName($companyProfileDTO->getBusinessName());
        $eInvoiceHeaderDTO->setCustomerName($sheet->getCell('E' . $row)->getValue());
        $eInvoiceHeaderDTO->setCustomerAddress($sheet->getCell('F' . $row)->getValue());
        $eInvoiceHeaderDTO->setCustomerVatNo($sheet->getCell('G' . $row)->getValue());
        $eInvoiceHeaderDTO->setTransType($sheet->getCell('H' . $row)->getValue());
//        $eInvoiceHeaderDTO->setVatRate($sheet->getCell('J' . $row)->getValue());
        $eInvoiceHeaderDTO->setVatRate($companyProfileDTO->getVatRate());
//        $eInvoiceHeaderDTO->setOtherFees($sheet->getCell('I' . $row)->getValue()); //Like Discount at header
        $eInvoiceHeaderDTO->setEinvoiceStatus($sheet->getCell('J' . $row)->getValue());
//        $eInvoiceHeaderDTO->setTotalWithoutTax($request->totalAmountExcludingVat); //Calculated
//        $eInvoiceHeaderDTO->setTotalVAT($request->vatAmount);//Calculated
//        $eInvoiceHeaderDTO->setTotalWithTax($request->totalAmountIncluingVat);//Calculated

        $bEInvoiceHeader = new BEInvoiceHeader();

        if ($this->invoiceNumber != $eInvoiceHeaderDTO->getInvoiceNumber()) {
            $this->invoiceNumber = $eInvoiceHeaderDTO->getInvoiceNumber();
            $invoiceHeaderObj = $bEInvoiceHeader->saveObjectReturnObj($eInvoiceHeaderDTO);
            $this->invoiceHeaderId = $invoiceHeaderObj->id;
        }

//        //Totals
//        $totalAmountExcludingVat = 0.0;
//        $totalVatAmount = 0.0;
//        $totalAmountIncludingVat = 0.0;
        //Save Invoice Lines.
        //Get Invoice Id.
//        $eInvoiceHeaderId = $invoiceHeaderObj->id;
        $eInvoiceHeaderId = $this->invoiceHeaderId;
//        echo $invoiceId;
//        die;

        $eInvoiceLineDTO = new EInvoiceLineDTO();
        $eInvoiceLineDTO->setItemName($sheet->getCell('K' . $row)->getValue());
        $eInvoiceLineDTO->setItemId($sheet->getCell('L' . $row)->getValue());
        $eInvoiceLineDTO->setUnitPrice($sheet->getCell('M' . $row)->getValue());
        $eInvoiceLineDTO->setQuantity($sheet->getCell('N' . $row)->getValue());
//        $eInvoiceLineDTO->setTaxableAmount($sheet->getCell('O' . $row)->getValue());//D Enhancement

        $eInvoiceLineDTO->setDiscount($sheet->getCell('P' . $row)->getValue());
//        $eInvoiceLineDTO->setTaxRate($sheet->getCell('S' . $row)->getValue());
        $eInvoiceLineDTO->setTaxableAmount($sheet->getCell('M' . $row)->getValue() * $sheet->getCell('N' . $row)->getValue()); //A Taxable amount = Gross Amount = Unit Price * Quantity

        $discount = 0.0;
        if ($eInvoiceLineDTO->getDiscount() != 0) {
            if ($eInvoiceLineDTO->getDiscount() < 1) {//Percent
                $discount = $eInvoiceLineDTO->getDiscount() * $eInvoiceLineDTO->getTaxableAmount();
            } else {//Value
                $discount = $eInvoiceLineDTO->getDiscount();
            }
        }

        $eInvoiceLineDTO->setAmountAfterDiscount($eInvoiceLineDTO->getTaxableAmount() - $discount);

        $eInvoiceLineDTO->setTaxRate($eInvoiceHeaderDTO->getVatRate());
//        $eInvoiceLineDTO->setTaxAmount($sheet->getCell('Q' . $row)->getValue());//D
        $eInvoiceLineDTO->setTaxAmount($eInvoiceLineDTO->getAmountAfterDiscount() * $eInvoiceLineDTO->getTaxRate()); //A Tax Amount = Gross Amount * VAT Rate
//        $eInvoiceLineDTO->setCurency($sheet->getCell('U' . $row)->getValue());
        //Enhancemment
        $eInvoiceLineDTO->setGrossAmount($eInvoiceLineDTO->getAmountAfterDiscount() + $eInvoiceLineDTO->getTaxAmount());

        $eInvoiceLineDTO->setCurency($companyProfileDTO->getCurrency());
        $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);

        $bEInvoiceLine = new BEInvoiceLine();
        $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO);

        //Update Header 
        /*
          Total Amount Excluding VAT = Total Taxable Amount
          Vat Amount = Total Vat Amount
          Total Amount Including VAT = Total Gross Amount
         */



//        $eInvoiceHeaderDTO->setId($eInvoiceHeaderId);
//        $eInvoiceHeaderDTO->setTotalAmountExcludingVat($totalAmountExcludingVat);
//        $eInvoiceHeaderDTO->setTotalVatAmount($totalVatAmount);
//        $eInvoiceHeaderDTO->setTotalAmountIncludingVat($totalAmountIncludingVat);

        return $eInvoiceLineDTO;
    }

    public function addInvoice() {
        return view('pages.einvoiceadd');
    }

    public function addInvoiceB2B() {
        return view('pages.einvoiceaddb2b');
    }

    private function AddNewInvoiceHeader(Request $request) {

        $this->addInvoiceHeader($request);

        //Save Invoice Lines.
        //Get Invoice Id.
//        $eInvoiceHeaderId = $invoiceHeaderObj->id;
//        $eInvoiceHeaderId = $this->invoiceHeaderId;
//        echo $invoiceId;
//        die;

        /*
          //Save InvoiceLines
          $eInvoiceLineDTO = new EInvoiceLineDTO();
          $eInvoiceLineDTO->setItemName($request->itemname);
          //        $eInvoiceLineDTO->setItemId($request->itemname);
          $eInvoiceLineDTO->setUnitPrice($request->unitprice);
          $eInvoiceLineDTO->setQuantity($request->quantity);
          $eInvoiceLineDTO->setTaxableAmount($request->taxableamount);
          //        $eInvoiceLineDTO->setDiscount($request->taxableamount);
          $eInvoiceLineDTO->setTaxRate($request->taxrate);
          $eInvoiceLineDTO->setTaxAmount($request->taxamount);
          $eInvoiceLineDTO->setCurency($request->currency);
          $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);

          $bEInvoiceLine = new BEInvoiceLine();
          $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO); */
    }

    private function isInvoiceExist(EInvoiceHeaderDTO $eInvoiceHeaderDTO) {
        $bEInvoiceHeader = new BEInvoiceHeader();
        $invoiceHeaderId = $bEInvoiceHeader->getInvoiceIdbyEInvoiceNymber($eInvoiceHeaderDTO);
        if ($invoiceHeaderId == null) {
            return false;
        }
        $this->invoiceHeaderId = $invoiceHeaderId;
        return true;
    }

    private function addInvoiceHeader(Request $request) {

        //Save Invoice Header
        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $eInvoiceHeaderDTO->setHeaderIssueDate(date("Y/m/d")); //TODO Handle the date comes from request.

        $eInvoiceHeaderDTO->setSupplierVATNO($request->suppliervatno);
        $eInvoiceHeaderDTO->setInvoiceNumber($request->invoiceno);

        if ($request->invoicetype == AppDTO::$EINVOICE_TYPE_B2C) {
            $eInvoiceHeaderDTO->setInvoiceURL(AppDTO::$EINVOICE_URL_B2C);
        } else {
            $eInvoiceHeaderDTO->setInvoiceURL(AppDTO::$EINVOICE_URL);
        }

        $eInvoiceHeaderDTO->setEinvoiceType($request->invoicetype);

        $eInvoiceHeaderDTO->setOrderNo($request->invoiceno);
        $eInvoiceHeaderDTO->setCompanyName($request->companyname);
        $eInvoiceHeaderDTO->setSupplierName($request->suppliername);
        $eInvoiceHeaderDTO->setSupplierAddress($request->supplieraddress);
        $eInvoiceHeaderDTO->setCompanyVatNo($request->companyvatno);
        $eInvoiceHeaderDTO->setTransType($request->transactiontype);
        $eInvoiceHeaderDTO->setVatRate($request->vatrate);
        $eInvoiceHeaderDTO->setOtherFees(0); //Like Discount
//        $eInvoiceHeaderDTO->setTotalWithoutTax($request->totalAmountExcludingVat); //Calculated
//        $eInvoiceHeaderDTO->setTotalVAT($request->vatAmount);//Calculated
//        $eInvoiceHeaderDTO->setTotalWithTax($request->totalAmountIncluingVat);//Calculated

        if (!$this->isInvoiceExist($eInvoiceHeaderDTO)) {
            $bEInvoiceHeader = new BEInvoiceHeader();
            $bEInvoiceHeader->saveObjectReturnObj($eInvoiceHeaderDTO);
        }

        if ($this->isInvoiceExist($eInvoiceHeaderDTO)) {
            $this->addInvoiceLine($request);
        }
//        if ($this->invoiceNumber != $eInvoiceHeaderDTO->getInvoiceNumber()) {
//            $this->invoiceNumber = $eInvoiceHeaderDTO->getInvoiceNumber();
//            $invoiceHeaderObj = $bEInvoiceHeader->saveObjectReturnObj($eInvoiceHeaderDTO);
//            $this->invoiceHeaderId = $invoiceHeaderObj->id;
//        }
    }

    private function addInvoiceLine(Request $request) {

        //Get Invoice Id from Database.
        //Save InvoiceLines
        $eInvoiceLineDTO = new EInvoiceLineDTO();
        $eInvoiceLineDTO->setItemName($request->itemname);
//        $eInvoiceLineDTO->setItemId($request->itemname);
        $eInvoiceLineDTO->setUnitPrice($request->unitprice);
        $eInvoiceLineDTO->setQuantity($request->quantity);
        $eInvoiceLineDTO->setTaxableAmount($request->taxableamount);
//        $eInvoiceLineDTO->setDiscount($request->taxableamount);
        $eInvoiceLineDTO->setTaxRate($request->taxrate);
        $eInvoiceLineDTO->setTaxAmount($request->taxamount);
        $eInvoiceLineDTO->setCurency($request->currency);
        $eInvoiceLineDTO->setEinvoiceHeaderId($this->invoiceHeaderId);

        $bEInvoiceLine = new BEInvoiceLine();
        $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO);
    }

    public function update(Request $request) {
//        auth()->user()->update($request->all());
        $this->AddNewInvoiceHeader($request);
        return back()->withStatus(__('EIncoice Successfully Added.'));
    }

    public function download($filename = '') {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() . "/app/downloads/" . $filename;
        $headers = array(
            'Content-Type: xlsx',
            'Content-Disposition: attachment; filename=' . $filename,
        );
        if (file_exists($file_path)) {
            // Send Download
            return \Response::download($file_path, $filename, $headers);
        } else {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }

    public function b2bEinvoiceWizard() {
//        $id = 60;
        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $einvoiceLineArr = $this->getInvoiceLinesArrbyHeaderId(null);
        $eInvoiceHeaderDTO->setEinvoiceLineArr($einvoiceLineArr);

        //Fill in Default Company Values.
        $this->fillinEinvoiceHeaderDTObyDefaultCompanyData($eInvoiceHeaderDTO);

        return view('pages.einvoiceb2bwizard', compact('eInvoiceHeaderDTO'));
    }

    public function b2cEinvoiceWizard() {
//        $id = 60;
        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $einvoiceLineArr = $this->getInvoiceLinesArrbyHeaderId(null);
        $eInvoiceHeaderDTO->setEinvoiceLineArr($einvoiceLineArr);

        //Fill in Default Company Values.
        $this->fillinEinvoiceHeaderDTObyDefaultCompanyData($eInvoiceHeaderDTO);

        return view('pages.einvoiceb2cwizard', compact('eInvoiceHeaderDTO'));
    }

    public function fillinEinvoiceHeaderDTObyDefaultCompanyData(EInvoiceHeaderDTO $eInvoiceHeaderDTO) {
        $bCompanyProfile = new BCompanyProfile();
        $companyProfileDTO = $bCompanyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());
        $eInvoiceHeaderDTO->setCurrency($companyProfileDTO->getCurrency());
        $eInvoiceHeaderDTO->setVatRate($companyProfileDTO->getVatRate());
        $eInvoiceHeaderDTO->setCompanyName($companyProfileDTO->getBusinessName());
        $eInvoiceHeaderDTO->setSupplierVATNO($companyProfileDTO->getVatNumber());

        return $eInvoiceHeaderDTO;
    }

    public function getInvoiceLinesArrbyHeaderId($id) {
        $bEInvoice = new BEInvoiceHeader();
        return $bEInvoice->getInvoiceLinesArrbyHeaderId($id);
    }

    public function b2bEinvoiceLineWizard(Request $request) {

        $invoiceHeaderId = $request->invoiceHeaderId;

        return view('pages.einvoiceb2linebwizard', compact('invoiceHeaderId'));
    }

    public function b2cEinvoiceLineWizard(Request $request) {

        $invoiceHeaderId = $request->invoiceHeaderId;

        return view('pages.einvoiceb2clinebwizard', compact('invoiceHeaderId'));
    }

    public function saveWizardEinvoiceB2B(Request $request) {

        //TODO Validate Here

        $eInvoiceHeaderDTO = $this->fillinAndSaveWizardEInvoiceB2BDTO($request);

        //TODO Handle. Routing.
//        $this->saveItemServiceByDto($itemMasterDTO);
////        return back()->withSuccess('Service Item is saved successfully!');
//        return $this->listItemServices();
//        $id = 60;
        $einvoiceLineArr = $this->getInvoiceLinesArrbyHeaderId($eInvoiceHeaderDTO->getId());
        $eInvoiceHeaderDTO->setEinvoiceLineArr($einvoiceLineArr);

        return view('pages.einvoiceb2bwizard', compact('eInvoiceHeaderDTO'));
        //return $eInvoiceHeaderDTO;
    }

    public function saveWizardEinvoiceB2C(Request $request) {

        //TODO Validate Here

        $eInvoiceHeaderDTO = $this->fillinAndSaveWizardEInvoiceB2CDTO($request);

        //TODO Handle. Routing.
//        $this->saveItemServiceByDto($itemMasterDTO);
////        return back()->withSuccess('Service Item is saved successfully!');
//        return $this->listItemServices();
//        $id = 60;
        $einvoiceLineArr = $this->getInvoiceLinesArrbyHeaderId($eInvoiceHeaderDTO->getId());
        $eInvoiceHeaderDTO->setEinvoiceLineArr($einvoiceLineArr);

        return view('pages.einvoiceb2cwizard', compact('eInvoiceHeaderDTO'));
        //return $eInvoiceHeaderDTO;
    }

    public function saveWizardEinvoiceLineB2B(Request $request) {

//        echo $request->invoiceHeaderId; die;

        $invoiceHeaderId = $request->invoiceHeaderId;

        //Get Invoice Header DTO by ID.
        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $bEinvoiceHeader = new BEInvoiceHeader();
        $eInvoiceHeaderDTO->setId($invoiceHeaderId);
        $eInvoiceHeaderDTO->setApiCall(AppDTO::$FALSE_AS_STRING);
        $eInvoiceHeaderDTO = $bEinvoiceHeader->getDTOById($eInvoiceHeaderDTO);

        //TODO Validate Here

        $eInvoiceLineDTO = $this->fillinAndSaveWizardEInvoiceLineB2BDTO($request);

        //TODO Handle. Routing.
//        $this->saveItemServiceByDto($itemMasterDTO);
////        return back()->withSuccess('Service Item is saved successfully!');
//        return $this->listItemServices();
//        $id = $eInvoiceLineDTO->getEinvoiceHeaderId();
        $einvoiceLineArr = $this->getInvoiceLinesArrbyHeaderId($invoiceHeaderId);

        $eInvoiceHeaderDTO->setEinvoiceLineArr($einvoiceLineArr);

        return view('pages.einvoiceb2bwizard', compact('eInvoiceHeaderDTO'));

        //return $eInvoiceHeaderDTO;
    }

    public function saveWizardEinvoiceLineB2C(Request $request) {

//        echo $request->invoiceHeaderId; die;

        $invoiceHeaderId = $request->invoiceHeaderId;

        //Get Invoice Header DTO by ID.
        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $bEinvoiceHeader = new BEInvoiceHeader();
        $eInvoiceHeaderDTO->setId($invoiceHeaderId);
        $eInvoiceHeaderDTO->setApiCall(AppDTO::$FALSE_AS_STRING);
        $eInvoiceHeaderDTO = $bEinvoiceHeader->getDTOById($eInvoiceHeaderDTO);

        //TODO Validate Here

        $eInvoiceLineDTO = $this->fillinAndSaveWizardEInvoiceLineB2CDTO($request);

        //TODO Handle. Routing.
//        $this->saveItemServiceByDto($itemMasterDTO);
////        return back()->withSuccess('Service Item is saved successfully!');
//        return $this->listItemServices();
//        $id = $eInvoiceLineDTO->getEinvoiceHeaderId();
        $einvoiceLineArr = $this->getInvoiceLinesArrbyHeaderId($invoiceHeaderId);

        $eInvoiceHeaderDTO->setEinvoiceLineArr($einvoiceLineArr);

        return view('pages.einvoiceb2cwizard', compact('eInvoiceHeaderDTO'));

        //return $eInvoiceHeaderDTO;
    }

    private function fillinAndSaveWizardEInvoiceB2BDTO(Request $request) {

        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        // $eInvoiceHeaderDTO->setEinvoiceStatus(AppDTO::$EINVOICE_STATUS_ACTIVE);//EInvoice Is Active By Default
//        $eInvoiceHeaderDTO->setHeaderIssueDate($sheet->getCell('A' . $row)->getValue());//TODO Format Date
//        $time = strtotime($sheet->getCell('A' . $row)->getValue());
////        $newformat = date('Y-m-d', $time);
//        echo $time; die;

        $eInvoiceHeaderDTO->setHeaderIssueDate($request->date);

        $eInvoiceHeaderDTO->setSupplierVATNO($request->VATNO);
        $eInvoiceHeaderDTO->setInvoiceNumber($request->invoiceNumber);
        $eInvoiceHeaderDTO->setInvoiceURL(AppDTO::$EINVOICE_URL);

        $eInvoiceHeaderDTO->setEinvoiceType(AppDTO::$EINVOICE_TYPE_B2B);

        $eInvoiceHeaderDTO->setOrderNo($request->orderNo);
        $eInvoiceHeaderDTO->setCompanyName($request->companyName);
        $eInvoiceHeaderDTO->setCustomerName($request->customerName);
        $eInvoiceHeaderDTO->setCustomerAddress($request->customerAddress);
        $eInvoiceHeaderDTO->setCustomerVatNo($request->customerVatNo);
        $eInvoiceHeaderDTO->setTransType($request->transType);
        $eInvoiceHeaderDTO->setVatRate($request->vatRate);
        $eInvoiceHeaderDTO->setOtherFees($request->discount); //Like Discount
        $eInvoiceHeaderDTO->setEinvoiceStatus($request->status);
//        $eInvoiceHeaderDTO->setTotalWithoutTax($request->totalAmountExcludingVat); //Calculated
//        $eInvoiceHeaderDTO->setTotalVAT($request->vatAmount);//Calculated
//        $eInvoiceHeaderDTO->setTotalWithTax($request->totalAmountIncluingVat);//Calculated

        $this->fillinEinvoiceHeaderDTObyDefaultCompanyData($eInvoiceHeaderDTO);

        $bEInvoiceHeader = new BEInvoiceHeader();
        $invoiceHeaderObj = $bEInvoiceHeader->saveObjectReturnObj($eInvoiceHeaderDTO);
        $eInvoiceHeaderDTO->setId($invoiceHeaderObj->id);
//        $this->invoiceHeaderId = $invoiceHeaderObj->id;
        return $eInvoiceHeaderDTO;

        /*
          //Save Invoice Lines.
          //Get Invoice Id.
          //        $eInvoiceHeaderId = $invoiceHeaderObj->id;
          $eInvoiceHeaderId = $this->invoiceHeaderId;
          //        echo $invoiceId;
          //        die;

          $eInvoiceLineDTO = new EInvoiceLineDTO();
          $eInvoiceLineDTO->setItemName($sheet->getCell('M' . $row)->getValue());
          $eInvoiceLineDTO->setItemId($sheet->getCell('N' . $row)->getValue());
          $eInvoiceLineDTO->setUnitPrice($sheet->getCell('O' . $row)->getValue());
          $eInvoiceLineDTO->setQuantity($sheet->getCell('P' . $row)->getValue());
          $eInvoiceLineDTO->setTaxableAmount($sheet->getCell('Q' . $row)->getValue());
          $eInvoiceLineDTO->setDiscount($sheet->getCell('R' . $row)->getValue());
          $eInvoiceLineDTO->setTaxRate($sheet->getCell('S' . $row)->getValue());
          $eInvoiceLineDTO->setTaxAmount($sheet->getCell('T' . $row)->getValue());
          $eInvoiceLineDTO->setCurency($sheet->getCell('U' . $row)->getValue());
          $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);

          $bEInvoiceLine = new BEInvoiceLine();
          $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO);

         */
    }

    private function fillinAndSaveWizardEInvoiceB2CDTO(Request $request) {

        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        // $eInvoiceHeaderDTO->setEinvoiceStatus(AppDTO::$EINVOICE_STATUS_ACTIVE);//EInvoice Is Active By Default
//        $eInvoiceHeaderDTO->setHeaderIssueDate($sheet->getCell('A' . $row)->getValue());//TODO Format Date
//        $time = strtotime($sheet->getCell('A' . $row)->getValue());
////        $newformat = date('Y-m-d', $time);
//        echo $time; die;

        $eInvoiceHeaderDTO->setHeaderIssueDate($request->date);

        $eInvoiceHeaderDTO->setSupplierVATNO($request->VATNO);
        $eInvoiceHeaderDTO->setInvoiceNumber($request->invoiceNumber);
        $eInvoiceHeaderDTO->setInvoiceURL(AppDTO::$EINVOICE_URL_B2C);

        $eInvoiceHeaderDTO->setEinvoiceType(AppDTO::$EINVOICE_TYPE_B2C);

        $eInvoiceHeaderDTO->setOrderNo($request->orderNo);
        $eInvoiceHeaderDTO->setCompanyName($request->companyName);
        $eInvoiceHeaderDTO->setCustomerName($request->customerName);
        $eInvoiceHeaderDTO->setCustomerAddress($request->customerAddress);
        $eInvoiceHeaderDTO->setCustomerVatNo($request->customerVatNo);
        $eInvoiceHeaderDTO->setTransType($request->transType);
        $eInvoiceHeaderDTO->setVatRate($request->vatRate);
        $eInvoiceHeaderDTO->setOtherFees($request->discount); //Like Discount
        $eInvoiceHeaderDTO->setEinvoiceStatus($request->status);
//        $eInvoiceHeaderDTO->setTotalWithoutTax($request->totalAmountExcludingVat); //Calculated
//        $eInvoiceHeaderDTO->setTotalVAT($request->vatAmount);//Calculated
//        $eInvoiceHeaderDTO->setTotalWithTax($request->totalAmountIncluingVat);//Calculated


        $this->fillinEinvoiceHeaderDTObyDefaultCompanyData($eInvoiceHeaderDTO);

        $bEInvoiceHeader = new BEInvoiceHeader();
        $invoiceHeaderObj = $bEInvoiceHeader->saveObjectReturnObj($eInvoiceHeaderDTO);
        $eInvoiceHeaderDTO->setId($invoiceHeaderObj->id);
//        $this->invoiceHeaderId = $invoiceHeaderObj->id;
        return $eInvoiceHeaderDTO;

        /*
          //Save Invoice Lines.
          //Get Invoice Id.
          //        $eInvoiceHeaderId = $invoiceHeaderObj->id;
          $eInvoiceHeaderId = $this->invoiceHeaderId;
          //        echo $invoiceId;
          //        die;

          $eInvoiceLineDTO = new EInvoiceLineDTO();
          $eInvoiceLineDTO->setItemName($sheet->getCell('M' . $row)->getValue());
          $eInvoiceLineDTO->setItemId($sheet->getCell('N' . $row)->getValue());
          $eInvoiceLineDTO->setUnitPrice($sheet->getCell('O' . $row)->getValue());
          $eInvoiceLineDTO->setQuantity($sheet->getCell('P' . $row)->getValue());
          $eInvoiceLineDTO->setTaxableAmount($sheet->getCell('Q' . $row)->getValue());
          $eInvoiceLineDTO->setDiscount($sheet->getCell('R' . $row)->getValue());
          $eInvoiceLineDTO->setTaxRate($sheet->getCell('S' . $row)->getValue());
          $eInvoiceLineDTO->setTaxAmount($sheet->getCell('T' . $row)->getValue());
          $eInvoiceLineDTO->setCurency($sheet->getCell('U' . $row)->getValue());
          $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);

          $bEInvoiceLine = new BEInvoiceLine();
          $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO);

         */
    }

    private function fillinAndSaveWizardEInvoiceLineB2BDTO(Request $request) {

        //Save Invoice Lines.
        //Get Invoice Id.
        //        $eInvoiceHeaderId = $invoiceHeaderObj->id;
        $eInvoiceHeaderId = $request->invoiceHeaderId;
        //        echo $invoiceId;
        //        die;

        $eInvoiceLineDTO = new EInvoiceLineDTO();
        $eInvoiceLineDTO->setItemName($request->itemName);
//        $eInvoiceLineDTO->setItemId($sheet->getCell('N' . $row)->getValue());
        $eInvoiceLineDTO->setUnitPrice($request->price);
        $eInvoiceLineDTO->setQuantity($request->quantity);
//        $eInvoiceLineDTO->setTaxableAmount($request->taxableAmount); Calculated
        $eInvoiceLineDTO->setDiscount($request->discount);
        /////------start
//        $eInvoiceLineDTO->setTaxRate($request->taxRate);
        $bCompanyProfile = new BCompanyProfile();
        $companyProfileDTO = $bCompanyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());
        $eInvoiceLineDTO->setTaxRate($companyProfileDTO->getVatRate());
        //----end
//        ////
//        $eInvoiceLineDTO->setTaxAmount($request->taxAmount); //Calculated
        $eInvoiceLineDTO->setCurency($request->currency);
//        $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);
//        $id = 60;
        $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);

        $bEInvoiceLine = new BEInvoiceLine();

        //Update Totals ---------------- Start
//        $eInvoiceLineDTO->setTaxRate($sheet->getCell('S' . $row)->getValue());
        $eInvoiceLineDTO->setTaxableAmount($request->quantity * $request->price); //A Taxable amount = Gross Amount = Unit Price * Quantity

        $discount = 0.0;
        if ($eInvoiceLineDTO->getDiscount() != 0) {
            if ($eInvoiceLineDTO->getDiscount() < 1) {//Percent
                $discount = $eInvoiceLineDTO->getDiscount() * $eInvoiceLineDTO->getTaxableAmount();
            } else {//Value
                $discount = $eInvoiceLineDTO->getDiscount();
            }
        }

        $eInvoiceLineDTO->setAmountAfterDiscount($eInvoiceLineDTO->getTaxableAmount() - $discount);

        $eInvoiceLineDTO->setTaxAmount($eInvoiceLineDTO->getAmountAfterDiscount() * $eInvoiceLineDTO->getTaxRate()); //A Tax Amount = Gross Amount * VAT Rate
//        $eInvoiceLineDTO->setCurency($sheet->getCell('U' . $row)->getValue());
        //Enhancemment
        $eInvoiceLineDTO->setGrossAmount($eInvoiceLineDTO->getAmountAfterDiscount() + $eInvoiceLineDTO->getTaxAmount());

        $totalAmountExcludingVat = $eInvoiceLineDTO->getAmountAfterDiscount();
        $totalVatAmount = $eInvoiceLineDTO->getTaxAmount();
        $totalAmountIncludingVat = $eInvoiceLineDTO->getGrossAmount();
        $totalDiscount = $eInvoiceLineDTO->getDiscount();

        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $bEInvoiceHeader = new BEInvoiceHeader();

//        $eInvoiceHeaderId


        $eInvoiceHeaderDTO->setId($eInvoiceLineDTO->getEinvoiceHeaderId());
        $eInvoiceHeaderDTO->setApiCall(AppDTO::$FALSE_AS_STRING);

        $currEInvoiceHeaderDTO = $bEInvoiceHeader->getDTOById($eInvoiceHeaderDTO);

        
        
        $eInvoiceHeaderDTO->setTotalWithoutTax( $currEInvoiceHeaderDTO->getTotalWithoutTax()  + $eInvoiceLineDTO->getAmountAfterDiscount());
        $eInvoiceHeaderDTO->setTotalVAT($totalVatAmount + $currEInvoiceHeaderDTO->getTotalVAT());
        $eInvoiceHeaderDTO->setTotalWithTax($totalAmountIncludingVat + $currEInvoiceHeaderDTO->getTotalWithTax());
        $eInvoiceHeaderDTO->setTotalDiscount($totalDiscount + $currEInvoiceHeaderDTO->getTotalDiscount());

        $bEInvoiceHeader->updateTotalAmounts($eInvoiceHeaderDTO);

        //---------------------- End

        $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO);
        
//        echo $totalAmountExcludingVat; 
//        echo "    ";
//        echo $eInvoiceHeaderDTO->getTotalWithTax(); 
//        die;
    }

    private function fillinAndSaveWizardEInvoiceLineB2CDTO(Request $request) {
/*
        //Save Invoice Lines.
        //Get Invoice Id.
        //        $eInvoiceHeaderId = $invoiceHeaderObj->id;
        $eInvoiceHeaderId = $request->invoiceHeaderId;
        //        echo $invoiceId;
        //        die;

        $eInvoiceLineDTO = new EInvoiceLineDTO();
        $eInvoiceLineDTO->setItemName($request->itemName);
//        $eInvoiceLineDTO->setItemId($sheet->getCell('N' . $row)->getValue());
        $eInvoiceLineDTO->setUnitPrice($request->price);
        $eInvoiceLineDTO->setQuantity($request->quantity);
        $eInvoiceLineDTO->setTaxableAmount($request->taxableAmount);
        $eInvoiceLineDTO->setDiscount($request->discount);
        $eInvoiceLineDTO->setTaxRate($request->taxRate);
        $eInvoiceLineDTO->setTaxAmount($request->taxAmount);
        $eInvoiceLineDTO->setCurency($request->currency);
//        $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);
//        $id = 60;
        $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);

        $bEInvoiceLine = new BEInvoiceLine();
        $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO);*/
        
        //Save Invoice Lines.
        //Get Invoice Id.
        //        $eInvoiceHeaderId = $invoiceHeaderObj->id;
        $eInvoiceHeaderId = $request->invoiceHeaderId;
        //        echo $invoiceId;
        //        die;

        $eInvoiceLineDTO = new EInvoiceLineDTO();
        $eInvoiceLineDTO->setItemName($request->itemName);
//        $eInvoiceLineDTO->setItemId($sheet->getCell('N' . $row)->getValue());
        $eInvoiceLineDTO->setUnitPrice($request->price);
        $eInvoiceLineDTO->setQuantity($request->quantity);
//        $eInvoiceLineDTO->setTaxableAmount($request->taxableAmount); Calculated
        $eInvoiceLineDTO->setDiscount($request->discount);
        /////------start
//        $eInvoiceLineDTO->setTaxRate($request->taxRate);
        $bCompanyProfile = new BCompanyProfile();
        $companyProfileDTO = $bCompanyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());
        $eInvoiceLineDTO->setTaxRate($companyProfileDTO->getVatRate());
        //----end
//        ////
//        $eInvoiceLineDTO->setTaxAmount($request->taxAmount); //Calculated
        $eInvoiceLineDTO->setCurency($request->currency);
//        $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);
//        $id = 60;
        $eInvoiceLineDTO->setEinvoiceHeaderId($eInvoiceHeaderId);

        $bEInvoiceLine = new BEInvoiceLine();

        //Update Totals ---------------- Start
//        $eInvoiceLineDTO->setTaxRate($sheet->getCell('S' . $row)->getValue());
        $eInvoiceLineDTO->setTaxableAmount($request->quantity * $request->price); //A Taxable amount = Gross Amount = Unit Price * Quantity

        $discount = 0.0;
        if ($eInvoiceLineDTO->getDiscount() != 0) {
            if ($eInvoiceLineDTO->getDiscount() < 1) {//Percent
                $discount = $eInvoiceLineDTO->getDiscount() * $eInvoiceLineDTO->getTaxableAmount();
            } else {//Value
                $discount = $eInvoiceLineDTO->getDiscount();
            }
        }

        $eInvoiceLineDTO->setAmountAfterDiscount($eInvoiceLineDTO->getTaxableAmount() - $discount);

        $eInvoiceLineDTO->setTaxAmount($eInvoiceLineDTO->getAmountAfterDiscount() * $eInvoiceLineDTO->getTaxRate()); //A Tax Amount = Gross Amount * VAT Rate
//        $eInvoiceLineDTO->setCurency($sheet->getCell('U' . $row)->getValue());
        //Enhancemment
        $eInvoiceLineDTO->setGrossAmount($eInvoiceLineDTO->getAmountAfterDiscount() + $eInvoiceLineDTO->getTaxAmount());

        $totalAmountExcludingVat = $eInvoiceLineDTO->getAmountAfterDiscount();
        $totalVatAmount = $eInvoiceLineDTO->getTaxAmount();
        $totalAmountIncludingVat = $eInvoiceLineDTO->getGrossAmount();
        $totalDiscount = $eInvoiceLineDTO->getDiscount();

        $eInvoiceHeaderDTO = new EInvoiceHeaderDTO();
        $bEInvoiceHeader = new BEInvoiceHeader();

//        $eInvoiceHeaderId


        $eInvoiceHeaderDTO->setId($eInvoiceLineDTO->getEinvoiceHeaderId());
        $eInvoiceHeaderDTO->setApiCall(AppDTO::$FALSE_AS_STRING);

        $currEInvoiceHeaderDTO = $bEInvoiceHeader->getDTOById($eInvoiceHeaderDTO);

        
        
        $eInvoiceHeaderDTO->setTotalWithoutTax( $currEInvoiceHeaderDTO->getTotalWithoutTax()  + $eInvoiceLineDTO->getAmountAfterDiscount());
        $eInvoiceHeaderDTO->setTotalVAT($totalVatAmount + $currEInvoiceHeaderDTO->getTotalVAT());
        $eInvoiceHeaderDTO->setTotalWithTax($totalAmountIncludingVat + $currEInvoiceHeaderDTO->getTotalWithTax());
        $eInvoiceHeaderDTO->setTotalDiscount($totalDiscount + $currEInvoiceHeaderDTO->getTotalDiscount());

        $bEInvoiceHeader->updateTotalAmounts($eInvoiceHeaderDTO);

        //---------------------- End

        $bEInvoiceLine->saveObjectReturnObj($eInvoiceLineDTO);
        
//        echo $totalAmountExcludingVat; 
//        echo "    ";
//        echo $eInvoiceHeaderDTO->getTotalWithTax(); 
//        die;
    }

    private $invoiceNumber = -1; //Temp
    private $invoiceHeaderId = -1; //Temp

}
