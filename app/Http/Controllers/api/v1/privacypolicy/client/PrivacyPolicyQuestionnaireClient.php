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
use App\Http\Controllers\api\v1\dto\PrivacyPolicyQuestionnaireDTO;
use App\Http\Controllers\api\v1\privacypolicy\bo\BPrivacyPolicyQuestionnaire;

class PrivacyPolicyQuestionnaireClient  {

    public function save(Request $request) {
        $privacyPolicyQuestionnaireDTO = new PrivacyPolicyQuestionnaireDTO();
        $privacyPolicyQuestionnaireDTO->setBusinessType($request->businessType);
        $privacyPolicyQuestionnaireDTO->setApplicationType($request->applicationType);
        $privacyPolicyQuestionnaireDTO->setWebsiteURL($request->websiteURL);        
        $privacyPolicyQuestionnaireDTO->setAdvertising($request->advertising);
        $privacyPolicyQuestionnaireDTO->setSocialMediaFacebook($request->socialMediaFacebook);
        $privacyPolicyQuestionnaireDTO->setSocialMediaInstgram($request->socialMediaInstgram);
        $privacyPolicyQuestionnaireDTO->setSocialMediaTwitter($request->socialMediaTwitter);
        $privacyPolicyQuestionnaireDTO->setSocialMediaLinkedIn($request->socialMediaLinkedIn);
        $privacyPolicyQuestionnaireDTO->setSocialMediaYoutube($request->socialMediaYoutube);
        $privacyPolicyQuestionnaireDTO->setActive($request->active);
                
        $bPrivacyPolicyQuestionnaire = new BPrivacyPolicyQuestionnaire();
//        $privacyPolicyQuestionnaireDTO->setApiCall('1');
        return $bPrivacyPolicyQuestionnaire->saveObject($privacyPolicyQuestionnaireDTO);
    }

}
