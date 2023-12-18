<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\signupstaging;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\SignupStagingDTO;

/**
 * @author ISG
 */
class SignupStagingModel extends Model implements ModelInterface {

    public function saveDTO(SignupStagingDTO $signupStagingDTO) {
        return $this->saveOrUpdateDTO($signupStagingDTO);
    }

    public function getOTPArrayByEmailOrMobile(SignupStagingDTO $signupStagingDTO) {

        $otp = "0000";
        if ($signupStagingDTO->getEmail() != null && !empty($signupStagingDTO->getEmail())) {
            $query = "SELECT otp from " . $this->table . " where email = '" . $signupStagingDTO->getEmail() . "' limit 1";
            $result = DBUtil::select($query);
            if ($result) {
                $otp = $result[0]->otp;
                return str_split($otp);
            }
        }else if ($signupStagingDTO->getMobileNo() != null && !empty($signupStagingDTO->getMobileNo())) {
            $query = "SELECT otp from " . $this->table . " where mobile_no = '" . $signupStagingDTO->getMobileNo() . "' limit 1";
            $result = DBUtil::select($query);
            if ($result) {
                $otp = $result[0]->otp;
                return str_split($otp);
            }
        }
        return str_split($otp);
    }

    private function saveOrUpdateDTO(SignupStagingDTO $signupStagingDTO) {
        //Find User by Email
        $query = "SELECT id from " . $this->table . " where email = '" . $signupStagingDTO->getEmail() . "' limit 1";

        $result = DBUtil::select($query); //UserOTP::where('phone_number', $userOtpDTO->getPhoneNumber() )->get();

        if ($result) {
            $id = $result[0]->id;
            $user = SignupStagingModel::find($id);
            $userModel = $this->fillinDTO($signupStagingDTO, $user);
            $userModel->update();
        } else {
            $this->fillinDTO($signupStagingDTO, null);
            $this->save();
        }
    }

    public function fillinDTO(SignupStagingDTO $signupStagingDTO, $user) {
        if ($user != null) {
            if ($signupStagingDTO->getEmail() != null && $signupStagingDTO->getEmail() != '') {
                $user->email = $signupStagingDTO->getEmail();
            }
            if ($signupStagingDTO->getMobileNo() != null && $signupStagingDTO->getMobileNo() != '') {
                $user->mobile_no = $signupStagingDTO->getMobileNo();
            }
            if ($signupStagingDTO->getBusinessType() != null && $signupStagingDTO->getBusinessType() != '') {
                $user->business_type = $signupStagingDTO->getBusinessType();
            }
            if ($signupStagingDTO->getOtp() != null && $signupStagingDTO->getOtp() != '') {
                $user->otp = $signupStagingDTO->getOtp();
            }
            if ($signupStagingDTO->getName() != null && $signupStagingDTO->getName() != '') {
                $user->name = $signupStagingDTO->getName();
            }
            if ($signupStagingDTO->getOrgName() != null && $signupStagingDTO->getOrgName() != '') {
                $user->org_name = $signupStagingDTO->getOrgName();
            }
            if ($signupStagingDTO->getPassword() != null && $signupStagingDTO->getPassword() != '') {
                $user->password = $signupStagingDTO->getPassword();
            }
            if ($signupStagingDTO->getStatus() != null && $signupStagingDTO->getStatus() != '') {
                $user->status = $signupStagingDTO->getStatus();
            }
            if ($signupStagingDTO->getSignupType() != null && $signupStagingDTO->getSignupType() != '') {
                $user->signup_type = $signupStagingDTO->getSignupType();
            }
            return $user;
        } else {
            if ($signupStagingDTO->getEmail() != null && $signupStagingDTO->getEmail() != '') {
                $this->email = $signupStagingDTO->getEmail();
            }
            if ($signupStagingDTO->getMobileNo() != null && $signupStagingDTO->getMobileNo() != '') {
                $this->mobile_no = $signupStagingDTO->getMobileNo();
            }
            if ($signupStagingDTO->getBusinessType() != null && $signupStagingDTO->getBusinessType() != '') {
                $this->business_type = $signupStagingDTO->getBusinessType();
            }
            if ($signupStagingDTO->getOtp() != null && $signupStagingDTO->getOtp() != '') {
                $this->otp = $signupStagingDTO->getOtp();
            }
            if ($signupStagingDTO->getName() != null && $signupStagingDTO->getName() != '') {
                $this->name = $signupStagingDTO->getName();
            }
            if ($signupStagingDTO->getOrgName() != null && $signupStagingDTO->getOrgName() != '') {
                $this->org_name = $signupStagingDTO->getOrgName();
            }
            if ($signupStagingDTO->getPassword() != null && $signupStagingDTO->getPassword() != '') {
                $this->password = $signupStagingDTO->getPassword();
            }
            if ($signupStagingDTO->getStatus() != null && $signupStagingDTO->getStatus() != '') {
                $this->status = $signupStagingDTO->getStatus();
            }
            if ($signupStagingDTO->getSignupType() != null && $signupStagingDTO->getSignupType() != '') {
                $this->signup_type = $signupStagingDTO->getSignupType();
            }
            return $this;
        }
    }

    public $timestamps = true;
    protected $table = 'isg_signup_staging';

}
