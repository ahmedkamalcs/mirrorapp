<?php

namespace App\Http\Controllers\api\v1\einvoice\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\EInvoiceLineDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\einvoice\EInvoiceLineModel;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BEInvoiceLine extends Controller implements BusinessInterface {

    public function saveObject(EInvoiceLineDTO $eInvoiceLineDTO) {
        $einvoiceLineModel = new EInvoiceLineModel();
        $obj = $einvoiceLineModel->saveObject($eInvoiceLineDTO);
        if ($obj) {
            if ($eInvoiceLineDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";
                $response['Object'] = $obj;
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }


            return JsonHandler::getJsonMessage($response);
        } else {
            if ($eInvoiceLineDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Error!!!";
                $response['Object'] = null;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function saveObjectReturnObj(EInvoiceLineDTO $eInvoiceLineDTO) {
        $einvoiceLineModel = new EInvoiceLineModel();
        $obj = $einvoiceLineModel->saveObject($eInvoiceLineDTO);
        return $obj;
    }

    public function getDTOById($id) {
        
    }

    public static function getFormatedNumberSeries($sysSeriesDTO) {
        //Format Series for E-Invoice.
        $nextInvoiceId = "2300" . $sysSeriesDTO->getLastNumber(); //TODO change 2200 to dynamic value in DB.
        return $nextInvoiceId;
    }

    public static $EINVOICE_URL = 'ss';

}
