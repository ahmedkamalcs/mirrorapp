<?php

namespace App\Http\Controllers\api\v1\usermodel\bo;

use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\UserCompanyDTO;
use App\Models\api\v1\companyprofile\UserCompany;
use App\Http\Controllers\api\v1\companyprofile\bo\BUserCompany;

class BUser extends Controller implements BusinessInterface {

    public function listAll(UserDTO $userDTO) {

        //Prepare JSON Response.
        $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
        $response['Message'] = "Successfully received users.";

        $user = new User();
        $users = $user->listAll();

        if ($userDTO->getApiCall() == AppDTO::$FALSE_AS_STRING) {
            return $users;
        }

        $userList = array();
        foreach ($users as $userName) {
            $userList[] = $userName;
        }
        $response['users'] = $userList;

        return JsonHandler::getJsonMessage($response);
    }

    public function loginByUserName(UserDTO $userDTO) {
        //Get User Details
        $userModel = new User();
        $userArr = $userModel->getUserByUserName($userDTO);

        if ($userArr) {//Valid
            $hashedPassword = $userArr[0]->password;
            $plainPassword = $userDTO->getPassword();
            if ($userArr && Hash::check($plainPassword, $hashedPassword)) {

                if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                    $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                    $response['Message'] = "User Exists";
                    $response['User'] = $userArr[0]; //User Object
                    return JsonHandler::getJsonMessage($response);
                } else {
                    return AppDTO::$TRUE_AS_STRING;
                }
            } else {
                if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                    $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                    $response['Message'] = "User Doesn't Exists!!!";
                    $response['User'] = null;
                    return JsonHandler::getJsonMessage($response);
                } else {
                    return AppDTO::$FALSE_AS_STRING;
                }
            }
        } else {
            if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "User Doesn't Exists!!!";
                $response['User'] = null;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function loginByPhoneNumber(UserDTO $userDTO) {
        //Get User Details
        $userModel = new User();
        $userArr = $userModel->getUserByPhoneNumber($userDTO);

        if ($userArr) {//Valid
            $hashedPassword = $userArr[0]->password;
            $plainPassword = $userDTO->getPassword();
            if ($userArr && Hash::check($plainPassword, $hashedPassword)) {
                if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                    $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                    $response['Message'] = "User Exists";
                    $response['User'] = $userArr[0]; //User Object
                    return JsonHandler::getJsonMessage($response);
                } else {
                    return AppDTO::$TRUE_AS_STRING;
                }
            } else {
                if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                    $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                    $response['Message'] = "User Doesn't Exists!!!";
                    $response['User'] = null;
                    return JsonHandler::getJsonMessage($response);
                } else {
                    return AppDTO::$FALSE_AS_STRING;
                }
            }
        } else {
            if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                $response['Message'] = "User Doesn't Exists!!!";
                $response['User'] = null;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function createUser(UserDTO $userDTO) {
        $userModel = new User();
        $user = $userModel->createUser($userDTO);
        if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Created!";
            $response['User'] = $user; //User Object
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public function getDTOById($id) {
        $userModel = new User();
        return $userModel->getDTOById($id);
    }

    /* public function validateUserPassword(UserDTO $userDTO) {
      $user = new User();
      $userArr = $user->getUserByUserId($userDTO);
      if ($userArr) {
      $hashedPassword = $userArr[0]->password;
      $plainPassword = $userDTO->getPassword();
      if ($userArr && Hash::check($plainPassword, $hashedPassword)) {
      return true;
      } else {
      return false;
      }
      } else {
      return false;
      }
      } */

    public function createUserByPhoneNumber(UserDTO $userDTO) {
        $user = new User();
        $newUser = $user->createUserByPhoneNumber($userDTO);
        if ($newUser) {
            if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                $response['Message'] = "User is Created!";
                $response['User'] = $newUser;
                return JsonHandler::getJsonMessage($response);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
        if ($userDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_FAILUE;
            $response['Message'] = "Error Occurred while Creating User!";
            $response['User'] = null;
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$FALSE_AS_STRING;
        }
    }

    public function addUserToCompany(UserCompanyDTO $userCompanyDTO) {
        $bUserCompany = new BUserCompany();
        $bUserCompany->addUserToCompany($userCompanyDTO);

        if ($userCompanyDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "User is Connected With the Company!";
            return JsonHandler::getJsonMessage($response);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }
    
    public function listUsersCompanies(UserCompanyDTO $userCompanyDTO) {
        $bUserCompany = new BUserCompany();
        $result = $bUserCompany->listUsersCompanies($userCompanyDTO);

        if ($userCompanyDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Listed Users Companies";
            $response['Result'] = $result;
            
            return JsonHandler::getJsonMessage($response);
        } else {
            return $result;
        }
    }
    
    public function listUserCompaniesByUserId(UserCompanyDTO $userCompanyDTO) {
        $bUserCompany = new BUserCompany();
        $result = $bUserCompany->listUserCompaniesByUserId($userCompanyDTO);

        if ($userCompanyDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Listed Users Companies";
            $response['Result'] = $result;
            
            return JsonHandler::getJsonMessage($response);
        } else {
            return $result;
        }
    }
    
    public function listUserCompaniesByEmailId(UserCompanyDTO $userCompanyDTO) {
        $bUserCompany = new BUserCompany();
        $result = $bUserCompany->listUserCompaniesByEmailId($userCompanyDTO);

        if ($userCompanyDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            $response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            $response['Message'] = "Successfully Listed Users Companies";
            $response['Result'] = $result;
            
            return JsonHandler::getJsonMessage($response);
        } else {
            return $result;
        }
    }

}
