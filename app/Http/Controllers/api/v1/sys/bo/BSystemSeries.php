<?php

namespace App\Http\Controllers\api\v1\sys\bo;

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
use App\Http\Controllers\api\v1\dto\SnsDTO;
use App\Models\api\v1\sys\SystemSeriesModel;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\SystemSeriesDTO;

class BSystemSeries {
    
    
    
    public static function getOrderNoSeriesDTO()
    {
        $sysSeriesModel = new SystemSeriesModel();
        return $sysSeriesModel->getDTOBySeriesName(AppDTO::$ORDER_NO_SERIES);
    }
    
    public static function getEInvoiceNumberSeries()
    {
        $sysSeriesModel = new SystemSeriesModel();
        return $sysSeriesModel->getDTOBySeriesName(AppDTO::$EINVOICE_NO_SERIES);
        
//        $sysSeriesDTO =  $sysSeriesModel->getDTOBySeriesName(AppDTO::$EINVOICE_NO_SERIES);
//        
//        //Format Series for E-Invoice.
//        $nextInvoiceId = "2200" . $sysSeriesDTO->getLastNumber();//TODO change 2200 to dynamic value in DB.
//        return $nextInvoiceId;
    }
    
    public static function updateSeries(SystemSeriesDTO $sysSeriesDTO)
    {
        $sysSeriesModel = new SystemSeriesModel();
        $sysSeriesModel->updateSeries($sysSeriesDTO);
    }
}
