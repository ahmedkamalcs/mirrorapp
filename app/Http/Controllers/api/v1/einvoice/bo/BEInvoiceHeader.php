<?php

namespace App\Http\Controllers\api\v1\einvoice\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\einvoice\EInvoiceHeaderModel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BEInvoiceHeader extends Controller implements BusinessInterface {

    public function saveObject(EInvoiceHeaderDTO $eInvoiceheaderDTO) {
        $einvoiceHeaderModel = new EInvoiceHeaderModel();
        $obj = $einvoiceHeaderModel->saveObject($eInvoiceheaderDTO);
        if ($obj) {
            if ($eInvoiceheaderDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";
                $response['Object'] = $obj;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($eInvoiceheaderDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Error!!!";
                $response['Object'] = null;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function saveObjectReturnObj(EInvoiceHeaderDTO $eInvoiceheaderDTO) {
        $einvoiceHeaderModel = new EInvoiceHeaderModel();
        $obj = $einvoiceHeaderModel->saveObject($eInvoiceheaderDTO);
        return $obj;
    }

    public function getDTOById(EInvoiceHeaderDTO $einvoiceHeaderDTO) {
        
        $einvoiceHeaderModel = new EInvoiceHeaderModel();
        $eInvoiceDTO = $einvoiceHeaderModel->getDTOById($einvoiceHeaderDTO);

        if ($eInvoiceDTO != null) {
            $this->generateQRCode($eInvoiceDTO);
            $eInvoiceDTO->setEInvoiceLineDTOArr($einvoiceHeaderModel->getInvoiceLinesArrbyHeaderId($einvoiceHeaderDTO->getId()));
        }

        if($einvoiceHeaderDTO->getApiCall() == AppDTO::$TRUE_AS_STRING){
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS; 
            $response['Invoice Number'] = $eInvoiceDTO->getHeaderInvoiceNumber();

            return JsonHandler::getJsonMessage($response);
        }else{
            return $eInvoiceDTO;
        }
        
//        if ($obj) {
//            $response['Status'] = APICodes::$TRANSACTION_SUCCESS; 
//            $response['Invoice Number'] = $obj->getHeaderInvoiceNumber();
//
//            return JsonHandler::getJsonMessage($response);
//        } 
//        return null;
    }

    public function getDTOByEInvoiceId($id) {
        $einvoiceHeaderModel = new EInvoiceHeaderModel();
        $eInvoiceDTO = $einvoiceHeaderModel->getDTOByEInvoiceId($id);

        if ($eInvoiceDTO != null) {
            $this->generateQRCode($eInvoiceDTO);
            $eInvoiceDTO->setEInvoiceLineDTOArr($einvoiceHeaderModel->getInvoiceLinesArrbyHeaderId($eInvoiceDTO->getId()));
        }

        return $eInvoiceDTO;
//        if ($obj) {
//            $response['Status'] = APICodes::$TRANSACTION_SUCCESS; 
//            $response['Invoice Number'] = $obj->getHeaderInvoiceNumber();
//
//            return JsonHandler::getJsonMessage($response);
//        } 
//        return null;
    }

    public function listAllInvoices() {
        $einvoiceHeaderModel = new EInvoiceHeaderModel();
        $einvoiceArr = $einvoiceHeaderModel->listAllInvoices();
        return $einvoiceArr;
    }

    public function listAllInvoicesByInvoiceType($eInvoiceType) {
        $einvoiceHeaderModel = new EInvoiceHeaderModel();
        $einvoiceArr = $einvoiceHeaderModel->listAllInvoicesByInvoiceType($eInvoiceType);
        return $einvoiceArr;
    }
    public function toTLV($Tag,$value)
    {
       
        return $this->toHex($Tag).$this->toHex(strlen($value)).($value);
    }

   
    public  function toHex($value)
    {
        return pack("H*", sprintf("%02X", $value));
    }


    public function generateQRCode(EInvoiceHeaderDTO $eInvoiceheaderDTO) {
        //Build QR Code.
//        $qrCodeValue =  $eInvoiceheaderDTO->getHeaderInvoiceNumber().",".$eInvoiceheaderDTO->getSellerName() . "," . $eInvoiceheaderDTO->getSellerStreetName();
//        $qrCodeValue = "http://52.223.3.121/isgapiv1/public/index.php/b2ceinvoice/1";
        ///$qrCodeValue = $eInvoiceheaderDTO->getInvoiceURL() . $eInvoiceheaderDTO->getHeaderInvoiceNumber();
        $tag1= $this->toTLV(1,$eInvoiceheaderDTO->getCompanyName());
        $tag2= $this->toTLV(2,$eInvoiceheaderDTO->getCustomerVatNo());
        $tag3= $this->toTLV(3,str_replace(" ","T",$eInvoiceheaderDTO->getHeaderIssueDate())."Z");
        $tag4= $this->toTLV(4,$eInvoiceheaderDTO->getTotalWithTax());
        $tag5= $this->toTLV(5,$eInvoiceheaderDTO->getTotalVAT());
        $qrCodeValue=base64_encode($tag1.$tag2.$tag3.$tag4.$tag5); 
        $eInvoiceheaderDTO->setQrCode(QrCode::size(60)->generate($qrCodeValue));
    }

    public static function getFormatedNumberSeries($sysSeriesDTO) {
        //Format Series for E-Invoice.
        $nextInvoiceId = AppDTO::$INVOICE_PREFIX . $sysSeriesDTO->getLastNumber(); //TODO change 2200 to dynamic value in DB.
        return $nextInvoiceId;
    }

    public function getInvoiceIdbyEInvoiceNymber(EInvoiceHeaderDTO $eInvoiceHeaderDTO) {
        $einvoiceModel = new EInvoiceHeaderModel();
        return $einvoiceModel->getInvoiceIdbyEInvoiceNymber($eInvoiceHeaderDTO);
    }

    public function getInvoiceLinesArrbyHeaderId($id) {
        $einvoiceModel = new EInvoiceHeaderModel();
        return $einvoiceModel->getInvoiceLinesArrbyHeaderId($id);
    }
    
    public function updateTotalAmounts(EInvoiceHeaderDTO $eInvoiceHeaderDTO){
     $einvoiceModel = new EInvoiceHeaderModel();
        return $einvoiceModel->updateTotalAmounts($eInvoiceHeaderDTO);
    }
}
