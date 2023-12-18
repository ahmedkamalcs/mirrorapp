<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\api\v1\vendor;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\v1\util\DBUtil;
use App\Http\Controllers\api\v1\dto\VendorProfileDTO;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\v1\dto\ModelInterface;
use App\Http\Controllers\api\v1\dto\AppDTO;


/**
 * @author ISG
 */
class VendorProfileModel extends Model implements ModelInterface{

    public function saveObject(VendorProfileDTO $vendorProfileDTO) {
        //Create New User

        $this->vendor_master_id = $vendorProfileDTO->getVendorMasterId();
        $this->profile_name = $vendorProfileDTO->getProfileName();
        $this->description = $vendorProfileDTO->getDescription();
        $this->first_name = $vendorProfileDTO->getFirstName();
        $this->last_name = $vendorProfileDTO->getLastName();
        $this->profile_picture = $vendorProfileDTO->getProfilePicture();
        $this->tel_no = $vendorProfileDTO->getTelNo();
        $this->mobile_no = $vendorProfileDTO->getMobileNo();
        $this->bio = $vendorProfileDTO->getBio();
        $this->active = $vendorProfileDTO->isActive() == null ? AppDTO::$FALSE_AS_STRING : $vendorProfileDTO->isActive();


        $this->save();
        $vendorProfileDTO->setId($this->id);
        return $this;
    }

    public function getDTOById($id)
    {
//        $targetUserDTO = new UserDTO("", "");
//        $userArr = User::where('id', $id )->get();
//        if($userArr)
//        {
//            $targetUserDTO->setId($userArr[0]->id);
//            $targetUserDTO->setUserName($userArr[0]->user_name);
//            $targetUserDTO->setFirstName($userArr[0]->first_name);
//            $targetUserDTO->setLastName($userArr[0]->last_name);
//            return $targetUserDTO;
//        }
//        return null;
    }

    public $timestamps = true;
    protected $table = 'isg_vendor_profile';

}
