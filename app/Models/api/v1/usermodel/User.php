<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\usermodel;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\UserOtpDTO;

/**
 * @author ISG
 */
class User extends Model implements ModelInterface{

    public function listAll() {
        $query = "select id, user_name from isg_user";

        $result = DBUtil::select($query);

        return $result;
    }
    public function activateUser(UserDTO $userDTO){
        $user=User::find($userDTO->getId());
        $user->user_active = $userDTO->isUserActive();
        $user->is_phone_verified = $userDTO->isPhoneVerified();

        $user->save();

        return $user;

    }
    public function getUserByUserName(UserDTO $userDTO) {
        $query = "select * from isg_user where user_name ='" . $userDTO->getUserName() ."'"
                . " and user_active ='". AppDTO::$TRUE_AS_STRING ."'";

        $result = DBUtil::select($query);

        return $result;
    }

    public function getUserByPhoneNumber(UserDTO $userDTO) {
        $query = "select * from isg_user where user_phone_no ='" . $userDTO->getPhoneNumber() ."'";
               // . " and user_active ='". AppDTO::$TRUE_AS_STRING ."'";

        $result = DBUtil::select($query);

        return $result;
    }



    public function createUser(UserDTO $userDTO) {
        //Create New User
        $user = new User();
        $user->user_name = $userDTO->getUserName();
        $user->password = Hash::make($userDTO->getPassword());
        $user->first_name = $userDTO->getFullName();
        $user->last_name = $userDTO->getLastName();
        $user->user_active = $userDTO->isUserActive();
        $user->user_last_login = $userDTO->getUserLastLogin();
        $user->is_email_verified = $userDTO->isEmailVerified();
        $user->is_phone_verified = $userDTO->isPhoneVerified();
        $user->user_phone_no = $userDTO->getPhoneNumber();
        //New release
        // $user->user_email = "raed@isglobal.co";
        $user->user_email = $userDTO->getUserEmail();
        $user->save();

        return $user;
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
    public function getDTOByPhoneNo(UserOtpDTO $userOtpDto)
    {
        $targetUserDTO = new UserDTO("", "");
        $userArr1 = User::where('user_phone_no', $userOtpDto->getPhoneNumber())->get();
        if($userArr1)
        {
        //    $targetUserDTO->setId($userArr[0]->id);
        //    $targetUserDTO->setUserName($userArr[0]->user_name);
         //   $targetUserDTO->setFirstName($userArr[0]->first_name);
        //    $targetUserDTO->setLastName($userArr[0]->last_name);
         //   $targetUserDTO->setIsPhoneVerified($userArr[0]->is_phone_verified);
         //   return $targetUserDTO;
         return 0;
        }
        return $userArr1;
    }


    public function createUserByPhoneNumber(UserDTO $userDTO)
    {
        $userDTO->setIsPhoneVerified(AppDTO::$TRUE_AS_STRING);
        $userDTO->setUserActive(AppDTO::$TRUE_AS_STRING);
        return $this->createUser($userDTO);
    }

    public $timestamps = true;
    protected $table = 'isg_user';

}
