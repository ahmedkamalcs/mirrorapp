<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\api\v1\dto\EInvoiceHeaderDTO;
use App\Http\Controllers\api\v1\einvoice\bo\BEInvoiceHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Controllers\api\v1\sys\bo\BSystemSeries;
use App\Http\Controllers\api\v1\einvoice\bo\BEInvoiceLine;
use App\Http\Controllers\api\v1\dto\EInvoiceLineDTO;
use App\Http\Controllers\isgapi\api\v1\util\DateUtil;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Requests\EInvoiceRequest;
use App\Http\Controllers\api\v1\companyprofile\bo\BCompanyProfile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Models\api\v1\companyprofile\CompanyProfile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\api\v1\dto\SignupStagingDTO;
use App\Http\Controllers\api\v1\signupstaging\bo\BSignupStaging;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\companyprofile\bo\BRootAccount;
use App\Http\Controllers\api\v1\dto\RootAccountDTO;
use App\Http\Controllers\api\v1\usermodel\bo\BUserRole;
use App\Http\Controllers\api\v1\companyprofile\bo\BUserCompany;
use App\Http\Controllers\api\v1\dto\UserCompanyDTO;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\api\v1\mail\HubSaMailer;
use App\Http\Controllers\api\v1\sns\bo\BUserOtp;
use App\Http\Controllers\api\v1\dto\UserOtpDTO;
use App\Http\Controllers\api\v1\dto\CompanyProfileDTO;

class RegisterUserWebController extends BaseController {

    use AuthenticatesUsers;

    public function index() {
        return view('apsweb');
    }

    public function registerUser() {
        $usersArr = User::listAllUsers();
        return view('pages.registeruser', compact('usersArr'));
    }

    public function pagesAccess() {
        $usersArr = User::listUsersPermission();
        return view('pages.pagesaccess', compact('usersArr'));
    }

    public function registerNewUser() {

        return back()->withStatus(__('User Successfully Created!'));
    }

    public function redirectUser() {
        return view('ruwaitapproval');
    }

    public function userNotApproved() {
        return view('usernotapproved');
    }

    public function userCompanies(Request $request) {

        $companyList = User::listUserCompaniesForLoginPage($request->email);

        if (count($companyList) > 1) {
            //Prepare User Companies
            return view('usercompanies', compact('companyList'));
        }

        return view('usercompanies');
    }

    public function loginbycompany(Request $request) {
        return $this->home($request);
    }

    public function home(Request $request) {
        return $this->loginToCompany($request);
    }

    public function activateUser(Request $request) {

        switch ($request->input('action')) {
            case 'Activate':
                $this->doActivateUser($request, AppDTO::$TRUE_AS_STRING);
                return back()->withStatus(__('User Successfully Updated!'));
                break;
            case 'Deactivate':
                $this->doActivateUser($request, AppDTO::$FALSE_AS_STRING);
                return back()->withStatus(__('User Successfully Updated!'));
                break;
        }
    }

    public function doActivateUser(Request $request, $activeValue) {
        $user = new User();
        $user->activateUserByEmailId($request->userEmail, $activeValue);
        $user->syncUser($request->userEmail);
    }

    public function providePagesAccess(Request $request) {
        $user = new User();
        $user->providePagesAccessByEmailId($request);
        return back()->withStatus(__('Access Successfully Updated!'));
    }

    public function signUpOtp(Request $request) {
//        return view('signupotp', compact('einvoiceHeaderDTO'));
//        $companyprofileselect  = 100;
        $signupStagingDTO = $this->doSignUpStage($request);
        $this->validatorSignup($request->all())->validate();
        return view('auth/register_otp', compact('signupStagingDTO'));
    }

    public function signUpFinish(Request $request) {
//        $companyprofileselect  = 100;
        $signupStagingDTO = $this->doOtpStage($request);
        //Split to Validate OTP
        $bSignUpStaging = new BSignupStaging();
        $otpArr = $bSignUpStaging->getOTPArrayByEmailOrMobile($signupStagingDTO);

//        return $this->validatorOtp($request->all(), $otpArr);
        $this->validatorOtp($request->all(), $otpArr)->validate();
        //Split to Validate OTP
        return view('auth/register_finish', compact('signupStagingDTO'));
    }

    public function signUpRegister(Request $request) {
        $this->validatorSignupFinish($request->all())->validate();
//        return $this->validatorSignupFinish($request->all());die;
        $this->createUser($request);
        return redirect('/login');
    }

