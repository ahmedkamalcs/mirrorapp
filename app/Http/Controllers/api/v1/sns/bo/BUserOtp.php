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
use App\Http\Controllers\api\v1\dto\JsonHandlerDTO;
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
        $userDTO = new UserDTO("", "");
        $userDTO->setFullName($userOtpDTO->getFullName());
        $userDTO->setPhoneNumber($userOtpDTO->getPhoneNumber());
        $userarr = $user->getUserByPhoneNumber($userDTO);

        if ($userarr) { // user  exist
//            $response = ['Message' => "User Already Exist!",
//                'isSucces' => APICodes::$TRANSACTION_ALREADY_EXIST,
//                'jsonData' => ['UserDetails' => $userarr]];
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("User already exists!");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_ALREADY_EXIST);
            $jsonHandlerDto->setResultInArr($userarr);

            return JsonHandler::getJsonMessage($jsonHandlerDto);
        }


        //Generate OTP
        //$otp = rand(100000, 999999);
        $otp = "1234";
        $userOtpDTO->setOTP($otp);
        $userOtp = new UserOTP();
        if ($userOtpDTO->getUserType() == "Employee") {
            $user = $userOtp->saveObject($userOtpDTO);
            return $user;
        }
        if ($userOtp->saveObject($userOtpDTO)) {
            // save the user
            if (!$userarr) { // user does not exist
                $userDTO->setIsPhoneVerified("0");
                $userDTO->setUserActive("0");
                $userarr = $user->createUser($userDTO);
            }


            if ($userOtpDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "OTP Sent!";

                /* $response = ['Message' => "OTP has been sent to user!",
                  'isSucces' => APICodes::$TRANSACTION_SUCCESS]; */

                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("OTP has been sent to user!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($userOtpDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_FAILUE;
                //$response['Message'] = "Something went wrong!";

                /*
                  $response = ['Message' => "Something went wrong!",
                  'isSucces' => APICodes::$TRANSACTION_FAILUE];
                 */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function saveRegistrationOtp(UserOtpDTO $userOtpDTO) {
        $user = new user();
        $userDTO = new UserDTO("", "");
        $userDTO->setFullName($userOtpDTO->getFullName());
        $userDTO->setPhoneNumber($userOtpDTO->getPhoneNumber());
        $userarr = $user->getUserByPhoneNumber($userDTO);
        if ($userarr) { // user  exist
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("User Already Exist!");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_ALREADY_EXIST);
            $jsonHandlerDto->setResultInArr($userarr);

            /* $response = ['Message' => "User Already Exist!",
              'isSucces' => APICodes::$TRANSACTION_ALREADY_EXIST,
              'jsonData' => ['UserDetails' => $userarr]]; */


            return JsonHandler::getJsonMessage($jsonHandlerDto);
            exit();
        } else {
            //Generate OTP
            //$otp = rand(100000, 999999);
            $otp = "1234";
            $userOtpDTO->setOTP($otp);
            $userOtp = new UserOTP();
            if ($userOtpDTO->getUserType() == "Employee") {
                $user = $userOtp->saveObject($userOtpDTO);
                return $user;
            }
            if ($userOtp->saveObject($userOtpDTO)) {
                // save the user
                if (!$userarr) { // user does not exist
                    $userDTO->setIsPhoneVerified("0");
                    $userDTO->setUserActive("0");
                    $userarr = $user->createUser($userDTO);
                }


                if ($userOtpDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                    //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                    //$response['Message'] = "OTP Sent!";
                    $jsonHandlerDto = new JsonHandlerDTO();
                    $jsonHandlerDto->setMessage("OTP has been sent to user!");
                    $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);

//                $response = ['Message' => "OTP has been sent to user!",
//                    'isSucces' => APICodes::$TRANSACTION_SUCCESS];


                    return JsonHandler::getJsonMessage($jsonHandlerDto);
                } else {
                    return AppDTO::$TRUE_AS_STRING;
                }
            } else {
                if ($userOtpDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                    //$response['Status'] = APICodes::$TRANSACTION_FAILUE;
                    //$response['Message'] = "Something went wrong!";
                    //
//                $response = ['Message' => "Something went wrong!",
//                    'isSucces' => APICodes::$TRANSACTION_FAILUE];
                    $jsonHandlerDto = new JsonHandlerDTO();
                    $jsonHandlerDto->setMessage("Something went wrong!");
                    $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                    return JsonHandler::getJsonMessage($jsonHandlerDto);
                } else {
                    return AppDTO::$FALSE_AS_STRING;
                }
            }
        }
    }

    public function saveLoginOtp(UserOtpDTO $userOtpDTO) {
        $user = new user();
        $userDTO = new UserDTO("", "");
        $userDTO->setFullName($userOtpDTO->getFullName());
        $userDTO->setPhoneNumber($userOtpDTO->getPhoneNumber());
        $userarr = $user->getUserByPhoneNumber($userDTO);
        if (!$userarr) { // user not exist exist
//            $response = ['Message' => "User does not Exist!",
//                'isSucces' => APICodes::$TRANSACTION_DATA_NOT_FOUND,
//                'jsonData' => []];
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("User does not Exist!");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

            return JsonHandler::getJsonMessage($jsonHandlerDto);
        }


        //Generate OTP
        //$otp = rand(100000, 999999);
        $otp = "1234";
        $userOtpDTO->setOTP($otp);
        $userOtp = new UserOTP();
        if ($userOtpDTO->getUserType() == "Employee") {
            $user = $userOtp->saveObject($userOtpDTO);
            return $user;
        }
        if ($userOtp->saveObject($userOtpDTO)) {


            if ($userOtpDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "OTP Sent!";


                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("OTP has been sent to user!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);

                /*
                  $response = ['Message' => "OTP has been sent to user!",
                  'isSucces' => APICodes::$TRANSACTION_SUCCESS];
                 */

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($userOtpDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_FAILUE;
                //$response['Message'] = "Something went wrong!";


                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                /*
                  $response = ['Message' => "Something went wrong!",
                  'isSucces' => APICodes::$TRANSACTION_FAILUE];
                 */

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function verify(UserOtpDTO $userOtpDto) {

        $userOtp = new UserOTP();
        $userDTO = new UserDTO("", "");
        $user = new User();

        $userDataDTO = $userOtp->getDataDTO($userOtpDto);
        if ($userDataDTO == null || $userOtpDto->getOTP() != $userDataDTO->getOTP()) {
            if ($userOtpDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Not Verified!";

                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Not Verified!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

//                $response=[ 'Message'=>"Not Verified!",
//                        'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND];

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        // check if verified 

        $userDTO->setFullName($userDataDTO->getFullName());
        $userDTO->setPhoneNumber($userDataDTO->getPhoneNumber());

        $userarr = array();
        $userarr = $user->getUserByPhoneNumber($userDTO);

        if (!$userarr) { // user not found
            //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
            //$response['Message'] = "user not found!";
            //$response['user'] = $userarr;
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("User not found!");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

            /*
              $response=[ 'Message'=>"User not found!",
              'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
              'jsonData'=>[]];
             */

            return JsonHandler::getJsonMessage($jsonHandlerDto);
        }
        //Activate User
        if ($userarr[0]->is_phone_verified == "0") {
            $userDTO->setId($userarr[0]->id);
            $userDTO->setIsPhoneVerified("1");
            $userDTO->setUserActive("1");
            $userarr = $user->activateUser($userDTO);
        }
        //Delete After Verification.
        $userOtp->deleteById($userDataDTO->getId());
        if ($userOtpDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            //$response['Message'] = "Verified";
            //$response['userDetails'] = $userarr;


            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("OTP has been Verified!");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultHead("userDetails");
            $jsonHandlerDto->setResultInArr($userarr);

            /*
              $response = ['Message' => "OTP has been Verified!",
              'isSucces' => APICodes::$TRANSACTION_SUCCESS,
              'jsonData' => ['userDetails' => $userarr]];
             */

            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public function verifyLogingOtp(UserOtpDTO $userOtpDto) {
        $userOtp = new UserOTP();
        $userDTO = new UserDTO("", "");
        $user = new user();

        $userDataDTO = $userOtp->getDataDTO($userOtpDto);
        if ($userDataDTO == null || $userOtpDto->getOTP() != $userDataDTO->getOTP()) {
            if ($userOtpDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {

                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Not Verified!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                /*
                  $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                  $response['Message'] = "Not Verified!";
                 */

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        // check if verified 
        $userDTO->setPhoneNumber($userDataDTO->getPhoneNumber());
        $userarr = $user->getUserByPhoneNumber($userDTO);

        if (!$userarr) { // user not found
//            $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
//            $response['Message'] = "user not found!";
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("User not found!");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

            return JsonHandler::getJsonMessage($jsonHandlerDto);
        }
        //Delete After Verification.
        $userOtp->deleteById($userDataDTO->getId());
        if ($userOtpDto->getApiCall() == AppDTO::$TRUE_AS_STRING) {


//            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
//            $response['Message'] = "Verified";
//            $response['userDetails'] = $userarr;


            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Verified!");
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultInArr($userarr);

            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public function saveOTPByEmail(UserOtpDTO $userOtpDTO) {
        $userOTP = new UserOTP();
        $userOTP->saveOTPByEmail($userOtpDTO);
    }

    public function getDTObyEmail(UserOtpDTO $userOtpDTO) {
        $userOTP = new UserOTP();
        return $userOTP->getDTObyEmail($userOtpDTO);
    }

}
