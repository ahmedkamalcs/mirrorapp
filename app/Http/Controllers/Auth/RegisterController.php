<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\companyprofile\bo\BRootAccount;
use App\Http\Controllers\api\v1\dto\RootAccountDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\usermodel\bo\BUserRole;
use App\Http\Controllers\api\v1\companyprofile\bo\BUserCompany;
use App\Http\Controllers\api\v1\dto\UserCompanyDTO;
use App\Models\api\v1\companyprofile\CompanyProfile;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request) {
        $this->rootAccountCode = $request->companyprofileselect;

        $this->validator($request->all())->validate();

        $this->create($request->all());

        return redirect($this->redirectTo);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data) {

        $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
        ]);

        $rootAccountCode = $this->rootAccountCode;
        $this->updateUserCompany($user, $rootAccountCode);
        return $user;

//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
    }

    public function updateUserCompany($user, $rootAccountCode) {

        $bRootAccount = new BRootAccount();
        $rootAccountDTO = new RootAccountDTO();
        $rootAccountDTO->setRootAccountCode($rootAccountCode);
        $rootAccountDTO = $bRootAccount->getAccountByDefinedCode($rootAccountDTO);
        
        $companyProfile = new CompanyProfile();
        $companyProfileDTO = $companyProfile->getActiveCompanyProfileDTO($rootAccountCode);

        if ($rootAccountDTO == null) {//Normal User
            $user->company_code = $rootAccountCode;
            $user->approved = AppDTO::$TRUE_AS_STRING;//Demo. Purpose.
            
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
            $userCompanyDTO->setCompanyId($rootAccountDTO->getId());
            $userCompanyDTO->setCompanyCode($rootAccountDTO->getCompanyCode());
            $userCompanyDTO->setUsersId($user->id);
            $bUserCompany->addUserToCompany($userCompanyDTO);

//            $user->save();
//            echo $user->company_code; die;
        }
    }

    public function showRegistrationForm($companyprofileselect) {
//        echo $companyprofileselect; die;
        //return view('auth.register', compact('companyprofileselect'));//New Design. Workflow In Progress.
        return $this->showRegistrationSignUp($companyprofileselect);
    }
    
    public function showRegistrationSignUp($companyprofileselect){
        return view('auth.register_signup', compact('companyprofileselect'));
    }
    
    public function showRegistrationOtp($companyprofileselect){
        
    }
    
    public function showRegistrationFinish($companyprofileselect){
        
    }
    
    public function setCompanyCode($companyCode){
        $this->companyCode = $companyCode;
    }
            

    private $companyCode;
    private $rootAccountCode;

}
