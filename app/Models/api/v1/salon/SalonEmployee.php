<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\salon;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\SalonEmployeeDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\sns\bo\BSnsService;
use App\Http\Controllers\api\v1\dto\SnsDTO;
use App\Http\Controllers\isgapi\api\v1\util\StringUtil;

/**
 * @author Saad Aly
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class SalonEmployee extends Model implements ModelInterface{




    /**
     * Constructor routing function.
     * Switch between constructors.
     */
    public function __construct() {
        $args = func_get_args(); //any function that calls this method can take an arbitrary number of parameters
        switch (func_num_args()) {
            //delegate to helper methods
            case 0:
                $this->construct0();
                break;
            case 1:
                $this->construct1($args[0]);
                break;
            case 2:
                $this->construct2($args[0], $args[1]);
            case 3:
                $this->construct3($args[0], $args[1], $args[2]);
                break;
            default:
                trigger_error('Incorrect number of arguments for Foo::__construct', E_USER_WARNING);
        }
    }

    /*
     * Default constructor.
     */
    public function construct0() {

    }

    /**
     * Constructor with one parameter.
     * @param type $request
     */
    public function construct1($request) {
    }

    /**
     * Constructor with three parameters.
     * @author ISG
     * @param type $taskTitle target task title.
     * @param type $taskDescription target task description.
     */
    public function construct2($userId, $eventTitleEn, $eventTitleAr) {
    }

   
    public function SaveSalonEmployee(SalonEmployeeDTO $salonEmployeeDTO) {
       
        $employee= new SalonEmployee();
        
        $employee->salon_id=$salonEmployeeDTO->getSalonId();
        $employee->employee_name= $salonEmployeeDTO->getEmployeeName();
        $employee->employee_phone_no= $salonEmployeeDTO->getEmployeePhoneNo();

        $employee->save();
        
        return  $employee;
 
    }
    public function UpdateSalonEmployee(SalonEmployeeDTO $salonEmployeeDTO) {
       
        $employee=  SalonEmployee::find([$salonEmployeeDTO->getEmployeehId()]);
        
        $employee->salon_id=$salonEmployeeDTO->getSalonId();
        $employee->employee_name= $salonEmployeeDTO->getEmployeeName();
        $employee->employee_phone_no= $salonEmployeeDTO->getEmployeePhoneNo();

        $employee->save();
        
        return  $employee;
 
    }
   public Function getSalonEmployeebyId(SalonEmployeeDTO $salonEmployeeDTO){
    //$salonEmploy= SalonEmployee::where([["salon_id",$salonEmployeeDTO->getSalonId()]
    //,["id",$salonEmployeeDTO->getEmployeehId()]])->get();
    //return $salonEmploy;  
    $query = "select * from salon_employee where salon_id='" . $salonEmployeeDTO->getSalonId() . "' and id='" .$salonEmployeeDTO->getEmployeehId() .  "'";
    
    $result = DBUtil::select($query);  
    
    return $result;
   }
   public Function getSalonEmployeebyPhoneNo(SalonEmployeeDTO $salonEmployeeDTO){
   // $salonEmploy= SalonEmployee::where([["salon_id",$salonEmployeeDTO->getSalonId()]
    //,["employee_phone_no",$salonEmployeeDTO->getEmployeePhoneNo()]])->get();

    
    $query = "select * from salon_employee where salon_id='" . $salonEmployeeDTO->getSalonId() . "' and employee_phone_no='" .$salonEmployeeDTO->getEmployeePhoneNo() .  "'";
    
   $result = DBUtil::select($query);

   return $result; 
   }
   public Function getSalonEmployees(SalonEmployeeDTO $salonEmployeeDTO){
    $query = "select * from salon_employee where salon_id='" . $salonEmployeeDTO->getSalonId() . "'";
    
   $result = DBUtil::select($query); 
   return $result; 
   }
  
    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'salon_employee';

}