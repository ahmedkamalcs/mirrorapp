<?php

namespace App\Http\Controllers\api\v1\subscription\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\order\OrderDetailsModel;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\ProductListingDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\ServiceItemDTO;
use App\Models\api\v1\subscription\ServiceItemModel;

class BServiceItem extends Controller implements BusinessInterface {

    public function addServiceItem(ServiceItemDTO $serviceItemDTO) {

        $serviceItemModel = new ServiceItemModel();
        $dto = $serviceItemModel->addServiceItem($serviceItemDTO);

        if ($serviceItemDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {

            if ($dto->getId() != null) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $serviceData['Id'] = $dto->getId();
                $serviceData['Name'] = $dto->getServiceName();
                $serviceData['NameAr'] = $dto->getServiceNameAr();
                $response['Service'] = $serviceData;
            } else {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $response['Service'] = null;
            }
            return JsonHandler::getJsonMessage($response);
        } else {
            if ($dto->getId() != null) {
                return $dto;
            } else {
                return null;
            }
        }
    }

    public function getDTOById($id) {
        
    }

}
