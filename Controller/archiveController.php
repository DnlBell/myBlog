<?php
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/11/2018
 * Time: 4:47 PM
 */
include_once "../Model/entry.php";
include_once "../Model/tag.php";
$type = $_GET['type'];

if(isset($type))

    if($type == 0) {

        $topId = entry::getTopId();

            if (isset($topId)) {
                $Articles = entry::listable($topId, 5);
                $Tags = tag::tags();
                include("../Veiw/archive.php");
            }

    }else if($type == 1) {

        $tagId = $_GET['id'];

            if (isset($tagId)) {
                $Articles = entry::tagged($tagId);
                $Tags = tag::tags();
                include("../Veiw/archive.php");
            }
    }