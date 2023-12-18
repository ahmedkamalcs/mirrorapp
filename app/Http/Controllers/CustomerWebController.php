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
use App\Http\Controllers\api\v1\vendor\bo\BItemMaster;
use App\Http\Controllers\api\v1\dto\ItemMasterDTO; 
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\customer\bo\BCustomer;
use App\Http\Controllers\api\v1\dto\CustomerDTO;

class CustomerWebController extends BaseController {

    public function index() {
        return view('apsweb');
    }

    public function initCustomerView() {
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

    public function listCustomersB2C() {
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
//        $einvoiceHeaderDTO->setHeaderInvoiceNumber("AAAA900");
//        
        $bCustomer = new BCustomer();
        $customersArr = $bCustomer->listAllCustomersB2C();
        
        return view('pages.customermasterb2c', compact('customersArr'));
    }
    
    public function listCustomersB2B() {
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
//        $einvoiceHeaderDTO->setHeaderInvoiceNumber("AAAA900");
//        
        $bCustomer = new BCustomer();
        $customersArr = $bCustomer->listAllCustomersB2B();

        return view('pages.customermasterb2b', compact('customersArr'));
    }

    public function initEInvoiceInDashboard($eInvoiceId) {
        $bEInvoiceHeader = new BEInvoiceHeader();
        $einvoiceHeaderDTO = $bEInvoiceHeader->getDTOByEInvoiceId($eInvoiceId);

        if ($einvoiceHeaderDTO == null) {
            $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
            $einvoiceHeaderDTO->setId(null);
        }
        return view('b2ceinvoice', compact('einvoiceHeaderDTO'));
    }

    public function importCsutomersB2CFromExcel(Request $request) {

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


                $this->fillInCustomerB2CDataAndSave($sheet, $row);
//                break;
//                ];
                $startcount++;
            }
//            die;
//            DB::table('einvoice_simplified_invoice_header')->insert($data);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }
    
    public function importCsutomersB2BFromExcel(Request $request) {

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


                $this->fillInCustomerB2BDataAndSave($sheet, $row);
//                break;
//                ];
                $startcount++;
            }
//            die;
//            DB::table('einvoice_simplified_invoice_header')->insert($data);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }
    
    private function fillInCustomerB2BDataAndSave($sheet, $row) {
        //Validate 
//        if ( $sheet->getCell('A' . $row)->getValue() == null )
//        {
//            return;
//        }
        //Save Invoice Header
        $customerDTO = new CustomerDTO();
//        $eInvoiceHeaderDTO->setHeaderIssueDate($sheet->getCell('A' . $row)->getValue());//TODO Format Date

//        $time = strtotime($sheet->getCell('A' . $row)->getValue());
////        $newformat = date('Y-m-d', $time);
//        echo $time; die;
        
        $customerDTO->setCustomerNumber($sheet->getCell('A' . $row)->getValue());
        $customerDTO->setCompanyName($sheet->getCell('B' . $row)->getValue());
        $customerDTO->setCompanyNameAr($sheet->getCell('C' . $row)->getValue());
        $customerDTO->setCountry($sheet->getCell('D' . $row)->getValue());
        $customerDTO->setCity($sheet->getCell('E' . $row)->getValue());
        $customerDTO->setWebsite($sheet->getCell('F' . $row)->getValue());
        $customerDTO->setPhone($sheet->getCell('G' . $row)->getValue());
        $customerDTO->setContact($sheet->getCell('H' . $row)->getValue());
        $customerDTO->setPosition($sheet->getCell('I' . $row)->getValue());
        $customerDTO->setTelNo($sheet->getCell('J' . $row)->getValue());
        $customerDTO->setEmail($sheet->getCell('K' . $row)->getValue());
        $customerDTO->setAddress1($sheet->getCell('L' . $row)->getValue());
        $customerDTO->setAddress2($sheet->getCell('M' . $row)->getValue());
        $customerDTO->setVatNumber($sheet->getCell('N' . $row)->getValue());
        $customerDTO->setHistory($sheet->getCell('O' . $row)->getValue());
        $customerDTO->setNotes($sheet->getCell('P' . $row)->getValue());
        $customerDTO->setCustomerType(AppDTO::$EINVOICE_TYPE_B2B);

        $bCustomer = new BCustomer();
        $bCustomer->createCustomer($customerDTO);
    }

    private function fillInCustomerB2CDataAndSave($sheet, $row) {
        //Validate 
//        if ( $sheet->getCell('A' . $row)->getValue() == null )
//        {
//            return;
//        }
        //Save Invoice Header
        $customerDTO = new CustomerDTO();
//        $eInvoiceHeaderDTO->setHeaderIssueDate($sheet->getCell('A' . $row)->getValue());//TODO Format Date

//        $time = strtotime($sheet->getCell('A' . $row)->getValue());
////        $newformat = date('Y-m-d', $time);
//        echo $time; die;
        
        $customerDTO->setCustomerNumber($sheet->getCell('A' . $row)->getValue());
        $customerDTO->setFirstName($sheet->getCell('B' . $row)->getValue());
        $customerDTO->setLastName($sheet->getCell('C' . $row)->getValue());
        $customerDTO->setTelNo($sheet->getCell('D' . $row)->getValue());
        $customerDTO->setEmail($sheet->getCell('E' . $row)->getValue());
        $customerDTO->setAddress1($sheet->getCell('F' . $row)->getValue());
        $customerDTO->setAddress2($sheet->getCell('G' . $row)->getValue());
        $customerDTO->setCustomerType(AppDTO::$EINVOICE_TYPE_B2C);

        $bCustomer = new BCustomer();
        $bCustomer->createCustomer($customerDTO);
    }
    
    public function customerB2BWizard() {
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
//        $einvoiceHeaderDTO->setHeaderInvoiceNumber("AAAA900");
//        
//        $bCustomer = new BCustomer();
//        $customersArr = $bCustomer->listAllCustomersB2B();

        return view('pages.customermasterb2bwizard');
    }
    
    public function saveWizardCustomerB2B(Request $request) {

        //TODO Validate Here

        $customerB2BDTO = $this->fillinWizardCustomerB2BDTO($request);
        $this->saveCustomeB2BByDto($customerB2BDTO);
//        return back()->withSuccess('Service Item is saved successfully!');
        return $this->listCustomersB2B();
    }

    private function fillinWizardCustomerB2BDTO(Request $request) {

        $customerDTO = new CustomerDTO();
        
        
        $customerDTO->setCustomerNumber($request->customerName);
        $customerDTO->setCompanyName($request->companyName);
        $customerDTO->setCompanyNameAr($request->companyNameAr);
        $customerDTO->setCountry($request->country);
        $customerDTO->setCity($request->city);
        $customerDTO->setWebsite($request->website);
        $customerDTO->setPhone($request->phone);
        $customerDTO->setContact($request->contact);
        $customerDTO->setPosition($request->position);
        $customerDTO->setTelNo($request->telNo);
        $customerDTO->setEmail($request->email);
        $customerDTO->setAddress1($request->address1);
        $customerDTO->setAddress2($request->address2);
        $customerDTO->setVatNumber($request->vatNo);
        $customerDTO->setHistory($request->history);
        $customerDTO->setNotes($request->notes);
        $customerDTO->setCustomerType(AppDTO::$EINVOICE_TYPE_B2B);
        

        return $customerDTO;
    }
    
     private function saveCustomeB2BByDto(CustomerDTO $customerDTO) {
        $bCustomerB2B = new BCustomer();
        $bCustomerB2B->createCustomer($customerDTO);
    }
    
     public function customerB2CWizard() {
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
//        $einvoiceHeaderDTO->setHeaderInvoiceNumber("AAAA900");
//        
//        $bCustomer = new BCustomer();
//        $customersArr = $bCustomer->listAllCustomersB2B();

        return view('pages.customermasterb2cwizard');
    }
    
    public function saveWizardCustomerB2C(Request $request) {

        //TODO Validate Here

        $customerB2CDTO = $this->fillinWizardCustomerB2CDTO($request);
        $this->saveCustomeB2CByDto($customerB2CDTO);
//        return back()->withSuccess('Service Item is saved successfully!');
        return $this->listCustomersB2C();
    }

    private function fillinWizardCustomerB2CDTO(Request $request) {

        $customerDTO = new CustomerDTO();
        
        
        $customerDTO->setCustomerNumber($request->customerNo);
        $customerDTO->setFirstName($request->firstName);
        $customerDTO->setLastName($request->lastName);
        $customerDTO->setTelNo($request->telNo);
        $customerDTO->setEmail($request->email);
        $customerDTO->setAddress1($request->address1);
        $customerDTO->setAddress2($request->address2);
        
        $customerDTO->setCustomerType(AppDTO::$EINVOICE_TYPE_B2C);
        

        return $customerDTO;
    }
    
     private function saveCustomeB2CByDto(CustomerDTO $customerDTO) {
        $bCustomerB2B = new BCustomer();
        $bCustomerB2B->createCustomer($customerDTO);
    }
    
    

    private $invoiceNumber = -1;//Temp
    private $invoiceHeaderId = -1;//Temp
}
