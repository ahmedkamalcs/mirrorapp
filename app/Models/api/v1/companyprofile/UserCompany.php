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
use App\Http\Controllers\api\v1\dto\UserCompanyDTO;

/**
 * @author ISG
 */
class UserCompany extends Model implements ModelInterface {

//    public static function getActiveCompanyCode() {
//
//        return auth()->user()->company_code;
//
//        /* $query = "select company_code from company_profile_data where ACTIVE = '1' limit 1";
//          $userOtpArr = DBUtil::select($query);
//          if($userOtpArr)
//          {
//          return $userOtpArr[0]->company_code;
//          }
//          return null; */
//    }

//    public function getActiveCompanyName() {
//
//        $query = "select company_name from isg_company_profile_data where ACTIVE = '1' limit 1";
//        $userOtpArr = DBUtil::select($query);
//        if ($userOtpArr) {
//            return $userOtpArr[0]->company_name;
//        }
//        return null;
//    }

//    public function getActiveCompanyProfileDTO() {
//
////        $query = "select * from company_profile_data where ACTIVE = '1' limit 1";
//        $query = "select * from isg_company_profile_data where company_code = " . auth()->user()->company_code . " limit 1";
//        $companyProfileArr = DBUtil::select($query);
//
//        if ($companyProfileArr) {
//            //Fill In Company DTO
//            return $this->fillInAndReturnActiveCompanyDTO($companyProfileArr);
//        }
//        return null;
//    }

//    private function fillInAndReturnActiveCompanyDTO($companyProfileArr) {
//        $companyProfileDTO = new CompanyProfileDTO();
//        $companyProfileDTO->setId($companyProfileArr[0]->id);
//        $companyProfileDTO->setCompanyCode($companyProfileArr[0]->company_code);
//        $companyProfileDTO->setActive($companyProfileArr[0]->ACTIVE);
//        $companyProfileDTO->setCompanyName($companyProfileArr[0]->company_name);
//
//        $companyProfileDTO->setBusinessName($companyProfileArr[0]->bsiness_name);
//        $companyProfileDTO->setEmailId($companyProfileArr[0]->email_id);
//        $companyProfileDTO->setContactName($companyProfileArr[0]->contact_name);
//        $companyProfileDTO->setContactNumber($companyProfileArr[0]->contact_number);
//        $companyProfileDTO->setCountry($companyProfileArr[0]->country);
//        $companyProfileDTO->setCity($companyProfileArr[0]->city);
//        $companyProfileDTO->setCrNumber($companyProfileArr[0]->cr_number);
//        $companyProfileDTO->setCrUpload($companyProfileArr[0]->cr_upload);
//        $companyProfileDTO->setVatNumber($companyProfileArr[0]->vat_number);
//        $companyProfileDTO->setVatCertificateUpload($companyProfileArr[0]->vat_certificate_upload);
//        $companyProfileDTO->setBusinessLogoUpload($companyProfileArr[0]->business_logo_upload);
//        $companyProfileDTO->setBankName($companyProfileArr[0]->bank_name);
//        $companyProfileDTO->setBankAccountNumber($companyProfileArr[0]->bank_account_number);
//        $companyProfileDTO->setIban($companyProfileArr[0]->iban);
//
//
//        return $companyProfileDTO;
//    }

//    public function updateActiveCompany(CompanyProfileDTO $companyProfileDTO) {
//        //Deactivate All Companies Except the Active One
////        ['active' => true]
//
//        $updateArr = ['ACTIVE' => '0'];
//        DBUtil::massUpdate($this->table, $updateArr);
//
//        //Activate
//        DBUtil::updateByColName($this->table, 'company_code', $companyProfileDTO->getCompanyCode(), 'ACTIVE', '1');
//    }

