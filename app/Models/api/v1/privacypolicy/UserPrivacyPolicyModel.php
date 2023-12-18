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
use App\Http\Controllers\api\v1\dto\UserPrivacyPolicyDTO;


/**
 * @author ISG
 */
class UserPrivacyPolicyModel extends Model implements ModelInterface{


    public function saveObject(UserPrivacyPolicyDTO $userPrivacyPolicy) {
        $this->fillInData($userPrivacyPolicy);
        $this->save();
        return $this;
    }

    private function fillInData(UserPrivacyPolicyDTO $userPrivacyPolicy) {
        $this->note = $userPrivacyPolicy->getNote();
        $this->user_id = $userPrivacyPolicy->getUserId();
        $this->privacy_policy_header_id = $userPrivacyPolicy->getHeaderId();
        $this->active = $userPrivacyPolicy->getActive();
    }

    public $timestamps = true;
    protected $table = 'isg_user_privacy_policy';
    public function getDTOById($id) {

    }

}
