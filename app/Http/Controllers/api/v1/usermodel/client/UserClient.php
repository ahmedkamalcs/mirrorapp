<?php

namespace App\Http\Controllers\api\v1\usermodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\dto\UserDTO;
use App\Http\Controllers\api\v1\dto\UserCompanyDTO;
use App\Http\Controllers\api\v1\sns\bo\bUserOtp;
use App\Http\Controllers\api\v1\dto\UserOtpDTO;
class UserClient  {

    public function listAll() {
        
       $buser = new BUser();
       $userDTO = new UserDTO(null, null);
       
       return $buser->listAll($userDTO);
    }

    public function loginByUserName(Request $request)
    {
        //Build User DTO
        $userDTO = new UserDTO($request->userName, $request->password);
        $buser = new BUser();
        return $buser->loginByUserName($userDTO);
    }
    
    public function loginByPhoneNumber(Request $request)
    {
        //Build User DTO
        $userOtpDTO = new UserOtpDTO();
        $userOtpDTO->setPhoneNumber($request->phoneNumber);
        $bUserOtp = new bUserOtp();
        return $bUserOtp->saveOtp($userOtpDTO);
   
        //$userDTO->setPhoneNumber($request->phoneNo);
        //$buser = new BUser();
//        $userDTO->setApiCall('0');
       // return $buser->loginByPhoneNumber($userDTO);
    }
    
    public function createUser(Request $request)
    {
        $userDTO = new UserDTO($request->userName, $request->password);
        $userDTO->setFirstName($request->firstName);
        //TODO Complete User Entry.
//        $userDTO->setApiCall('0');
        $bUser = new BUser();
        return $bUser->createUser($userDTO);
    }
    
    /*public function validateUser(Request $request)
    {
        $userDTO = new UserDTO($request->userName, $request->password);
        $bUser = new BUser();
        
        return $bUser->validateUserPassword($userDTO);
    }*/
    
    public function createUserByPhoneNumber(Request $request)
    {
        $userOtpDTO = new UserOtpDTO();
        $userOtpDTO->setFullName($request->FullName);
        $userOtpDTO->setPhoneNumber($request->phoneNumber);
        //$userDTO->setLastName($request->lastName);
        //$userDTO->setPassword($request->password);
        //$userDTO->setApiCall('1');
        $bUserOtp = new bUserOtp();
        return $bUserOtp->saveOtp($userOtpDTO);
    }
    
    public function addUserToCompany(Request $request){
        $userCompanyDto = new UserCompanyDTO();
        
        $userCompanyDto->setApiCall(AppDTO::$TRUE_AS_STRING);
        
        $userCompanyDto->setCompanyId($request->companyId);
        $userCompanyDto->setCompanyCode($request->companyCode);
        $userCompanyDto->setUsersId($request->userId);
        
        $bUser = new BUser();
        return $bUser ->addUserToCompany($userCompanyDto);
    }
    
    public function listUsersCompanies(){
         $userCompanyDto = new UserCompanyDTO();
        
        $userCompanyDto->setApiCall(AppDTO::$TRUE_AS_STRING);
        $bUser = new BUser();
        return $bUser ->listUsersCompanies($userCompanyDto);
    }
    
    public function listUserCompaniesByUserId(Request $request){
         $userCompanyDto = new UserCompanyDTO();
        
        $userCompanyDto->setApiCall(AppDTO::$TRUE_AS_STRING);
        $userCompanyDto->setUsersId($request->userId);
        
        $bUser = new BUser();
        return $bUser ->listUserCompaniesByUserId($userCompanyDto);
    }
    
    public function listUserCompaniesByEmailId(Request $request){
         $userCompanyDto = new UserCompanyDTO();
        
        $userCompanyDto->setApiCall(AppDTO::$TRUE_AS_STRING);
        $userCompanyDto->setUserEmail($request->emailId);
        
        $bUser = new BUser();
        return $bUser ->listUserCompaniesByEmailId($userCompanyDto);
    }
}
