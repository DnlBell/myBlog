
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/12/2018
 * Time: 8:13 AM
 */
<?php include 'templates\header.php';?>
<header>
    <h1>Login</h1>
</header>
<?php include 'templates\nav.php';?>
    <div id="centerBlock">
        <img class="center" src="../Images/bird.gif" alt="">
        <h3>Log in</h3>
        <ul>
            <form action="adminController.php?type=1" method="post">
                <li>Username: <input name="user" type="text"></li>
                <li>Password: <input name="pass" type="password"></li>
                <li><input type="submit" /></li>
            </form>
        </ul>
    </div>
<?php include 'templates\footer.php';?>