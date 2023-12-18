<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\privacypolicy;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\ItemMasterDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\sys\bo\BSystemSeries;
use App\Http\Controllers\api\v1\dto\SystemSeriesDTO;
use App\Http\Controllers\api\v1\dto\OrderMasterDTO;
use App\Http\Controllers\api\v1\dto\OrderDetailsDTO;
use App\Http\Controllers\api\v1\dto\PrivacyPolicyQuestionnaireDTO;

/**
 * @author ISG
 */
class PrivacyPolicyQuestionnaireModel extends Model implements ModelInterface {

    public function saveObject(PrivacyPolicyQuestionnaireDTO $privacyPolicyQuestionnaireDTO) {
        $this->fillInData($privacyPolicyQuestionnaireDTO);
        $this->save();
        return $this;
    }

    private function fillInData(PrivacyPolicyQuestionnaireDTO $privacyPolicyQuestionnaireDTO) {
        $this->business_type = $privacyPolicyQuestionnaireDTO->getBusinessType();
        $this->application_type = $privacyPolicyQuestionnaireDTO->getApplicationType();
        $this->website_url = $privacyPolicyQuestionnaireDTO->getWebsiteURL();
        $this->advertising = $privacyPolicyQuestionnaireDTO->getAdvertising();
        $this->social_media_facebook = $privacyPolicyQuestionnaireDTO->getSocialMediaFacebook();
        $this->social_media_instgram = $privacyPolicyQuestionnaireDTO->getSocialMediaInstgram();
        $this->social_media_twitter = $privacyPolicyQuestionnaireDTO->getSocialMediaTwitter();
        $this->social_media_linkedin = $privacyPolicyQuestionnaireDTO->getSocialMediaLinkedIn();
        $this->social_media_youtube = $privacyPolicyQuestionnaireDTO->getSocialMediaYoutube();
        $this->active = $privacyPolicyQuestionnaireDTO->getActive();
    }

    public $timestamps = true;
    protected $table = 'isg_privacy_policy_questionnaire';

    public function getDTOById($id) {

    }

}
