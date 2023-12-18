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

class BCompanyProfile extends Controller implements BusinessInterface {

    
    public function getDTOById($id) {
        
    }
    
    public function getActiveCompanyCode() {
        $companyProfile = new CompanyProfile();
        return $companyProfile->getActiveCompanyCode();
    }
    
    public function getActiveCompanyName() {
        $companyProfile = new CompanyProfile();
        return $companyProfile->getActiveCompanyName();
    }
    
    public function getActiveCompanyProfileDTO() {
        $companyProfile = new CompanyProfile();
        return $companyProfile->getActiveCompanyProfileDTO(CompanyProfile::getActiveCompanyCode());
    }
    
    
    public function updateActiveCompany(CompanyProfileDTO $companyProfileDTO)
    {
        $companyProfile = new CompanyProfile();
        $companyProfile->updateActiveCompany($companyProfileDTO);
    }
    
    public function saveObject(CompanyProfileDTO $companyProfileDTO)
    {
        $companyProfile = new CompanyProfile();
        return $companyProfile->saveObject($companyProfileDTO);
    }
    
    
            
}
