<?php

namespace App\Http\Controllers\api\v1\sns\client;

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
use App\Http\Controllers\api\v1\sns\bo\BSnsService;
class SnsServiceClient  {

    public function pushMessage()
    {
        $bSnsService = new BSnsService();
        $bSnsService->pushMessage();
    }
}
