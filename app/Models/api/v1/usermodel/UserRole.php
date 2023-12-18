<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\usermodel;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;


/**
 * @author ISG
 */
class UserRole extends Model implements ModelInterface{

    public function attachUserToRole($roleId, $userId)
    {
        $this->role_id = $roleId;
        $this->users_id = $userId;
        $this->save();
    }

    public function getDTOById($id) {

    }

    public $timestamps = false;
    protected $table = 'isg_user_role';

}
