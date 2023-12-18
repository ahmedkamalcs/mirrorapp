<?php

namespace App\Http\Controllers\api\v1\usermodel\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\usermodel\UserRole;

class BUserRole extends Controller implements BusinessInterface {

    public function attachUserToRole($roleId, $userId)
    {
        $userRole = new UserRole();
        $userRole->attachUserToRole($roleId, $userId);
    }

    public function getDTOById($id) {
        
    }

}
