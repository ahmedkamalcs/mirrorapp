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
use App\Http\Controllers\api\v1\dto\PrivacyPolicyTemplateDTO;


/**
 * @author ISG
 */
class PrivacyPolicyTemplateModel extends Model implements ModelInterface{


    public function saveObject(PrivacyPolicyTemplateDTO $privacyPolicyTemplateDTO) {
        $this->fillInData($privacyPolicyTemplateDTO);
        $this->save();
        return $this;
    }

    private function fillInData(PrivacyPolicyTemplateDTO $privacyPolicyTemplateDTO) {
        $this->title = $privacyPolicyTemplateDTO->getTitle();
        $this->content = $privacyPolicyTemplateDTO->getContent();
        $this->active = $privacyPolicyTemplateDTO->getActive();
    }


    public $timestamps = true;
    protected $table = 'isg_privacy_policy_template';
    public function getDTOById($id) {

    }

}
