<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\salon;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\SalonDTO;
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
class SalonMaster extends Model implements ModelInterface{




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

   
    public function SaveSalonData(SalonDTO $salonDTO) {
        
        $SalonMaster= new SalonMaster();
        
        $SalonMaster->user_phone_no=$salonDTO->getUserPhoneNo();
        $SalonMaster->name= $salonDTO->getSalonName();
        $SalonMaster->arabic_name= $salonDTO->getSalonArabicName();
        $SalonMaster->service_type= $salonDTO->getSalonServiceType();
        $SalonMaster->business_type= $salonDTO->getSalonBusinessType();
        $SalonMaster->team_member= $salonDTO->getSalonTeamMember();
        $SalonMaster->branches_no= $salonDTO->getSalonBranchesNo();
        $SalonMaster->working_days= $salonDTO->getSalonWorkingDaysNumbers();
        $SalonMaster->working_hours_from= $salonDTO->getSalonWorkingHoursFrom();
        $SalonMaster->working_hours_till= $salonDTO->getSalonWorkingHoursTill();
        $SalonMaster->offering_24h_services= $salonDTO->getSalonIsOffering24Services();
        $SalonMaster->clients_type= $salonDTO->getSalonClientsType();
        $SalonMaster->save();
        
        return  $SalonMaster;
 
    }

    public function updateSalonData(SalonDTO $salonDTO) {
        
        $SalonMaster= SalonMaster::find($salonDTO->getSalonId());

        $SalonMaster->user_phone_no=$salonDTO->getUserPhoneNo();
        $SalonMaster->name= $salonDTO->getSalonName();
        $SalonMaster->arabic_name= $salonDTO->getSalonArabicName();
        $SalonMaster->service_type= $salonDTO->getSalonServiceType();
        $SalonMaster->business_type= $salonDTO->getSalonBusinessType();
        $SalonMaster->team_member= $salonDTO->getSalonTeamMember();
        $SalonMaster->branches_no= $salonDTO->getSalonBranchesNo();
        $SalonMaster->working_days= $salonDTO->getSalonWorkingDaysNumbers();
        $SalonMaster->working_hours_from= $salonDTO->getSalonWorkingHoursFrom();
        $SalonMaster->working_hours_till= $salonDTO->getSalonWorkingHoursTill();
        $SalonMaster->offering_24h_services= $salonDTO->getSalonIsOffering24Services();
        $SalonMaster->clients_type= $salonDTO->getSalonClientsType();
        $SalonMaster->save();
        return  $SalonMaster;
    }
    public function saveSalonWorkStyle(SalonDTO $salonDTO) {
        
        $SalonMaster= SalonMaster::find($salonDTO->getSalonId());
        $SalonMaster->work_style=$salonDTO->getSalonWorkStyle();
        $SalonMaster->save();
        return  $SalonMaster;
       
    }
    public function saveSalonServiceType(SalonDTO $salonDTO) {
        
        $SalonMaster= SalonMaster::find($salonDTO->getSalonId());
        $SalonMaster->salon_services=$salonDTO->getIsSalonServices();
        $SalonMaster->home_services=$salonDTO->getIsHomeServices();
        $SalonMaster->save();
        return  $SalonMaster;
       
    }
    public function saveSalonServiceGender(SalonDTO $salonDTO) {
        
        $SalonMaster= SalonMaster::find($salonDTO->getSalonId());
        $SalonMaster->serving_females=$salonDTO->getIsServingFemales();
        $SalonMaster->serving_males=$salonDTO->getIsServingMales();
        $SalonMaster->save();
        return  $SalonMaster;
       
    }
    public function saveSalonWorkingDays(SalonDTO $salonDTO){
        $SalonMaster= SalonMaster::find($salonDTO->getSalonId());

        $SalonWorkingDays= $salonDTO->getSalonWorkingDays();
        $SalonMaster->working_monday=$SalonWorkingDays['Monday'];
        $SalonMaster->working_tuesday=$SalonWorkingDays['Tuesday'];
        $SalonMaster->working_wednesday=$SalonWorkingDays['Wednesday'];
        $SalonMaster->working_thrusday=$SalonWorkingDays['Thrusday'];
        $SalonMaster->working_friday=$SalonWorkingDays['Friday'];
        $SalonMaster->working_saturday=$SalonWorkingDays['Saturday'];
        $SalonMaster->working_sunday=$SalonWorkingDays['Sunday'];
        $SalonMaster->save();
        return  $SalonMaster;
    }
   public Function getSalonDataByPhoneNumber($phoneNumber){
    $SalonMaster= SalonMaster::where("user_phone_no",$phoneNumber)->get();
    return $SalonMaster;    
   }
   public Function getSalonDataById($salonId){
    $SalonMaster= SalonMaster::where("id",$salonId)->get();
    return $SalonMaster;    
   }
    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'salon_master';

}