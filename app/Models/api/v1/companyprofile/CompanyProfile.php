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
use App\Http\Controllers\api\v1\companyprofile\bo\BUserCompany;
use App\Http\Controllers\api\v1\dto\UserCompanyDTO;

/**
 * @author ISG
 */
class CompanyProfile extends Model implements ModelInterface{


    public static function getActiveCompanyCode() {

        //Depricated by User Companies
        return auth()->user()->company_code;

        /*$query = "select company_code from company_profile_data where ACTIVE = '1' limit 1";
        $userOtpArr = DBUtil::select($query);
        if($userOtpArr)
        {
            return $userOtpArr[0]->company_code;
        }
        return null;*/
    }


    

    public function getActiveCompanyName() {

        $query = "select company_name from isg_company_profile_data where ACTIVE = '1' limit 1";
        $userOtpArr = DBUtil::select($query);
        if($userOtpArr)
        {
            return $userOtpArr[0]->company_name;
        }
        return null;
    }

    public function getActiveCompanyProfileDTO($companyCode) {

//        $query = "select * from company_profile_data where ACTIVE = '1' limit 1";
        $query = "select * from isg_company_profile_data where company_code = '" .  $companyCode . "' limit 1";
        $companyProfileArr = DBUtil::select($query);

        if($companyProfileArr)
        {
            //Fill In Company DTO
            return $this->fillInAndReturnActiveCompanyDTO($companyProfileArr);
        }
        return null;
    }

    private function fillInAndReturnActiveCompanyDTO($companyProfileArr)
    {
        $companyProfileDTO = new CompanyProfileDTO();
        $companyProfileDTO->setId($companyProfileArr[0]->id);
        $companyProfileDTO->setCompanyCode($companyProfileArr[0]->company_code);
        $companyProfileDTO->setActive($companyProfileArr[0]->ACTIVE);
        $companyProfileDTO->setCompanyName($companyProfileArr[0]->company_name);

        $companyProfileDTO->setBusinessName($companyProfileArr[0]->bsiness_name);
        $companyProfileDTO->setEmailId($companyProfileArr[0]->email_id);
        $companyProfileDTO->setContactName($companyProfileArr[0]->contact_name);
        $companyProfileDTO->setContactNumber($companyProfileArr[0]->contact_number);
        $companyProfileDTO->setCountry($companyProfileArr[0]->country);
        $companyProfileDTO->setCity($companyProfileArr[0]->city);
        $companyProfileDTO->setCrNumber($companyProfileArr[0]->cr_number);
        $companyProfileDTO->setCrUpload($companyProfileArr[0]->cr_upload);
        $companyProfileDTO->setVatNumber($companyProfileArr[0]->vat_number);
        $companyProfileDTO->setVatCertificateUpload($companyProfileArr[0]->vat_certificate_upload);
        $companyProfileDTO->setBusinessLogoUpload($companyProfileArr[0]->business_logo_upload);
        $companyProfileDTO->setBankName($companyProfileArr[0]->bank_name);
        $companyProfileDTO->setBankAccountNumber($companyProfileArr[0]->bank_account_number);
        $companyProfileDTO->setIban($companyProfileArr[0]->iban);
        $companyProfileDTO->setVatRate($companyProfileArr[0]->vat_rate);
        $companyProfileDTO->setCurrency($companyProfileArr[0]->currency);


        return $companyProfileDTO;
    }

    public function updateActiveCompany(CompanyProfileDTO $companyProfileDTO)
    {
        //Deactivate All Companies Except the Active One
//        ['active' => true]

        $updateArr = ['ACTIVE' => '0'];
        DBUtil::massUpdate($this->table, $updateArr);

        //Activate:: Note: This will be depricated by user Company.
        DBUtil::updateByColName($this->table, 'company_code', $companyProfileDTO->getCompanyCode(), 'ACTIVE', '1');
        
//        //Save User Company
//        $bUserCompany = new BUserCompany();
//        $userCompanyDTO = new UserCompanyDTO();
//        $userCompanyDTO->setCompanyId($companyProfileDTO->getId());
//        $userCompanyDTO->setCompanyCode($companyProfileDTO->getCompanyCode());
//        $userCompanyDTO->setUsersId(12);
//        $bUserCompany->addUserToCompany($userCompanyDTO);

    }

    public function getDTOById($id)
    {

        return null;
    }

    public static function fillInCompanyCode($obj)
    {

        //fill in company profile data
        $obj->company_code = 0;
        $bCompanyProfile = new BCompanyProfile();
        $companyCode = $bCompanyProfile->getActiveCompanyCode();
        $obj->company_code = $companyCode;
    }


    public function saveObject(CompanyProfileDTO $companyProfileDTO)
    {

        return $this->saveOrUpdate($companyProfileDTO);
    }

    private function saveOrUpdate($companyProfileDTO)
    {

        $query = "select id from "
                . $this->table .
                " where company_name = '" . $companyProfileDTO->getCompanyName() . "'"
                . " and company_code = ". $companyProfileDTO->getCompanyCode();

        $resultArr = DBUtil::select($query);
        if($resultArr)//Update
        {
            $obj = CompanyProfile::find($resultArr[0]->id);
            $this->fillInObjectFromDTO($obj, $companyProfileDTO);
            $obj->save();
            return $obj;
        }else{
            //Register New Company.
            $this->fillInObjectFromDTO($this, $companyProfileDTO);
            $this->save();
            return $this;
        }
        //Don't save new object. Exisiting company is being updated.
        /*else{
            $this->fillInObjectFromDTO($this, $companyProfileDTO);
            $this->save();
            return $this;
        }*/
    }

    private function fillInObjectFromDTO($obj, CompanyProfileDTO $companyProfileDTO)
    {
        
        
        $obj->company_name = $companyProfileDTO->getCompanyName();
        $obj->company_code = $companyProfileDTO->getCompanyCode();
        $obj->bsiness_name = $companyProfileDTO->getBusinessName();
        $obj->email_id = $companyProfileDTO->getEmailId();
        $obj->contact_name = $companyProfileDTO->getContactName();
        $obj->contact_number = $companyProfileDTO->getContactNumber();
        $obj->country = $companyProfileDTO->getCountry();
        $obj->city = $companyProfileDTO->getCity();
        $obj->cr_number = $companyProfileDTO->getCrNumber();
        $obj->cr_upload = $companyProfileDTO->getCrUpload();
        $obj->vat_number = $companyProfileDTO->getVatNumber();
        $obj->vat_certificate_upload = $companyProfileDTO->getVatCertificateUpload();
        $obj->business_logo_upload = $companyProfileDTO->getBusinessLogoUpload();
        $obj->bank_name = $companyProfileDTO->getBankName();
        $obj->bank_account_number = $companyProfileDTO->getBankAccountNumber();
        $obj->iban = $companyProfileDTO->getIban();
//        $obj->ACTIVE = 1;
        $obj->ACTIVE = $companyProfileDTO->getActive();
        $obj->vat_rate = $companyProfileDTO->getVatRate();
        $obj->currency = $companyProfileDTO->getCurrency();
        
//        echo "Object has: ";
//        echo $obj->company_name; 
//        echo $obj->bsiness_name;  
//        die;
    }



    public $timestamps = true;
    protected $table = 'isg_company_profile_data';

}
