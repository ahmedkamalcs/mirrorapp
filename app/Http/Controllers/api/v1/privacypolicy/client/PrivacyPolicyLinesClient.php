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
use App\Http\Controllers\api\v1\dto\PrivacyPolicyLinesDTO;
use App\Http\Controllers\api\v1\privacypolicy\bo\BPrivacyPolicyLines;

class PrivacyPolicyLinesClient  {

     public function save(Request $request) {
        $privacyPolicyLinesDTO = new PrivacyPolicyLinesDTO();
        $privacyPolicyLinesDTO->setTitle($request->title);
        $privacyPolicyLinesDTO->setContent($request->content);
        $privacyPolicyLinesDTO->setActive($request->active);        
        $privacyPolicyLinesDTO->setHeaderId($request->headerId);
                
        $bPrivacyPolicyLine = new BPrivacyPolicylines();
        $privacyPolicyLinesDTO->setApiCall('1');
        return $bPrivacyPolicyLine->saveObject($privacyPolicyLinesDTO);
    }
    
   

}
