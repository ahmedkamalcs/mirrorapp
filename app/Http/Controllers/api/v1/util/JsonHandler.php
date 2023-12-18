<?php

namespace App\Http\Controllers\api\v1\util;

use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\bo\BusinessHandlerInterface;
use App\Http\Model\v1\ModelFactory;
use App\Http\Controllers\api\v1\bo\BEventDetails;
use App\Http\Controllers\api\v1\dto\APSDTO;
use App\Http\Controllers\api\v1\security\User;

/* * *
 * @author ISG.
 * Business event class that handles business logic for Event table.
 */

final class JsonHandler {

    public static function getJsonMessage($response) {
        $jsonResult = json_encode($response);
        header('Content-Type: application/json; charset=utf-8');
        echo $jsonResult;
        exit();
    }

}
