<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\salon;

use App\Http\Controllers\api\v1\dto\AppDTO;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
use App\Http\Controllers\api\v1\dto\PaymentVendorDetailsDTO;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\sns\bo\BSnsService;
use App\Http\Controllers\api\v1\dto\SnsDTO;
use App\Http\Controllers\isgapi\api\v1\util\StringUtil;

/**
 * @author ISG
 * EventDetailsModel class. EventDetailsModel persistent object.
 */
class SalonServices extends Model implements ModelInterface{




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
    
        public function lstSalonByCategory(ServicesDTO $servicesDTO) {
            $query ="select DISTINCT sm.id ,sm.user_phone_no,sm.arabic_name , sm.name,sm.working_hours_from, sm.working_hours_till,sm.working_monday,sm.working_tuesday,sm.working_wednesday";
            $query=$query.",sm.working_thrusday,sm.working_friday,sm.working_saturday, sm.working_sunday, sm.offering_24h_services, sm.salon_services ,sm.home_services,sg.logo,sg.gallery , sb.address ,sb.longtitude,sb.latitude";
            $query=$query." FROM `salon_master` as sm" ;
            $query=$query." inner join salon_services as ss on sm.user_phone_no=ss.user_phone_no";
            $query=$query." inner join salon_branches as sb on sm.id=sb.salon_id";
            $query=$query." left join salon_gallery as sg on sm.user_phone_no=sg.user_phone_no";
            if($servicesDTO->getCategoryId()!=""){
                $query=$query." where ss.category_id='".$servicesDTO->getCategoryId() ."' and ss.isactive=1"; 
            }
            $salons=DBUtil::select($query);
        
            $salonarry=[];
            foreach($salons as $salon){
                $gallery=array();
                $galleryarry=explode("|",$salon->gallery);
                foreach($galleryarry as $galle){
                   if($galle!=""){ 
                    $path=AppDTO::$serverlink . "" . AppDTO::$salonGalleryPath . $galle;
                    array_push($gallery, $path);
                   }else{
                    $gallery[]=[];
                   }
                }
                if($salon->logo!=""){
                    $salon->logo=AppDTO::$serverlink ."" . AppDTO::$salonLogoPath . $salon->logo;
                }else{
                    $salon->logo="";
                }
                    $query = "select DISTINCT sc.id,sc.english_name , sc.arabic_name from salon_services ss";
                $query=$query." inner join service_category sc on ss.category_id=sc.id";
                $query=$query." where ss.user_phone_no='".$salon->user_phone_no ."' and isactive=1";
                $salonservice = DBUtil::select($query);
                if (!$salonservice){
                    $salon->{"SalonServices"}=[];
                }else{
                    if(count($salonservice)==1){
                       $salon->{"SalonServices"}=$salonservice[0];
                    }else{
                        $salon->{"SalonServices"}=$salonservice;

                    }
                }
                $salon->{"Gallery"}=$gallery;
                $salonarry[]=$salon;
            }
          return $salonarry;
        }
        public function lstDefaultServices(ServicesDTO $servicesDTO) {
        // get cateogories      
        if($servicesDTO->getCategoryId()!=""){
            $query = "select * from service_category where id='".$servicesDTO->getCategoryId()."'";
        }else {
            $query = "select * from service_category";
        }
        $categories = DBUtil::select($query);
        $item = [
            "CategoryId" => $categories[0]->id,
            "EnglishName" => $categories[0]->english_name,
            "ArabicName" => $categories[0]->arabic_name,
            "subcategories" => [],
        ];
        $item =[];
        foreach($categories as $category){
            $query = "select * from services_subcategory where category_id='".$category->id ."'";
            $subcategories = DBUtil::select($query);
            $subitem=[];
            foreach($subcategories as $subcategory){
                $query = "select isactive ,serving_females,serving_males,service_description,service_duration,service_price from salon_services where category_id='".$subcategory->category_id ."' and subcategory_id='".$subcategory->id."' and user_phone_no='".$servicesDTO->getUserPhoneNo()."'";
                $salonservice = DBUtil::select($query);
                
                if (!$salonservice){
                    
                    $subitem[]=[
                        "id"=> $subcategory->id,
                        "category_id"=> $subcategory->category_id,
                        "arabic_name"=> $subcategory->arabic_name,
                        "english_name"=>$subcategory->english_name,
                        "serving_females"=>"0",
                        "serving_males"=>"0",
                        "service_description"=>"",
                        "service_duration"=>"",
                        "service_price"=>"",
                        "is_active"=> 0
                    ];
                }else{
                    
                    $subitem[]=[
                        "id"=> $subcategory->id,
                        "category_id"=> $subcategory->category_id,
                        "arabic_name"=> $subcategory->arabic_name,
                        "english_name"=>$subcategory->english_name,
                        "serving_females"=>$salonservice[0]->serving_females,
                        "serving_males"=>$salonservice[0]->serving_males,
                        "service_description"=>$salonservice[0]->service_description,
                        "service_duration"=>$salonservice[0]->service_duration,
                        "service_price"=>$salonservice[0]->service_price,
                        "is_active"=> $salonservice[0]->isactive
                    ];
                }
              
            }
          $item[] = [
            "CategoryId" => $category->id,
            "EnglishName" => $category->english_name,
            "ArabicName" => $category->arabic_name,
            "subcategories" => $subitem
        ];
        }
   
        $data[]=$item;
        return $data;
    }

    public function SaveDefaultServices(ServicesDTO $servicesDTO) {
        SalonServices::where([["category_id",$servicesDTO->getCategoryId()]
        ,["user_phone_no",$servicesDTO->getUserPhoneNo()]
        ,["subcategory_id",$servicesDTO->getSubCategoryId()]])->delete();
        
        $salonservice= new SalonServices();
        
        $salonservice->category_id=$servicesDTO->getCategoryId();
        $salonservice->subcategory_id= $servicesDTO->getSubCategoryId();
        $salonservice->user_phone_no= $servicesDTO->getUserPhoneNo();
        $salonservice->serving_females= $servicesDTO->getIsServingFemales();
        $salonservice->serving_males= $servicesDTO->getIsServingMales();
        $salonservice->service_description= $servicesDTO->getServiceDescription();
        $salonservice->service_duration= $servicesDTO->getServiceDuration();
        $salonservice->service_price= $servicesDTO->getServicePrice();
        $salonservice->isactive= $servicesDTO->getIsactive();
        $salonservice->save();
        return  $salonservice;
    }

    public function LstSalonService(ServicesDTO $servicesDTO){
        $query = "select * from salon_services  inner join salon_master on salon_services.user_phone_no=salon_master.user_phone_no 
where salon_services.category_id='".$servicesDTO->getCategoryId()."' and salon_services.subcategory_id='".$servicesDTO->getSubCategoryId()."' and salon_master.id='".$servicesDTO->getsalonId()."'";
        $salonService = DBUtil::select($query);
        return $salonService;
    }
    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'salon_services';

}