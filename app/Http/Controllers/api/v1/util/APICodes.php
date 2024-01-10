<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\util;
use Illuminate\Support\Facades\DB;

class  APICodes {

   // public static $TRANSACTION_SUCCESS = "200";
    //public static $TRANSACTION_DATA_NOT_FOUND = "300";
    //public static $TRANSACTION_FAILUE = "500";
   // public static $TRANSACTION_ALREADY_EXIST = "403";

     public static $TRANSACTION_SUCCESS = true;
    public static $TRANSACTION_DATA_NOT_FOUND = false;
    public static $TRANSACTION_FAILUE = false;
    public static $TRANSACTION_ALREADY_EXIST = false;
    
    public static $TRANSACTION_LIKE_CODE = "1";
    public static $TRANSACTION_UNLIKE_CODE = "0";
    
}
