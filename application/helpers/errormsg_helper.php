<?php
function errorCheck($redirect_to = NULL, $res = NULL) {
    if (strlen($redirect_to) && $res) {
        if (is_array($res) && count($res)) {
            if (array_key_exists('message', $res)) {
                $_SESSION['errormsg']=$res['message'];
            } else {
                $_SESSION['errormsg']='Seems to be some problem. Try Again';
            }
        } else {
            if ($res == 1 || $res == true) {
                $_SESSION['successmsg']='Banner created successfully';
            } else {
                $_SESSION['errormsg']='Seems to be some problem. Try Again';
            }
        }
        header('location:'.BASE_URI.$redirect_to);
        exit();
    } else {
        header('location:'.BASE_URI.'backend/home-page');
    }
}