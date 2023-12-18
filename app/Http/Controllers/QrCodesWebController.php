<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\client\EventDetailsControllerClient;
use App\Http\Model\v1\event\EventDetailsMode;
use App\Http\Controllers\api\v1\bo\BEventDetails;
use App\Http\Model\v1\event\EventModel;
use App\Http\Controllers\api\v1\security\User;
use App\Http\Controllers\api\v1\client\EventControllerClient;
use App\Http\Controllers\api\v1\util\StringUtil;
use App\Http\Controllers\api\v1\util\MessageUtil;
use App\Http\Controllers\api\v1\client\EventCategoryControllerClient;
use App\Http\Controllers\api\v1\client\EventCategoryHasEventDetailsClient;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\api\v1\client\RefundPolicyControllerClient;
use App\Http\Controllers\api\v1\dto\EventDetailsDTO;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\api\v1\bo\BPayment;
use App\Http\Controllers\api\v1\client\EventDetailsTicketClient;
use App\Http\Model\v1\event\EventDetailsTicketModel;
use App\Http\Controllers\api\v1\bo\BUser;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodesWebController extends Controller {

    public function generateQr($qrCode)
    {
        $val = QrCode::size(300)->generate($qrCode);
        return $val;
    }
    
    public function getQRCode()
    {
//        return QrCode::size(100)->backgroundColor(255,55,0)->generate('W3Adda Laravel Tutorial');
        
        $val = QrCode::size(120)->generate("Invoice No: 100");
        return $val;
    }
}
