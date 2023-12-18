<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\util;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\companyprofile\bo\BUserCompany;
use App\Http\Controllers\api\v1\dto\UserCompanyDTO;

class UserUtil {

    public static function isUserCanRegisterUser()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_create_user FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_create_user;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanProvidePagesAccess()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_provide_view_pages_access FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_provide_view_pages_access;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanProvideViewPageAccess()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_provide_view_pages_access FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_create_user;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserApproved($userEmail)
    {
        $query = "SELECT approved FROM users WHERE email = '".$userEmail . "'";
        $result = DBUtil::select($query);

        if($result)
        {
            if( $result[0]->approved == AppDTO::$TRUE_AS_STRING )
            {
                return AppDTO::$TRUE_AS_STRING;
            }
            else if( $result[0]->approved == AppDTO::$FALSE_AS_STRING ){
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        return AppDTO::$TRUE_AS_STRING;
    }
    
    public static function isUserHavingMultipleComanies($userEmail)
    {
        $query = "SELECT approved FROM users WHERE email = '".$userEmail . "'";
        $result = DBUtil::select($query);

        if($result)
        {
            if( $result[0]->approved == AppDTO::$TRUE_AS_STRING )
            {
                return AppDTO::$TRUE_AS_STRING;
            }
            else if( $result[0]->approved == AppDTO::$FALSE_AS_STRING ){
                return AppDTO::$FALSE_AS_STRING;
            }
        }
        return AppDTO::$TRUE_AS_STRING;
    }

    public static function listAllUsers() {

        $query = "select * from users where company_code = " . auth()->user()->company_code;
        $usersArr = DBUtil::select($query);
        if($usersArr)
        {
            return $usersArr;
        }
        return null;
    }

    public static function listUsersPermission() {
        /*
        SELECT * FROM users u, user_role ur, isg_role r, permission p
        WHERE u.id = ur.users_id
        AND ur.role_id = r.id
        AND p.role_id = r.id
        */
        $query = "SELECT * FROM users u, isg_user_role ur, isg_role r, isg_permission p " .
                    "WHERE u.id = ur.users_id  " .
                    "AND ur.role_id = r.id  " .
                    "AND p.role_id = r.id " .
                    "AND u.company_code = " . auth()->user()->company_code;
        $usersArr = DBUtil::select($query);
        if($usersArr)
        {
            return $usersArr;
        }
        return null;
    }

    public static function activateUserByEmailId($emailId, $activeValue){
        DBUtil::updateByColName("users", "email", $emailId, "approved", $activeValue);
    }

    public static function syncUser($emailId){

        $query = "SELECT * FROM users
                    WHERE email = '" . $emailId . "'";


        $result = DBUtil::select($query);
        if($result)
        {
            //Build User DTO
            $userDTO = new UserDTO($result[0]->name, $result[0]->password);

            $userDTO->setFirstName($result[0]->name);
            $userDTO->setUserActive($result[0]->approved);
            $userDTO->setUserEmail($result[0]->email);
            $userDTO->setApiCall(AppDTO::$FALSE_AS_STRING);

            $bUser = new BUser();
            $bUser->createUser($userDTO);
        }

    }

    public static function providePagesAccessByEmailId(Request $request){

        // DB::table('stores')
        //     ->where('id', $request)
        //     ->update(['visibility' =>DB::raw($value)]);

        // DBUtil::updateByColName("users", "email", $emailId, "can_view_einvoice_b2b", AppDTO::$TRUE_AS_STRING);
        /*UPDATE permission
            SET can_view_einvoice_b2b = '1', can_view_einvoice_b2c = '1'
            WHERE id = (SELECT  p.id FROM users u, user_role ur, isg_role r, permission p
            WHERE u.id = ur.users_id
            AND ur.role_id = r.id
            AND p.role_id = r.id
            AND u.company_code = 100
            AND u.email = 'a.kamal@isglobal.co');*/

        $query = " UPDATE isg_permission " .
                    " SET can_view_einvoice_b2b = '1', can_view_einvoice_b2c = '1', can_add_b2c = '1', can_add_b2b = '1', can_view_item_master = '1', can_view_service_master = '1', can_view_vendor_master = '1', can_view_customer_master_b2b = '1', can_view_customer_master_b2c = '1', can_view_item_vendor = '1', can_view_item_vendor = '1', can_view_user_profile = '1'  ".
                    " WHERE id = ( SELECT id  FROM (SELECT  p.id FROM users u, isg_user_role ur, isg_role r, isg_permission p ".
                    " WHERE u.id = ur.users_id ".
                    " AND ur.role_id = r.id ".
                    " AND p.role_id = r.id ".
                    " AND u.company_code =  ". auth()->user()->company_code .
                    " AND u.email = '".$request->userEmail."') AS t )";

        DBUtil::exeQuery($query);
    }

    public static function isUserCanViewEInvoiceB2B()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_einvoice_b2b FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_einvoice_b2b;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanViewEInvoiceB2C()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_einvoice_b2c FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_einvoice_b2c;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanAddEInvoiceB2C()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_add_b2c FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_add_b2c;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanAddEInvoiceB2B()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_add_b2b FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_add_b2b;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanViewItemMaster()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_item_master FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_item_master;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanViewServiceMaster()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_service_master FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_service_master;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanViewVendorMaster()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_vendor_master FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_vendor_master;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanViewCustomerMasterB2B()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_customer_master_b2b FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_customer_master_b2b;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanViewCustomerMasterB2C()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_customer_master_b2c FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_customer_master_b2c;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanViewItemVendor()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_item_vendor FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_item_vendor;
        }
        return AppDTO::$FALSE_AS_STRING;
    }

    public static function isUserCanViewUserProfile()
    {
        if (auth()->user() == null)
        {
            return  AppDTO::$FALSE_AS_STRING;
        }
        $query = "SELECT p.can_view_user_profile FROM users u, isg_role r, isg_user_role ur, isg_permission p
                    WHERE u.id = ur.users_id
                    AND	r.id = ur.role_id
                AND 	p.role_id = r.id
                AND   u.id = " . auth()->user()->id;

        $result = DBUtil::select($query);
        if($result)
        {
            return $result[0]->can_view_user_profile;
        }
        return AppDTO::$FALSE_AS_STRING;
    }
    
    public static function listUserCompaniesForLoginPage($emailId){
        $bUserCompany = new BUserCompany();
        $userCompanyDTO = new UserCompanyDTO();
        $userCompanyDTO->setApiCall(AppDTO::$FALSE_AS_STRING);
        $userCompanyDTO->setUserEmail($emailId);
        $result = $bUserCompany->listUserCompaniesByEmailId($userCompanyDTO);
        return $result;
    }

}

