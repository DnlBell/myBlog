<?php
include_once "../Model/entry.php";
include_once "../Model/tag.php";

$id =  $_GET['id'];

if(isset($id)){

    $tId = entry::getTopId();

    if($id == 't' || $id > $tId){

        $myArticle = entry::getArticle($tId);
        $myTags = tag::tagsByEntryId($tId);

        include("../Veiw/journal.php");

    }
    else if($id == 0){
        $myArticle = entry::getArticle(1);
        $myTags = tag::tagsByEntryId(1);

        include("../Veiw/journal.php");
    }

    else {

        $myArticle = entry::getArticle($id);
        $myTags = tag::tagsByEntryId($id);

        include("../Veiw/journal.php");
    }


    Db::getInstance()->close();
}



