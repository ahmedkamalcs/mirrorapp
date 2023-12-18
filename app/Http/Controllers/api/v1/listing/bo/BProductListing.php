<?php

namespace App\Http\Controllers\api\v1\listing\bo;

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

class BProductListing extends Controller implements BusinessInterface {

    public function listProducts(ProductListingDTO $productListingDTO) {
        /*
          SELECT
          vm.name AS 'vendor_name',
          vm.id AS 'vendor_id',
          iv.item_name,
          iv.item_master_id,
          iv.basic_price
          FROM item_vendor iv, vendor_master vm
          GROUP BY iv.item_name;
         */
        $query = "SELECT
        vm.name AS 'vendor_name',
        vm.id AS 'vendor_id',
        iv.item_name,
        iv.id AS 'item_vendor_id',
        iv.basic_price,
        iv.gross_price,
        iv.item_image
        FROM isg_item_vendor iv, isg_vendor_master vm
        order BY vm.name;";

        $result = DBUtil::select($query); //UserOTP::where('phone_number', $userOtpDTO->getPhoneNumber() )->get();

        if ($productListingDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            if ($result) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $response['ProductList'] = $result;
            } else {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Success!!!";
                $response['ProductList'] = null;
            }
            return JsonHandler::getJsonMessage($response);
        } else {
            if ($result) {
                return $result;
            }
        }
    }

    public function getDTOById($id) {
        
    }

}
