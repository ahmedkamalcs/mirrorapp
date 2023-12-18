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
use App\Http\Controllers\api\v1\privacypolicy\bo\BPrivacyPolicyHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\PrivacyPolicyHeaderDTO;


class PrivacyPolicyHeaderClient  {

    public function save(Request $request) {
        $privacyPolicyHeaderDTO = new PrivacyPolicyHeaderDTO();
        $privacyPolicyHeaderDTO->setTitle($request->title);
        $privacyPolicyHeaderDTO->setConent($request->content);
        $privacyPolicyHeaderDTO->setActive($request->active);        
                
        $bPrivacyPolicyHeader = new BPrivacyPolicyHeader();
        $privacyPolicyHeaderDTO->setApiCall('0');
        return $bPrivacyPolicyHeader->saveObject($privacyPolicyHeaderDTO);
    }
    
   
}
