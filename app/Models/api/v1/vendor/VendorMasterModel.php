<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\vendor;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\VendorMasterDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;
use App\Models\api\v1\companyprofile\CompanyProfile;


/**
 * @author ISG
 */
class VendorMasterModel extends Model implements ModelInterface{

    public function listAllVendors() {

        $bCompanyProfile = new BCompanyProfile();
        $companyCode = $bCompanyProfile->getActiveCompanyCode();

        $query = "select * from isg_vendor_master where company_code = '" . $companyCode . "'";

        $result = DBUtil::select($query);

        return $result;
    }

    public function getUserByUserName(UserDTO $userDTO) {
        $query = "select * from isg_user where user_name ='" . $userDTO->getUserName() ."'"
                . " and user_active ='". AppDTO::$TRUE_AS_STRING ."'";

        $result = DBUtil::select($query);

        return $result;
    }

    public function getUserByPhoneNumber(UserDTO $userDTO) {
        $query = "select * from isg_user where user_phone_no ='" . $userDTO->getPhoneNumber() ."'"
                . " and user_active ='". AppDTO::$TRUE_AS_STRING ."'";

        $result = DBUtil::select($query);

        return $result;
    }



    public function saveObject(VendorMasterDTO $vendorMasterDTO) {
        //Create New User

        $this->name = $vendorMasterDTO->getName();
        $this->tel_no = $vendorMasterDTO->getTelNo();
        $this->location = $vendorMasterDTO->getLocation();

        $this->vat_certificate = $vendorMasterDTO->getVatCertificate();
        $this->cr_license = $vendorMasterDTO->getCrLicense();
        $this->bank_account_iban = $vendorMasterDTO->getBankAccountIBAN();
        $this->contact_details = $vendorMasterDTO->getConactDetails();

        if($vendorMasterDTO->getApiCall() == AppDTO::$FALSE_AS_STRING){
            CompanyProfile::fillInCompanyCode($this);
        }
        
        $this->save();
        $vendorMasterDTO->setId($this->id);
        return $vendorMasterDTO;
    }

    public function getDTOById($id)
    {
        $targetUserDTO = new UserDTO("", "");
        $userArr = User::where('id', $id )->get();
        if($userArr)
        {
            $targetUserDTO->setId($userArr[0]->id);
            $targetUserDTO->setUserName($userArr[0]->user_name);
            $targetUserDTO->setFirstName($userArr[0]->first_name);
            $targetUserDTO->setLastName($userArr[0]->last_name);
            return $targetUserDTO;
        }
        return null;
    }


    public function createUserByPhoneNumber(UserDTO $userDTO)
    {
        $userDTO->setIsPhoneVerified(AppDTO::$TRUE_AS_STRING);
        $userDTO->setUserActive(AppDTO::$TRUE_AS_STRING);
        return $this->createUser($userDTO);
    }

    public function listVendorForSelectItems()
    {
        $query = "select id, name from isg_vendor_master";
        $userOtpArr = DBUtil::select($query);
        if($userOtpArr)
        {
            return $userOtpArr;
        }
        return null;
    }

    public $timestamps = true;
    protected $table = 'isg_vendor_master';

}
