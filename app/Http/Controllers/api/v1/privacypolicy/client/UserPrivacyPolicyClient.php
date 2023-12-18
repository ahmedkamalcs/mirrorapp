<?php

namespace App\Http\Controllers\api\v1\privacypolicy\client;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\einvoice\EInvoiceHeaderModel;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use App\Http\Controllers\api\v1\einvoice\bo\BEInvoiceHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserPrivacyPolicyDTO;
use App\Http\Controllers\api\v1\privacypolicy\bo\BUserPrivacyPolicy;

class UserPrivacyPolicyClient  {

    public function save(Request $request) {
        $userPrivacyPolicyDTO = new UserPrivacyPolicyDTO();
        $userPrivacyPolicyDTO->setNote($request->note);
        $userPrivacyPolicyDTO->setUserId($request->userId);
        $userPrivacyPolicyDTO->setHeaderId($request->privacyHeaderId);
        $userPrivacyPolicyDTO->setActive($request->active);
        
                
        $bUserPrivacyPolicy = new BUserPrivacyPolicy();
//        $userPrivacyPolicyDTO->setApiCall('0');
        return $bUserPrivacyPolicy->saveObject($userPrivacyPolicyDTO);
    }

}
