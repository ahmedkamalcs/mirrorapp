<?php

namespace App\Http\Controllers\api\v1\signupstaging\bo;

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
use App\Http\Controllers\api\v1\dto\SignupStagingDTO;
use App\Models\api\v1\signupstaging\SignupStagingModel;

class BSignupStaging extends Controller implements BusinessInterface {
    
    public function saveDTO(SignupStagingDTO $signupStagingDTO){
        $signupStagingModel = new SignupStagingModel();
        return $signupStagingModel->saveDTO($signupStagingDTO);
    }
    
    public function getOTPArrayByEmailOrMobile(SignupStagingDTO $signupStagingDTO){
        $signupStagingModel = new SignupStagingModel();
        return $signupStagingModel->getOTPArrayByEmailOrMobile($signupStagingDTO);
    }
    
}
