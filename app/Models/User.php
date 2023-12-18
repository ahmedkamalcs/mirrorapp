<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\util\UserUtil;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //FW Check
    public static function isUserCanRegisterUser()
    {
        return UserUtil::isUserCanRegisterUser();
    }

    public static function isUserCanProvidePagesAccess()
    {
        return UserUtil::isUserCanProvidePagesAccess();
    }

    public static function isUserApproved($userEmail)
    {
        return UserUtil::isUserApproved($userEmail);
    }
    
    public static function listUserCompaniesForLoginPage($userEmail)
    {
        return UserUtil::listUserCompaniesForLoginPage($userEmail);
    }
    
    public static function isUserHavingMultipleComanies($userEmail){
        
    }

    public static function listAllUsers() {
        return UserUtil::listAllUsers();
    }

    public static function listUsersPermission() {
        return UserUtil::listUsersPermission();
    }

    public function activateUserByEmailId($emailId, $activeValue)
    {
        UserUtil::activateUserByEmailId($emailId, $activeValue);
    }

    public function syncUser($emailId)
    {
        UserUtil::syncUser($emailId);
    }

    public function providePagesAccessByEmailId(Request $request)
    {
        UserUtil::providePagesAccessByEmailId($request);
    }

    public static function isUserCanViewEInvoiceB2B(){
        return UserUtil::isUserCanViewEInvoiceB2B();
    }

    public static function isUserCanViewEInvoiceB2C(){
        return UserUtil::isUserCanViewEInvoiceB2C();
    }

    public static function isUserCanAddEInvoiceB2C(){
        return UserUtil::isUserCanAddEInvoiceB2C();
    }

    public static function isUserCanAddEInvoiceB2B(){
        return UserUtil::isUserCanAddEInvoiceB2B();
    }

    public static function isUserCanViewItemMaster(){
        return UserUtil::isUserCanViewItemMaster();
    }

    public static function isUserCanViewServiceMaster(){
        return UserUtil::isUserCanViewServiceMaster();
    }

    public static function isUserCanViewVendorMaster(){
        return UserUtil::isUserCanViewVendorMaster();
    }

    public static function isUserCanViewCustomerMasterB2B(){
        return UserUtil::isUserCanViewCustomerMasterB2B();
    }

    public static function isUserCanViewCustomerMasterB2C(){
        return UserUtil::isUserCanViewCustomerMasterB2C();
    }

    public static function isUserCanViewItemVendor(){
        return UserUtil::isUserCanViewItemVendor();
    }

    public static function isUserCanViewUserProfile(){
        return UserUtil::isUserCanViewUserProfile();
    }



}
