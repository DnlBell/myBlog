
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/4/2018
 * Time: 10:40 AM
 */

<?php include 'templates/header.php';?>
<header>
    <h1>Welcome to my site!</h1>
</header>
<?php include 'templates/nav.php';?>

<main>
    <h3>Enjoy your stay</h3>
    <p>Lorem ipsum dolor sit amet, elit aliquam sed egestas eu, dignissim cras aenean. Eget integer vivamus at urna amet vitae, eros sed faucibus tellus volutpat, in cras nec. Faucibus lacus id felis orci. Gravida hendrerit sagittis ipsum ut ut. Id ornare fusce cursus mi magna quis. In scelerisque dui etiam vel, amet orci eu luctus, auctor tortor maecenas pretium pharetra elementum, lobortis excepturi adipiscing eget vestibulum sem aliquam.o</p>
    <p>Sed efficitur at ligula congue pharetra. Praesent in ex feugiat eros semper dignissim. In hac habitasse platea dictumst. Donec sagittis interdum accumsan. Vivamus nec orci mattis, molestie odio sed, efficitur justo. Phasellus in hendrerit ante. Phasellus efficitur accumsan erat eget hendrerit. Ut eu nisi condimentum, tempus urna eget, interdum nisi. Nulla facilisi.</p>
    <p>Purus risus luctus varius sed et, justo scelerisque sodales, sed dignissim. Amet placerat accumsan tempor id, cras a amet egestas a quis odi. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
</main>
<aside>
    <a href="../Controller/adminController.php?type=0"><img class="center" src="../Images/face.jpg" alt=""></a>
    <h3><i>Contact Me</i></h3>
    <hr>
    <ul>
        <li>Email: <a href="mailto:dnl.bell@gmail.com?subject=Contact">dnl.bell@gmail.com</a></li>
        <li>LinkedIn: <a href = "https://www.linkedin.com/in/danny-bell-0513b863">My Profile</a></li>
    </ul>
</aside>
<div id="Entry1">
    <a href="../Controller/journalController.php?id=<?php echo $Articles[0]->id;?>"><?php echo $Articles[0]->Date?> <?php echo $Articles[0]->Title?></a>
    <?php echo substr($Articles[0]->Content,0,100)?> ...</p>

</div>
<div id="Entry2">
    <a href="../Controller/journalController.php?id=<?php echo $Articles[1]->id;?>"><?php echo $Articles[1]->Date?> <?php echo $Articles[1]->Title?></a>
    <?php echo substr($Articles[1]->Content,0,100)?> ...</p>

</div>
<div id="Entry3">
    <a href="../Controller/journalController.php?id=<?php echo $Articles[2]->id;?>"><?php echo $Articles[2]->Date?> <?php echo $Articles[2]->Title?></a>
    <?php echo substr($Articles[2]->Content,0,100)?> ...</p>

</div>
<?php include 'templates/footer.php';?>