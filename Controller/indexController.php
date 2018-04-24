<?php
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/10/2018
 * Time: 8:46 PM
 */
include_once "../Model/entry.php";

$tId = entry::getTopId();

echo $tId;

$Articles = entry::listable($tId,3);

include("../Veiw/home.php");