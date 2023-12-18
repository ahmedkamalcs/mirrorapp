<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\isgapi\api\v1\util;

class DateUtil {

    public static $MONTH_NAME_DAY_NAME = "F j, l";//April 29, Monday
    public static $MONTH_NAME_DAY_YEAR = "F j, Y";//April 29, 2019

    public static $HOUR = "H";

    public static function getDate($pattern, $date)
    {
        $phpdate = strtotime(  $date );
        $formattedDate = date( $pattern, $phpdate );
        return $formattedDate;
    }
    
}


