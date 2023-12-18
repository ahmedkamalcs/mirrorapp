<?php

namespace App\Http\Controllers\api\v1\companyprofile\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\customer\Customer;
use App\Http\Controllers\api\v1\dto\CustomerDTO;
use App\Models\api\v1\companyprofile\CompanyProfile;
use App\Http\Controllers\api\v1\dto\CompanyProfileDTO;
use App\Models\api\v1\companyprofile\RootAccount;
use App\Http\Controllers\api\v1\dto\RootAccountDTO;

class BRootAccount extends Controller implements BusinessInterface {

    
    public function getAccountByDefinedCode(RootAccountDTO $rootAccountDTO)
    {
        $rootAccount = new RootAccount();
        return $rootAccount->getAccountByDefinedCode($rootAccountDTO);
    }

    public function getDTOById($id) {
        
    }
    
    public function saveAccount(RootAccountDTO $rootAccountDTO){
        $rootAccount = new RootAccount();
        return $rootAccount->saveAccount($rootAccountDTO);
    }

}
