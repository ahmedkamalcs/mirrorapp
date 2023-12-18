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
use App\Http\Controllers\api\v1\dto\ServicePlanDTO;

class SubscriptionWebController extends BaseController {

    public function index() {
        $servicePlanDto = $this->listPricingPlans();
        return view('pages/subscriptionlandingpage', compact('servicePlanDto'));
    }

    public function listPricingPlans() {
        $servicePlanDto = new ServicePlanDTO();
        $servicePlanDto->setApiCall(AppDTO::$FALSE_AS_STRING);
        $servicePlanDto->listServicePlan($servicePlanDto);
        return $servicePlanDto;
    }

}