    public function getDTOById($id) {

        return null;
    }

//    public static function fillInCompanyCode($obj) {
//
//        //fill in company profile data
//        $obj->company_code = 0;
//        $bCompanyProfile = new BCompanyProfile();
//        $companyCode = $bCompanyProfile->getActiveCompanyCode();
//        $obj->company_code = $companyCode;
//    }
//
//    public function saveObject(CompanyProfileDTO $companyProfileDTO) {
//
//        return $this->saveOrUpdate($companyProfileDTO);
//    }
//
//    private function saveOrUpdate($companyProfileDTO) {
//
//        $query = "select id from "
//                . $this->table .
//                " where company_name = '" . $companyProfileDTO->getCompanyName() . "'"
//                . " and company_code = " . $companyProfileDTO->getCompanyCode();
//
//        $resultArr = DBUtil::select($query);
//        if ($resultArr) {//Update
//            $obj = CompanyProfile::find($resultArr[0]->id);
//            $this->fillInObjectFromDTO($obj, $companyProfileDTO);
//            $obj->save();
//            return $obj;
//        }
//
//        //Don't save new object. Exisiting company is being updated.
//        /* else{
//          $this->fillInObjectFromDTO($this, $companyProfileDTO);
//          $this->save();
//          return $this;
//          } */
//    }
//
//    private function fillInObjectFromDTO($obj, $companyProfileDTO) {
//        $obj->company_name = $companyProfileDTO->getCompanyName();
//        $obj->company_code = $companyProfileDTO->getCompanyCode();
//        $obj->bsiness_name = $companyProfileDTO->getBusinessName();
//        $obj->email_id = $companyProfileDTO->getEmailId();
//        $obj->contact_name = $companyProfileDTO->getContactName();
//        $obj->contact_number = $companyProfileDTO->getContactNumber();
//        $obj->country = $companyProfileDTO->getCountry();
//        $obj->city = $companyProfileDTO->getCity();
//        $obj->cr_number = $companyProfileDTO->getCrNumber();
//        $obj->cr_upload = $companyProfileDTO->getCrUpload();
//        $obj->vat_number = $companyProfileDTO->getVatNumber();
//        $obj->vat_certificate_upload = $companyProfileDTO->getVatCertificateUpload();
//        $obj->business_logo_upload = $companyProfileDTO->getBusinessLogoUpload();
//        $obj->bank_name = $companyProfileDTO->getBankName();
//        $obj->bank_account_number = $companyProfileDTO->getBankAccountNumber();
//        $obj->iban = $companyProfileDTO->getIban();
//        $obj->ACTIVE = 1;
//    }

    public function addUserToCompany(UserCompanyDTO $userCompanyDTO) {
        $this->company_id = $userCompanyDTO->getCompanyId();
        $this->company_code = $userCompanyDTO->getCompanyCode();
        $this->users_id = $userCompanyDTO->getUsersId();

        return $this->save();
    }

    public function listUsersCompanies(UserCompanyDTO $userCompanyDTO) {
        $query = "SELECT cp.company_name, cp.company_code, u.id AS 'user_id',
                    u.name AS 'user_name', u.email AS 'user_email' FROM isg_company_profile_data cp, users u, isg_user_company uc
                    where cp.id = uc.company_id
                    AND cp.company_code = uc.company_code
                    AND uc.users_id = u.id
                    AND u.approved = '1'
                    ORDER BY user_id asc";



        return DBUtil::select($query);
    }
    
    public function listUserCompaniesByUserId(UserCompanyDTO $userCompanyDTO) {
        $query = "SELECT cp.company_name, cp.company_code, u.id AS 'user_id',
                    u.name AS 'user_name', u.email AS 'user_email' FROM isg_company_profile_data cp, users u, isg_user_company uc
                    where cp.id = uc.company_id
                    AND cp.company_code = uc.company_code
                    AND uc.users_id = u.id
                    AND u.approved = '1'
                    and u.id = ". $userCompanyDTO->getUsersId() ."
                    ORDER BY user_id asc";



        return DBUtil::select($query);
    }
    
    
    public function listUserCompaniesByEmailId(UserCompanyDTO $userCompanyDTO) {
        $query = "SELECT distinct cp.company_name, cp.company_code, u.id AS 'user_id',
                    u.name AS 'user_name', u.email AS 'user_email' FROM isg_company_profile_data cp, users u, isg_user_company uc
                    where cp.id = uc.company_id
                    AND cp.company_code = uc.company_code
                    AND uc.users_id = u.id
                    AND u.approved = '1'
                    and u.email = '". $userCompanyDTO->getUserEmail() ."'
                    ORDER BY user_id asc";



        return DBUtil::select($query);
    }
    
    

    public $timestamps = true;
    protected $table = 'isg_user_company';

}
