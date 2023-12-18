<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\api\v1\util;

class StringUtil {

    public static $STR_MATCHED = 0;

    // Functions to Match 2 Strings
    public static function matched($str1, $str2) {
        if (strcmp($str1, $str2) == StringUtil::$STR_MATCHED) {
            return true;
        }
        return false;
    }

    // Functions to Check Word Exists in the String or not.
    public static function contains($str1, $str2) {
        return strpos($str1, $str2) !== false;
    }

    // Removes the All Special Characters and add hypens only between 2 words.   
    public static function cleanFileName($new_filename) {
        if (trim($new_filename) != '') {
            $new_filename = str_replace(array("(", ")"), "", trim(strtolower($new_filename)));
            $new_filename = preg_replace('/[^a-z0-9-.\-]/', '-', $new_filename);
            $new_filename = str_replace(array(" ", "-"), "_", trim($new_filename));
            $new_filename = preg_replace('/[_]+/', '-', trim($new_filename));
            $new_filename = preg_replace('/[-]+/', '-', trim($new_filename));
        }
        return trim($new_filename);
    }

    // Remove @ symbol from String for the Username
    public static function removeatsym($username) {
        $user_name = str_split($username);
        if ($user_name[0] == '@') {
            $updatedusername = substr($username, 1);
            return StringUtil::removeatsym($updatedusername);
        } else {
            return $username;
        }
    }

    public static function startsWith($string, $startString) {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

}
