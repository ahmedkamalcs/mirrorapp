<?php

namespace App\Http\Controllers\api\v1\customer\bo;

use App\Models\api\v1\usermodel\User;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Models\api\v1\customer\Customer;
use App\Http\Controllers\api\v1\dto\CustomerDTO;

class BCustomer extends Controller implements BusinessInterface {

    
    public function getDTOById($id) {
        
    }
    
     public function createCustomer(CustomerDTO $customerDTO) {
         $customer = new Customer();
         return $customer->createCustomer($customerDTO);
     }
    
    public function listAllCustomersB2C() {
       
        $customer = new Customer();
        return $customer->listAllCustomersB2C();
    }
    
    public function listAllCustomersB2B() {
       
        $customer = new Customer();
        return $customer->listAllCustomersB2B();
    }


}
