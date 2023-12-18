<?php

namespace App\Http\Controllers\api\v1\tax\client;

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
use App\Models\api\v1\paymentmodel\TaxModel;
use App\Http\Controllers\api\v1\tax\bo\BTax;
use App\Http\Controllers\api\v1\dto\AppDTO;

class TaxClient {

    public static function save(Request $request) {
        
        $taxDTO = new TaxDTO();
        $taxDTO->setAmount($request->amount);
        $taxDTO->setTaxType(AppDTO::$VAT_TAX_CODE);
        $taxDTO->setActive(AppDTO::$TRUE_AS_STRING);
//        $taxDTO->setApiCall('0');
        $bTax = new BTax();
        return $bTax->saveObject($taxDTO);
        
    }
    

}
