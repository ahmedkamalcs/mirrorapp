<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\customer;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\CustomerDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;
use App\Models\api\v1\companyprofile\CompanyProfile;

/**
 * @author ISG
 */
class Customer extends Model implements ModelInterface{


    public function createCustomer(CustomerDTO $customerDTO) {
        //Create New Customer B2C
        $this->customer_number = $customerDTO->getCustomerNumber();
        $this->first_name = $customerDTO->getFirstName();
        $this->last_name = $customerDTO->getLastName();
        $this->tel_no = $customerDTO->getTelNo();
        $this->email = $customerDTO->getEmail();
        $this->adress1 = $customerDTO->getAddress1();
        $this->adress2 = $customerDTO->getAddress2();
        $this->customer_type = $customerDTO->getCustomerType();


        //B2B
        $this->company_name = $customerDTO->getCompanyName();
        $this->company_name_ar = $customerDTO->getCompanyNameAr();
        $this->country = $customerDTO->getCountry();
        $this->city = $customerDTO->getCity();
        $this->website = $customerDTO->getWebsite();
        $this->phone = $customerDTO->getPhone();
        $this->contact = $customerDTO->getContact();
        $this->position = $customerDTO->getPosition();
        $this->vat_number = $customerDTO->getVatNumber();
        $this->history = $customerDTO->getHistory();
        $this->notes = $customerDTO->getNotes();


        CompanyProfile::fillInCompanyCode($this);
        $this->save();

        return $this;
    }

    public function listAllCustomersB2C() {

        $bCompanyProfile = new BCompanyProfile();
        $companyCode = $bCompanyProfile->getActiveCompanyCode();

        $query = "select * from isg_customer_master_data where company_code = '" . $companyCode . "'" . " and customer_type = '".AppDTO::$EINVOICE_TYPE_B2C."'";
        
        $userOtpArr = DBUtil::select($query);
        if($userOtpArr)
        {
            return $userOtpArr;
        }
        return null;
    }

    public function listAllCustomersB2B() {

        $bCompanyProfile = new BCompanyProfile();
        $companyCode = $bCompanyProfile->getActiveCompanyCode();

        $query = "select * from isg_customer_master_data where company_code = '" . $companyCode . "'" . " and customer_type = '".AppDTO::$EINVOICE_TYPE_B2B."'";
        $userOtpArr = DBUtil::select($query);
        if($userOtpArr)
        {
            return $userOtpArr;
        }
        return null;
    }



    public function getDTOById($id)
    {
        $targetUserDTO = new UserDTO("", "");
        $thisArr = User::where('id', $id )->get();
        if($thisArr)
        {
            $targetUserDTO->setId($thisArr[0]->id);
            $targetUserDTO->setUserName($thisArr[0]->user_name);
            $targetUserDTO->setFirstName($thisArr[0]->first_name);
            $targetUserDTO->setLastName($thisArr[0]->last_name);
            return $targetUserDTO;
        }
        return null;
    }


    public $timestamps = true;
    protected $table = 'isg_customer_master_data';

}
