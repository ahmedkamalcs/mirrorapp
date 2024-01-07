<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\sns;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\UserOtpDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\sns\bo\BSnsService;
use App\Http\Controllers\api\v1\dto\SnsDTO;
use App\Http\Controllers\isgapi\api\v1\util\StringUtil;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class UserOTP extends Model implements ModelInterface{




    /**
     * Constructor routing function.
     * Switch between constructors.
     */
    public function __construct() {
        $args = func_get_args(); //any function that calls this method can take an arbitrary number of parameters
        switch (func_num_args()) {
            //delegate to helper methods
            case 0:
                $this->construct0();
                break;
            case 1:
                $this->construct1($args[0]);
                break;
            case 2:
                $this->construct2($args[0], $args[1]);
            case 3:
                $this->construct3($args[0], $args[1], $args[2]);
                break;
            default:
                trigger_error('Incorrect number of arguments for Foo::__construct', E_USER_WARNING);
        }
    }

    /*
     * Default constructor.
     */
    public function construct0() {

    }

    /**
     * Constructor with one parameter.
     * @param type $request
     */
    public function construct1($request) {
    }

    /**
     * Constructor with three parameters.
     * @author ISG
     * @param type $taskTitle target task title.
     * @param type $taskDescription target task description.
     */
    public function construct2($userId, $eventTitleEn, $eventTitleAr) {
    }



    public function saveObject(UserOtpDTO $userOtpDTO)
    {

        //Delete old one.
        UserOTP::where('phone_number', $userOtpDTO->getPhoneNumber())->delete();

        $this->phone_number = $userOtpDTO->getPhoneNumber();
        $this->otp = $userOtpDTO->getOTP();
        $this->full_name= $userOtpDTO->getFullName();

        $obj = $this->save();
        $userOtpDTO->setId($this->id);

        //Send SMS.. Removed until Quota of the SMS is increased
//        $bSNSService = new BSnsService();
//        $bSNSService->sendSMS(new SnsDTO($userOtpDTO->getPhoneNumber(), $userOtpDTO->getOTP()));

        return $obj;
    }

    public function deleteById($id)
    {
        $obj = UserOTP::find($id);
        $obj->delete();
    }

    public function getDTOById($id) {
        $userOtpDTO = new UserOtpDTO();
        $userOtpArr = UserOTP::where('id', $id )->get();
        if($userOtpArr)
        {
            $userOtpDTO->setId($userOtpArr[0]->id);
            $userOtpDTO->setPhoneNumber($userOtpArr[0]->phone_number);
            $userOtpDTO->setOTP($userOtpArr[0]->otp);
            return $userOtpDTO;
        }
        return null;
    }

    public function getDataDTO(UserOtpDTO $userOtpDTO)
    {
        $userOtp = new UserOtpDTO();
        $query = "select * from ".$this->table." where phone_number = '".$userOtpDTO->getPhoneNumber()."'"
                   . " order by created_at desc limit 1";
        $userOtpArr = DBUtil::select($query);//UserOTP::where('phone_number', $userOtpDTO->getPhoneNumber() )->get();
        if($userOtpArr)
        {
            $userOtp->setId($userOtpArr[0]->id);
            $userOtp->setPhoneNumber($userOtpArr[0]->phone_number);
            $userOtp->setOTP($userOtpArr[0]->otp);
            $userOtp->setFullName($userOtpArr[0]->full_name);
            return $userOtp;
        }
        return null;
    }


    public function saveOTPByEmail(UserOtpDTO $userOtpDTO){
        $this->email = $userOtpDTO->getEmail();
        $this->otp = $userOtpDTO->getOTP();
        $this->save();
    }
    
    public function getDTObyEmail(UserOtpDTO $userOtpDTO){
        
        $query = "select * from ".$this->table." where email = '".$userOtpDTO->getEmail()."'"
                   . " order by created_at desc limit 1";
        $userOtpArr = DBUtil::select($query);
        if($userOtpArr)
        {
            $userOtpDTO->setId($userOtpArr[0]->id);
            $userOtpDTO->setEmail($userOtpArr[0]->email);
            $userOtpDTO->setOTP($userOtpArr[0]->otp);
            $userOtpDTO->setFullName($userOtpArr[0]->full_name);
            return $userOtpDTO;
        }
        return null;
    }

    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'isg_user_otp';

}
