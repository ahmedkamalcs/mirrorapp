<?php

namespace App\Http\Controllers\api\v1\tax\bo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\v1\ModelFactory;
use App\Http\Model\v1\event\EventCategoryModel;
use App\Http\Controllers\api\v1\dto\InvoiceDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Models\api\v1\paymentmodel\InvoiceModel;
use App\Http\Controllers\api\v1\dto\BusinessInterface;

/* * *
 * @author ISG.
 * Business event class that handles business logic for Event Details table.
 */
use AWS;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;
use App\Http\Controllers\api\v1\dto\TaxDTO;
use App\Models\api\v1\tax\TaxModel;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BTax {

    public static function saveObject(TaxDTO $taxDTO) {
        $taxModel = new TaxModel();
        if ($taxModel->saveObject($taxDTO)) {
            if ($taxDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($taxDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Error occurred!!!";

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public static function getActiveTaxByType($taxType) {
        $taxModel = new TaxModel();
        return $taxModel->getActiveTaxByType($taxType);
    }

}
