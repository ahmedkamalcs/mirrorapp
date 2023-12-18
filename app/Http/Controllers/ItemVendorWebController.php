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
use App\Http\Controllers\api\v1\dto\ItemVendorDTO;
use App\Http\Controllers\api\v1\vendor\bo\BItemVendor;

class ItemVendorWebController extends BaseController {

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

    public function listItemServices() {
//        $einvoiceHeaderDTO = new EInvoiceHeaderDTO();
//        $einvoiceHeaderDTO->setHeaderInvoiceNumber("AAAA900");
//        
        $bItemMaster = new BItemMaster();
        $itemsArr = $bItemMaster->listAllItemService();

        return view('pages.servicemaster', compact('itemsArr'));
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

    public function importItemsFromExcel(Request $request) {

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


                $this->fillInDataAndSave($sheet, $row);
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

    private function fillInDataAndSave($sheet, $row) {
        //Validate 
//        if ( $sheet->getCell('A' . $row)->getValue() == null )
//        {
//            return;
//        }
        //Save Invoice Header
        $itemMasterDTO = new ItemMasterDTO();
//        $eInvoiceHeaderDTO->setHeaderIssueDate($sheet->getCell('A' . $row)->getValue());//TODO Format Date

//        $time = strtotime($sheet->getCell('A' . $row)->getValue());
////        $newformat = date('Y-m-d', $time);
//        echo $time; die;
        
        $itemMasterDTO->setItemName($sheet->getCell('A' . $row)->getValue());
        $itemMasterDTO->setPrice($sheet->getCell('B' . $row)->getValue());
        $itemMasterDTO->setItemDescription($sheet->getCell('C' . $row)->getValue());
        $itemMasterDTO->setCurrencyCode($sheet->getCell('D' . $row)->getValue());
        $itemMasterDTO->setItemType(AppDTO::$ITEM_TYPE_SERVICE);

        $bItemMaster = new BItemMaster();
        $bItemMaster->saveObject($itemMasterDTO);
    }
    
    public function addItem()
    {
        return view('pages.itemvendor');
    }
    
    public function initItemVendorPage()
    {
        $itemVendorDTO = new ItemVendorDTO();
        return view('pages.itemvendor', compact('itemVendorDTO'));
    }
    
    public function update(Request $request)
    {
//        auth()->user()->update($request->all());
//        $this->AddNewInvoiceHeader($request);
        
        $this->fillInItemVendorDTOAndSave($request);
        return back()->withStatus(__('Item Vendor Successfully Added.'));
    }
    
    private function fillInItemVendorDTOAndSave(Request $request)
    {
        $itemVendorDTO = new ItemVendorDTO();
        $itemVendorDTO->setVendorMasterId($request->vendor);
        $itemVendorDTO->setItemMasterId($request->item);
        
        $bIemVendor = new BItemVendor();
        return $bIemVendor->saveObject($itemVendorDTO);
    }

    private $invoiceNumber = -1;//Temp
    private $invoiceHeaderId = -1;//Temp
}
