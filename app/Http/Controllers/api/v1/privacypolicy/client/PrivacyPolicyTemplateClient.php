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
use App\Http\Controllers\api\v1\dto\PrivacyPolicyTemplateDTO;
use App\Http\Controllers\api\v1\privacypolicy\bo\BPrivacyPolicyTemplate;

class PrivacyPolicyTemplateClient  {

    public function save(Request $request) {
        $privacyPolicyTemplateDTO = new PrivacyPolicyTemplateDTO();
        $privacyPolicyTemplateDTO->setTitle($request->title);
        $privacyPolicyTemplateDTO->setContent($request->content);
        $privacyPolicyTemplateDTO->setActive($request->active);
        
                
        $bPrivacyPolicyTemplate = new BPrivacyPolicyTemplate();
//        $privacyPolicyTemplateDTO->setApiCall('1');
        return $bPrivacyPolicyTemplate->saveObject($privacyPolicyTemplateDTO);
    }

}
