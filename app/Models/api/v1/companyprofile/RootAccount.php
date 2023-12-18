<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\companyprofile;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\CustomerDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\CompanyProfileDTO;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;
use App\Http\Controllers\api\v1\dto\RootAccountDTO;

/**
 * @author ISG
 */
class RootAccount extends Model implements ModelInterface {

    public function getAccountByDefinedCode(RootAccountDTO $rootAccountDTO) {

        $query = "select * from " . $this->table . " where root_account_code = '" . $rootAccountDTO->getRootAccountCode() . "' limit 1";
//        echo $query; die;
        $restult = DBUtil::select($query);
        if ($restult) {
            $this->fillInRootAccountDtoFromResult($rootAccountDTO, $restult);
            return $rootAccountDTO;
        }
        return null;
    }

    private function fillInRootAccountDtoFromResult(RootAccountDTO $rootAccountDTO, $restult) {
        $rootAccountDTO->setRootAccountCode($restult[0]->root_account_code);
        $rootAccountDTO->setCompanyCode($restult[0]->company_code);
        $rootAccountDTO->setCompanyName($restult[0]->company_name);
        $rootAccountDTO->setId($restult[0]->id);
    }
    
    public function saveAccount(RootAccountDTO $rootAccountDTO){
        $this->company_name = $rootAccountDTO->getCompanyName();
        $this->root_account_code = $rootAccountDTO->getRootAccountCode();
        $this->company_code = $rootAccountDTO->getCompanyCode();
        
        return $this->save();
    }
            

    public function getDTOById($id) {
        
    }

    public $timestamps = true;
    protected $table = 'isg_root_account';

}
