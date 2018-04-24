/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/12/2018
 * Time: 10:09 AM
 */
<?php include 'templates\header.php';?>
    <header>
        <h1>Create</h1>
    </header>
<?php include 'templates\nav.php';?>
    <div id="entryBlock">
        <form name="entryForm" action="../Controller/upload.php" method="post" enctype="multipart/form-data">
            <ul>
                <li>Title:<input name="title" type="text"></li>
                <li>Image:<input type="file" name="fileToUpload" id="fileToUpload"></li>
                <li><textarea name="content" rows="6" cols="50" >Enter text here...</textarea></li>
                <li><button type ="submit" onclick="return validate()">submit</li>
            </ul>
        </form>
    </div>
<?php include 'templates/footer.php';?>
<script type="text/javascript" src="../Script/main.js"></script>

