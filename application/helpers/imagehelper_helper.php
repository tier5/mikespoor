<?php
function moveImage($image_tmp_name = NULL, $image_name = NULL) {
    $new_path = 'assets/tmp_img_storage/';
    if ($image_tmp_name && $image_name) {
        if(copy($image_tmp_name, $new_path.$image_name)){
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function isProperWH($file_path = NULL) {
    if (strlen($file_path)) {
        return @getimagesize($file_path);
        //return true;
    } else {
        return false;
    }
}
function imagePropertyCheck($file_details = NULL){
    if ($file_details) {
      
        if(moveImage($file_details['imgBanner']['tmp_name'], $file_details['imgBanner']['name'])){
           
            if(count(isProperWH('assets/tmp_img_storage/'.$file_details['imgBanner']['name']))) {
               
                $img_size_arr =  isProperWH('assets/tmp_img_storage/'.$file_details['imgBanner']['name']);
                    //width check
                    if ($img_size_arr[0] == 1280 || $img_size_arr[0] == "1280") {
                    //height check.
                       
                        if ($img_size_arr[1] == 800 || $img_size_arr[1] == "800") {
                          
                            unlink('assets/tmp_img_storage/'.$file_details['imgBanner']['name']);
                            return true;
                        } else {
                            unlink('assets/tmp_img_storage/'.$file_details['imgBanner']['name']);
                            return false;
                        }
                    } else {
                        unlink('assets/tmp_img_storage/'.$file_details['imgBanner']['name']);
                        return false;
                    }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}