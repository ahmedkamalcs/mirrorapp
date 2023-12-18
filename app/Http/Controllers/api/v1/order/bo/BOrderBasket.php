<?php

namespace App\Http\Controllers\api\v1\order\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\OrderBasketDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\order\OrderBasketModel;
use App\Http\Controllers\api\v1\order\bo\BOrderMaster;
use App\Http\Controllers\api\v1\dto\OrderMasterDTO;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\order\bo\BOrderDetails;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\vendor\bo\BItemVendor;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BOrderBasket extends Controller implements BusinessInterface {

    public function saveObject(OrderBasketDTO $orderBasketDTO) {
        $orderBasketModel = new OrderBasketModel();
        $obj = $orderBasketModel->saveObject($orderBasketDTO);
        if ($obj) {
            if ($orderBasketDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "Saved!!!";
                $response['Object'] = $obj;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($orderBasketDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Error!!!";
                $response['Object'] = null;

                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function getDTOById($id) {
        
    }

    public function basketToOrder(OrderBasketDTO $orderBasketDTO) {

        //Get basket details from database.
        //Query by user id
        //SELECT * FROM order_basket WHERE user_id = 1 AND STATUS = 'InProgress';
        $query = "SELECT * FROM isg_order_basket WHERE user_id = " . $orderBasketDTO->getUserId() . " AND STATUS = 'InProgress';";
        $resultArr = DBUtil::select($query);

        //Save Order Header
        $bOrderMaster = new BOrderMaster();
        $orderMasterDTO = new OrderMasterDTO();
        $orderMasterDTO->setOrderText("New Order"); //TODO Change Order Text.
        $orderMasterDTO->setTotalGrossPrice(0);
        $orderMasterDTO->setTotalNetPrice(0);

        //Change Basket TO Order Header
        $orderMasterDTO = $bOrderMaster->saveObject($orderMasterDTO);

        foreach ($resultArr as $obj) {
            //Fill In Order Basket
            $this->fillInOrderBasket($obj, $orderBasketDTO);
            //Loop on basket data
            //Order Details
            $orderDetailsDTO = new OrderDetailsDTO();
            $bOrderDetails = new BOrderDetails();
            $orderDetailsDTO->setOrderText($orderMasterDTO->getOrderText());
            $orderDetailsDTO->setOrderMasterId($orderMasterDTO->getId());
            $orderDetailsDTO->setItemVendorId($orderBasketDTO->getItemVendorId());
            //Get Item Vendor Obj
            $bItemVendor = new BItemVendor();
            $itemVendorDTO = $bItemVendor->getDTOById($orderBasketDTO->getItemVendorId());

            $orderDetailsDTO->setItemMasterId($itemVendorDTO->getItemMasterId());
            //Get Item Vendor Obj
            $orderDetailsDTO->setTaxIncluded($itemVendorDTO->getTaxIncluded()); //TODO read from item vendor table.
            $orderDetailsDTO->setItemName($orderBasketDTO->getName());
            $orderDetailsDTO->setCurrencyCode("SAR"); //TODO Change Currency Code to read from item vendor table.
            $orderDetailsDTO->setBasicPrice($itemVendorDTO->getBasicPrice()); //TODO change price to get it from item vendor
            //
            ////Taxes Already Handleded inside order details creation. Check out line # 40.
//        $orderDetailsDTO->setTaxId($itemVendorDTO->getTaxId());//TODO Change Currency Code to read from item vendor table.
//        $orderDetailsDTO->setTaxAmount(null);//TODO Change Currency Code to read from item vendor table.
            //TODO. Update Order Basket Status to Completed.
            $orderBasketDTO->setStatus(AppDTO::$ORDER_NO_COMPLETED);
            $this->updateOrderBasketStatus($orderBasketDTO);
            $orderDetailsDTO->setApiCall($orderMasterDTO->getApiCall());
            return $bOrderDetails->saveObject($orderDetailsDTO);
        }
    }

    public function updateOrderBasketStatus(OrderBasketDTO $orderBasketDTO) {
        DBUtil::updateById('order_basket', $orderBasketDTO->getId(), 'status', $orderBasketDTO->getStatus());
    }

    private function fillInOrderBasket($obj, OrderBasketDTO $orderBasketDTO) {
        $orderBasketDTO->setId($obj->id);
        $orderBasketDTO->setName($obj->name);
        $orderBasketDTO->setDeleted($obj->deleted);
        $orderBasketDTO->setItemVendorId($obj->item_vendor_id);
        $orderBasketDTO->setUserId($obj->user_id);
        $orderBasketDTO->setStatus($obj->status);
    }

}