    private function doSignUpStage(Request $request) {
        $signupStagingDTO = new SignupStagingDTO();
        $signupStagingDTO->setEmail($request->email);
        $signupStagingDTO->setStatus('signup'); //Move to APPDTO
        $signupStagingDTO->setCompanyprofileselect($request->companyprofileselect);

        //Send Mail
        $dataArray = $this->sendOtpMail($request);
        $signupStagingDTO->setOtp($dataArray['message']);
        //Send Mail

        $bsignupstaging = new BSignupStaging();
        $bsignupstaging->saveDTO($signupStagingDTO);

        return $signupStagingDTO;
    }

    private function doOtpStage(Request $request) {
        $signupStagingDTO = new SignupStagingDTO();
        $signupStagingDTO->setEmail($request->email_or_mobile);
        $signupStagingDTO->setCompanyprofileselect($request->companyprofileselect);
        $signupStagingDTO->setStatus('otp');
        $bsignupstaging = new BSignupStaging();
        $bsignupstaging->saveDTO($signupStagingDTO);
        return $signupStagingDTO;
    }

    private function validateOtpBeforeSend(UserOtpDTO $userOtpDto) {
        $bUserOTP = new BUserOtp();
        $userOtpDTO = $bUserOTP->getDTObyEmail($userOtpDto);
        if ($userOtpDTO == null) {
            $userOtpDto->setOtpSent(AppDTO::$FALSE_AS_STRING);
            return $userOtpDto;
        } else {
            $userOtpDto->setOTP($userOtpDTO->getOTP());
            $userOtpDto->setEmail($userOtpDTO->getEmail());
            $userOtpDto->setOtpSent(AppDTO::$TRUE_AS_STRING);
            return $userOtpDto; //Already sent before.
        }
    }

    private function sendOtpMail(Request $request) {

        $mail = $request->email;
        $otp = $this->genOTP();
//        $dataArray = [
//          'full_name' => $request->full_name,
//          'subject' => $request->subject,
//          'phone' => $request->phone,
//          'email' => $request->email,
//          'message' => $request->message
//        ];

        $dataArray = [
            'subject' => 'Hub.Sa App',
            'message' => $otp
        ];

        $userOtpDto = new UserOtpDTO();
        $userOtpDto->setEmail($mail);
        $userOtpDto->setOTP($otp);
        $prevOtpDto = $this->validateOtpBeforeSend($userOtpDto);
        if ($prevOtpDto->getOtpSent() == AppDTO::$TRUE_AS_STRING) {
            $dataArray = [
                'subject' => 'Hub.Sa App',
                'message' => $prevOtpDto->getOTP()
            ];
            return $dataArray;
        }

        Mail::to($mail)->send(new HubSaMailer($dataArray));

        $bUserOTP = new BUserOtp();
        $userOtpDTO = new UserOtpDTO();
        $userOtpDTO->setEmail($mail);
        $userOtpDTO->setOTP($otp);
        $bUserOTP->saveOTPByEmail($userOtpDTO);

        return $dataArray;
    }

    private function genOTP() {
        $otp = mt_rand(1111, 9999);
        return $otp;
    }

