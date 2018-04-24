<?php
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/12/2018
 * Time: 9:32 AM
 */
include_once "../database/connection.php";

class user
{

    public function __construct(){


    }

    public static function checkPassword($user,$pass){
        $db = Db::getInstance();

        $query = "SELECT user.password
                    FROM blog.user
                    WHERE user.name = '$user'";

        if($stmt = $db->prepare($query)) {

            $stmt->execute();

            $stmt->bind_result($pReturn);

            $stmt->fetch();

            if(strcmp($pReturn,$pass) == 0) {

                return true;
            }
        }
        return false;
    }

}