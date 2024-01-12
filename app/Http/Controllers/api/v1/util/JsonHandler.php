<?php

namespace App\Http\Controllers\api\v1\util;

use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\bo\BusinessHandlerInterface;
use App\Http\Model\v1\ModelFactory;
use App\Http\Controllers\api\v1\bo\BEventDetails;
use App\Http\Controllers\api\v1\dto\APSDTO;
use App\Http\Controllers\api\v1\security\User;
use App\Http\Controllers\api\v1\dto\JsonHandlerDTO;

/* * *
 * @author ISG.
 * Business event class that handles business logic for Event table.
 */

final class JsonHandler {

    public static function getJsonMessage(JsonHandlerDTO $jsonHandlerDTO) {
      

        if (is_object($jsonHandlerDTO->getResultInArr() )) {
            
            $response = ['Message' => $jsonHandlerDTO->getMessage(),
                'isSucces' => $jsonHandlerDTO->getIsSuccess(),
                'jsonData' => [$jsonHandlerDTO->getResultHead() => $jsonHandlerDTO->getResultInArr()]];

            $jsonResult = json_encode($response);
            header('Content-Type: application/json; charset=utf-8');
            echo $jsonResult;
            exit();
        } else if ($jsonHandlerDTO->getResultInArr() == null || count($jsonHandlerDTO->getResultInArr()) == 0) {
            $response = ['Message' => $jsonHandlerDTO->getMessage(),
                'isSucces' => $jsonHandlerDTO->getIsSuccess(),
                'jsonData' => []];

            $jsonResult = json_encode($response);
            header('Content-Type: application/json; charset=utf-8');
            echo $jsonResult;
            exit();
        } else if (count($jsonHandlerDTO->getResultInArr()) == 1) {

            $response = ['Message' => $jsonHandlerDTO->getMessage(),
                'isSucces' => $jsonHandlerDTO->getIsSuccess(),
                'jsonData' => [$jsonHandlerDTO->getResultHead() => (object) $jsonHandlerDTO->getResultInArr()[0]]];

            $jsonResult = json_encode($response);
            header('Content-Type: application/json; charset=utf-8');
            echo $jsonResult;
            exit();
        } else if (count($jsonHandlerDTO->getResultInArr()) > 1) {
            $response = ['Message' => $jsonHandlerDTO->getMessage(),
                'isSucces' => $jsonHandlerDTO->getIsSuccess(),
                'jsonData' => [$jsonHandlerDTO->getResultHead() => $jsonHandlerDTO->getResultInArr()]];

            $jsonResult = json_encode($response);
            header('Content-Type: application/json; charset=utf-8');
            echo $jsonResult;
            exit();
        }
    }

}
