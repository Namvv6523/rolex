<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "rolex";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";
const BASE_URL = "http://localhost/rolex/";

function delete_session($flag = true) {
    unset($_SESSION['errors'] );
    unset($_SESSION['success'] );
}

function redirect($key,$msg,$route) {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case 'success':
            unset($_SESSION['errors']);
        break;
        case 'errors':
            unset($_SESSION['success']);
        break;
    }
    header('location:'.BASE_URL.$route."?msg=".$key);die;
}

function route($name) {
    return BASE_URL.$name;
}