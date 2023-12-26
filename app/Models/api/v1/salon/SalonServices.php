<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\salon;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
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
                $query = "select isactive from salon_services where category_id='".$subcategory->category_id ."' and subcategory_id='".$subcategory->id."' and user_phone_no='".$servicesDTO->getUserPhoneNo()."'";
                $salonservice = DBUtil::select($query);
                if (!$salonservice){
                    $isactive=0;
                }else{
                    $isactive=$salonservice[0]->isactive;
                }
                $subitem[]=[
                    "id"=> $subcategory->id,
                    "category_id"=> $subcategory->category_id,
                    "arabic_name"=> $subcategory->arabic_name,
                    "english_name"=>$subcategory->english_name,
                    "is_active"=> $isactive
                ];
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
        $salonservice->isactive= $servicesDTO->getIsactive();
        $salonservice->save();
        return  $salonservice;
    }

    /**
     * Instance Variables for the persistent object Model.
     * @var type
     */
    public $timestamps = true;
    protected $table = 'salon_services';

}