<?php

namespace App\Http\Controllers\api\v2\usermodel\client;
use App\Http\Controllers\api\v1\usermodel\bo\BUser;
use App\Http\Controllers\api\v1\dto\AppDTO;
 

class UserClient  {

    public function listAll() {
       $buser = new BUser();
       return $buser->listAll(AppDTO::$_EP);
    }

}
