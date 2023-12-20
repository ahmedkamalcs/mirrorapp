<?php

namespace App\Http\Controllers\api\v1\sns\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Http\Model\v1\ModelFactory;
use App\Http\Model\v1\event\EventCategoryModel; 
use App\Http\Controllers\api\v1\dto\InvoiceDTO; 
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\api\v1\util\JsonHandler;  
use App\Models\api\v1\paymentmodel\InvoiceModel;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\UserDTO;

/* * *
 * @author ISG.
 * Business event class that handles business logic for Event Details table.
 */
use App\Http\Controllers\api\v1\sns\bo\BUserOtp;
use App\Http\Controllers\api\v1\dto\UserOtpDTO;
use App\Http\Controllers\api\v1\dto\SnsDTO;
class UserOtpClient  {

    public function saveOtp(Request $request)
    {
        
//        return SnsDTO::formatePhoneNumber($request->phoneNumber);
        
        $bUserOtp = new BUserOtp();
        $userOtpDTO = new UserOtpDTO();
        $userOtpDTO->setPhoneNumber($request->phoneNumber);
        
//        $userOtpDTO->setApiCall('0');
        return $bUserOtp->saveOtp($userOtpDTO);
    }
    
    public function verifyOtp(Request $request)
    {
        $userOtpDTO = new UserOtpDTO();
        $userOtpDTO->setOTP($request->otp);
        $userOtpDTO->setPhoneNumber($request->phoneNumber);
//        $userOtpDTO->setApiCall('0');
        $bUserOtp = new BUserOtp();
        return $bUserOtp->verify($userOtpDTO);
    }
    public function verifyLogingOtp(Request $request)
    {
        $userOtpDTO = new UserOtpDTO();
        $userOtpDTO->setOTP($request->otp);
        $userOtpDTO->setPhoneNumber($request->phoneNumber);
//        $userOtpDTO->setApiCall('0');
        $bUserOtp = new BUserOtp();
        return $bUserOtp->verifyLogingOtp($userOtpDTO);
    }
    
    
}
