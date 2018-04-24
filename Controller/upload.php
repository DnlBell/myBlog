<?php
 include_once "../Model/entry.php";
 $title = $_POST['title'];
 $imageFile = "Images/".basename( $_FILES["fileToUpload"]["name"]);
 $content =  $_POST['content'];
 $date = date("Y-m-d");
 $id = entry::getTopId()+1;

 $flag = 0;

$target_dir = "C:\MAMP\htdocs\MyBlog\Images\\";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $flag = 1;
    }
}


 //weather call
 $ch = curl_init();

 $url = "http://api.wunderground.com/api/9cbeeefb5645e05c/conditions/q/wa/seattle.json";

 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 curl_setopt($ch, CURLOPT_HTTPGET, true);

 $data = curl_exec($ch);

 curl_close($ch);

 $json_output = json_decode($data);

 $weather = $json_output->current_observation->weather;


 //make new entry
if ($flag == 0) {
    entry::newEntry($id, $title, $date, $weather, $content, $imageFile);
    entry::newEntryTagMap($id, 4);
    header("location:journalController.php?id=t");
} else {
    header("location:../Veiw/newEntry.php");
}


