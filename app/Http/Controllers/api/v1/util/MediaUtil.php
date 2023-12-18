<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\isgapi\api\v1\util;
use App\Http\Controllers\api\v1\dto\MediaDTO;

class MediaUtil {
  // CHECK FILE IS EXIST ON REMOTE LOCATION OR NOT BASED ON HOST AND IMAGE URL SAVED IN DB
  public static function getFileHeaders($imageUrl){
      $file_headers = @get_headers($imageUrl);
      if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        return false;
      }else{
        return true;
      }
  }
  // CHECK WHETHER GIVEN FILES DETAILS EXIST OR NOT IF NOT THEN APPLY GIVEN DEFAULT IMAGE 
  public static function setCurrentImage($imageHost,$imageName,$defaultImageUrl){
      if(trim($imageHost)!='' && trim($imageName)!=''){
        $newImage =   $imageHost.''.$imageName;
        if(self::getFileHeaders($newImage)===false) {
          $newImage = $defaultImageUrl;     
       }  
      }else{
         $newImage = $defaultImageUrl;     
      }
      return $newImage;
  }


  // CHECK USER PROFILE IMAGE IS EXIST IN DB OR NOT AND IF ITS NOT THEN ITS SET DEFAULT IMAGE GIVEN BY RAED
  public static function checkRetriveUserProfileImage($imageHost,$imageName){
      $userProfileDefaultImage = MediaDTO::$MEDIA_DEFAULT_USER_PROFILE_IMAGE;  
      return $userProfileImage = self::setCurrentImage($imageHost,$imageName,$userProfileDefaultImage);  
  } 

  // CHECK USER COVER IMAGE IS EXIST IN DB OR NOT AND IF ITS NOT THEN ITS SET DEFAULT IMAGE 
  public static function checkRetriveUserCoverImage($imageHost,$imageName){
      $userProfileDefaultCoverImage = MediaDTO::$MEDIA_DEFAULT_USER_COVER_IMAGE;  
      return $userProfileCoverImage = self::setCurrentImage($imageHost,$imageName,$userProfileDefaultCoverImage);  
  } 

  // CHECK PLACE COVER IMAGE IS EXIST IN DB OR NOT AND IF ITS NOT THEN ITS SET DEFAULT IMAGE 
  public static function checkRetrivePlaceCoverImage($imageHost,$imageName){
      $placeDefaultCoverImage = MediaDTO::$MEDIA_DEFAULT_PLACE_COVER_IMAGE;
      return $placeCoverImage = self::setCurrentImage($imageHost,$imageName,$placeDefaultCoverImage);  
  } 

  // CHECK PLACE LOGO IS EXIST IN DB OR NOT AND IF ITS NOT THEN ITS SET DEFAULT LOGO 
  public static function checkRetrivePlaceLogo($imageHost,$imageName){
      $placeDefaultLogoImage = MediaDTO::$MEDIA_DEFAULT_PLACE_LOGO;
      return $placeLogoImage = self::setCurrentImage($imageHost,$imageName,$placeDefaultLogoImage);  

  } 

  // CHECK USER COVER IMAGE IS EXIST IN DB OR NOT AND IF ITS NOT THEN ITS SET DEFAULT IMAGE 
  public static function checkRetriveEventCoverImage($imageHost,$imageName){
      $eventDefaultCoverImage = MediaDTO::$MEDIA_DEFAULT_EVENT_COVER_IMAGE;
      return $userProfileCoverImage = self::setCurrentImage($imageHost,$imageName,$eventDefaultCoverImage);  
  } 
   
  public static function checkRetriveAlbumImage($imageHost, $imageName){
      $albumDefaultImage = MediaDTO::$MEDIA_DEFAULT_ALBUM_IMAGE;
      return $albumImage = self::setCurrentImage($imageHost,$imageName,$albumDefaultImage);
  }

  public static function checkRetriveNotificationImage($imageHost, $imageName){
      $notificationDefaultImage = MediaDTO::$MEDIA_DEFAULT_Notification_IMAGE;
      return $notificationImage = self::setCurrentImage($imageHost,$imageName,$notificationDefaultImage);
  }
   
}


