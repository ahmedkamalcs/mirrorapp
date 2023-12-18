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
use App\Http\Controllers\api\v1\dto\UserCompanyDTO;
use App\Models\api\v1\companyprofile\UserCompany;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;

class BUserCompany extends Controller implements BusinessInterface {

    
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
    
    public function addUserToCompany(UserCompanyDTO $userCompanyDTO){
        $userCompany = new UserCompany();
        $userCompany->addUserToCompany($userCompanyDTO);
    }
    
    public function listUsersCompanies(UserCompanyDTO $userCompanyDTO){
        $userCompany = new UserCompany();
        return $userCompany->listUsersCompanies($userCompanyDTO);
    }
    
    public function listUserCompaniesByUserId(UserCompanyDTO $userCompanyDTO){
        $userCompany = new UserCompany();
        return $userCompany->listUserCompaniesByUserId($userCompanyDTO);
    }
    
    public function listUserCompaniesByEmailId(UserCompanyDTO $userCompanyDTO){
        $userCompany = new UserCompany();
        return $userCompany->listUserCompaniesByEmailId($userCompanyDTO);
    }
    
    //Update Actice Company Profile. From Dropdown
    public function updateActiveCompanyProfile(Request $request) {
        $companyCode = $request->companyprofileselect;
        $companyProfileDTO = new CompanyProfileDTO();
        $companyProfileDTO->setCompanyCode($companyCode);

        $bCompanyProfile = new BCompanyProfile();
        $bCompanyProfile->updateActiveCompany($companyProfileDTO);
    }
            
            
}