    private function validatorSignupFinish(array $data) {

        return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
//                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'terms' => ['required'],
        ]);
    }

    private function validatorSignup(array $data) {
        return Validator::make($data, [
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    private function validatorOtp(array $data, $otpArr) {

        return Validator::make($data, [
                    'otp1' => 'in:' . $otpArr[0], //$otp1,
                    'otp2' => 'in:' . $otpArr[1], //$otp2,
                    'otp3' => 'in:' . $otpArr[2], //$otp3,
                    'otp4' => 'in:' . $otpArr[3], //$otp4,
        ]);
    }

    private function createUser(Request $request) {
        $data['name'] = $request->name;
        $data['password'] = $request->password;
        $data['email'] = $request->email;
        //Company Checker. Start.
        $companyCode = $this->validateCompanyCode($request->companyprofileselect, $request);
        
        $data['companyprofileselect'] = $companyCode; //$request->companyprofileselect;
        //Company Checker. End.
        $this->create($data);
    }

    private function validateCompanyCode($companyCode, Request $request) {
        if ($companyCode == AppDTO::$REGISTER_NEW_COMPANY) {
            //Create new company and assign it to the current user.
            $newRegisterdCompanyCode = $this->registerNewCompany($request);
            return $newRegisterdCompanyCode;
        } else {
            //Validate Company Before Assigning it to the current user.
            $validCompanyCode = $this->validateUserCompanyCode($companyCode);
            if($validCompanyCode == null){
                echo "Invalid Company!";die;
            }else{
                return $validCompanyCode;
            }
        }
    }
    
    public function inviteUser(Request $request){
        
        echo $request->userEmailId; die;
    }
        

    private function validateUserCompanyCode($companyCode){
        $companyProfile = new CompanyProfile();
        $companyProfileDTO = $companyProfile->getActiveCompanyProfileDTO($companyCode);
        if ( $companyProfileDTO == null ){
            return null;
        }else{
            return $companyProfileDTO->getCompanyCode();
        }
    }
    
    private function registerNewCompany(Request $request) {
        //Create Company Profile.
        $newCompanyCode = AppDTO::getNewCompanyCode();
        $bCompanyProfile = new BCompanyProfile();
        $companyProfileDTO = new CompanyProfileDTO();
        $companyProfileDTO->setCompanyName($request->name . $newCompanyCode); //Unique Company Name
        $companyProfileDTO->setActive(AppDTO::$TRUE_AS_STRING);
        $companyProfileDTO->setCompanyCode($newCompanyCode);
        $companyProfileDTO->setBusinessName($request->name); //TODO. Add Business Name

        $bCompanyProfile->saveObject($companyProfileDTO);

        //Create Root Account
        $bRootAccount = new BRootAccount();
        $rootAccountDTO = new RootAccountDTO();
        $rootAccountDTO->setCompanyName($companyProfileDTO->getCompanyName());
        $rootAccountDTO->setRootAccountCode($companyProfileDTO->getCompanyCode());
        $rootAccountDTO->setCompanyCode($companyProfileDTO->getCompanyCode());

        $bRootAccount->saveAccount($rootAccountDTO);

        //
        return $companyProfileDTO->getCompanyCode();
    }

    protected function create(array $data) {

        $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
        ]);

        $rootAccountCode = $data['companyprofileselect']; //ISG Company Code. Need to Deprecate it. Done, and deprecated.
        $this->updateUserCompany($user, $rootAccountCode);
        return $user;
    }

    private function updateUserCompany($user, $rootAccountCode) {

        $bRootAccount = new BRootAccount();
        $rootAccountDTO = new RootAccountDTO();
        $rootAccountDTO->setRootAccountCode($rootAccountCode);
        $rootAccountDTO = $bRootAccount->getAccountByDefinedCode($rootAccountDTO);

        $companyProfile = new CompanyProfile();
        $companyProfileDTO = $companyProfile->getActiveCompanyProfileDTO($rootAccountCode);

        if ($rootAccountDTO == null) {//Normal User
            $user->company_code = $rootAccountCode;
//            $user->approved = AppDTO::$TRUE_AS_STRING;//Demo. Purpose.

            $user->save();

            $bUserRole = new BUserRole();
            $bUserRole->attachUserToRole(AppDTO::$DEFAULT_USER_ACCOUNT_ROLE_ID, $user->id);

            //Save User Company
            $bUserCompany = new BUserCompany();
            $userCompanyDTO = new UserCompanyDTO();
            $userCompanyDTO->setCompanyId($companyProfileDTO->getId());
            $userCompanyDTO->setCompanyCode($companyProfileDTO->getCompanyCode());
            $userCompanyDTO->setUsersId($user->id);
            $bUserCompany->addUserToCompany($userCompanyDTO);

//            $user->save();
//            echo  $user->company_code; die;
        } else {//Root Account
            $user->approved = AppDTO::$TRUE_AS_STRING;
            $user->company_code = $rootAccountDTO->getCompanyCode();

            $user->save();
            //Provide Admin Role.
            $bUserRole = new BUserRole();
            $bUserRole->attachUserToRole(AppDTO::$DEFAULT_ROOT_ACCOUNT_ROLE_ID, $user->id);

            //Save User Company
            $bUserCompany = new BUserCompany();
            $userCompanyDTO = new UserCompanyDTO();
//            $userCompanyDTO->setCompanyId($rootAccountDTO->getId());
            $userCompanyDTO->setCompanyId($companyProfileDTO->getId());
            $userCompanyDTO->setCompanyCode($rootAccountDTO->getCompanyCode());
            $userCompanyDTO->setUsersId($user->id);
            $bUserCompany->addUserToCompany($userCompanyDTO);

//            $user->save();
//            echo $user->company_code; die;
        }
    }

}
