<?php

namespace App\Http\Controllers\api\v1\sns\bo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\v1\ModelFactory;
use App\Http\Model\v1\event\EventCategoryModel;
use App\Http\Controllers\api\v1\dto\InvoiceDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Models\api\v1\paymentmodel\InvoiceModel;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
/* * *
 * @author ISG.
 * Business event class that handles business logic for Event Details table.
 */
use AWS;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;
use App\Models\api\v1\sns\UserOTP;
use App\Http\Controllers\api\v1\dto\UserOtpDTO;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;

class BUserOtp {

    public function saveOtp(UserOtpDTO $userOtpDTO) {
        $user = new user();
        $userDTO = new UserDTO("","");
        $userDTO->setFullName($userOtpDTO->getFullName());
        $userDTO->setPhoneNumber($userOtpDTO->getPhoneNumber());
        $userarr= $user->getUserByPhoneNumber($userDTO);
      
        if($userarr){ // user already exist
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "user already exist!";
            return JsonHandler::getJsonMessage($response);
        }
        $userDTO->setIsPhoneVerified("0");
        $userDTO->setUserActive("0");
        $userarr=$user->createUser($userDTO);
        //Generate OTP
        //$otp = rand(100000, 999999);
        $otp="1234";
        $userOtpDTO->setOTP($otp);
        $userOtp = new UserOTP();
        if ($userOtpDTO->getUserType()=="Employee"){
            $user = $userOtp->saveObject($userOtpDTO);
            return $user;
        }
        if ($userOtp->saveObject($userOtpDTO)) {
            if ($userOtpDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "OTP Sent!";
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($userOtpDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_FAILUE;
                $response['Message'] = "Something went wrong!";
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function verify(UserOtpDTO $userOtpDto) {
       
        $userOtp = new UserOTP();
        $userDTO = new UserDTO("","");
        $user = new user();
       
        $userDataDTO = $userOtp->getDataDTO($userOtpDto);
        if ($userDataDTO == null || $userOtpDto->getOTP() != $userDataDTO->getOTP()) {
            if ($userOtpDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Not Verified!";
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    // check if verified 

        $userDTO->setFullName($userDataDTO->getFullName());
        $userDTO->setPhoneNumber($userDataDTO->getPhoneNumber());
        $userarr= $user->getUserByPhoneNumber($userDTO);
      
        if(!$userarr){ // user not found
            $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "user not found!";
                $response['user'] = $userarr;
                return JsonHandler::getJsonMessage($response);
        }
        //Activate User
        if($userarr[0]->is_phone_verified=="0"){
            $userDTO->setId($userarr[0]->id);
            $userDTO->setIsPhoneVerified("1");
            $userDTO->setUserActive("1");
            $userarr=$user->activateUser($userDTO);
        }
        //Delete After Verification.
        $userOtp->deleteById($userDataDTO->getId());
        if ($userOtpDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Verified";
            $response['userDetails'] = $userarr;
            return JsonHandler::getJsonMessage($response);
        }else{
            return AppDTO::$TRUE_AS_STRING;
        }
    }
    public function verifyLogingOtp(UserOtpDTO $userOtpDto) {
        $userOtp = new UserOTP();
        $userDTO = new UserDTO("","");
        $user = new user();
       
        $userDataDTO = $userOtp->getDataDTO($userOtpDto);
        if ($userDataDTO == null || $userOtpDto->getOTP() != $userDataDTO->getOTP()) {
            if ($userOtpDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "Not Verified!";
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        // check if verified 
        $userDTO->setPhoneNumber($userDataDTO->getPhoneNumber());
        $userarr= $user->getUserByPhoneNumber($userDTO);
      
        if(!$userarr){ // user not found
            $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "user not found!";
                return JsonHandler::getJsonMessage($response);
        }
        //Delete After Verification.
        $userOtp->deleteById($userDataDTO->getId());
        if ($userOtpDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Verified";
            $response['userDetails'] = $userarr;
            return JsonHandler::getJsonMessage($response);
        }else{
            return AppDTO::$TRUE_AS_STRING;
        }
    }
    public function saveOTPByEmail(UserOtpDTO $userOtpDTO){
        $userOTP = new UserOTP();
        $userOTP->saveOTPByEmail($userOtpDTO);
    }
    
    public function getDTObyEmail(UserOtpDTO $userOtpDTO){
        $userOTP = new UserOTP();
        return $userOTP->getDTObyEmail($userOtpDTO);
    }

}
