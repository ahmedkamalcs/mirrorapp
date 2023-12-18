<?php

namespace App\Http\Controllers\api\v1\aps\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\order\OrderDetailsModel;
use App\Http\Controllers\api\v1\dto\APSDTO;

class BOAPS extends Controller implements BusinessInterface {

    public function generateSignature(APSDTO $apsDTO) {
        $shaString = '';
        // array request
        $arrData = array(
            'command' => $apsDTO->getCommand(),
            'access_code' => $apsDTO->getAccessCode(),
            'merchant_identifier' => $apsDTO->getMerchantIdentifier(),
            'merchant_reference' => $apsDTO->getMerchantReference(),
            'amount' => $apsDTO->getAmount(),
            'currency' => $apsDTO->getCurrency(),
            'language' => $apsDTO->getLanguage(),
            'customer_email' => $apsDTO->getCustomerEmail(),
//            'order_description' => $apsDTO->getOrderDescription(),
            'return_url' => $apsDTO->getReturnURL(),
        );
        // sort an array by key
        ksort($arrData);
        foreach ($arrData as $key => $value) {
            $shaString .= "$key=$value";
        }
        // make sure to fill your sha request pass phrase
        $shaString = $apsDTO->getSignaturePrefix() . $shaString . $apsDTO->getSignaturePostfix();

        $signature = hash($apsDTO->getHashingAlgorithm(), $shaString);
        // your request signature
        return $signature;
    }

    public function getDTOById($id) {
        return null;
    }

}
