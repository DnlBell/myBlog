<?php
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/12/2018
 * Time: 9:21 AM
 */
include_once "../Model/user.php";

$type = $_GET["type"];

if($type == 0){
    include "../Veiw/login.php";
}elseif($type == 1){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if(user::checkPassword($user,$pass)){

        include "../Veiw/newEntry.php";

    }else {
        echo "login failure";
        include"../Veiw/login.php";
    }

}

