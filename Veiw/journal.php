<?php include 'templates/header.php';?>
    <header>
        <h1>Journal</h1>
    </header>
<?php include 'templates/nav.php';?>
<main>
    <h2>
        Entry Date: <?php echo $myArticle->Date ?> :: <i><?php echo $myArticle->Title ?> </i>
    </h2>
    <hr>
    <?php echo $myArticle->Content ?>
</main>
<aside>
    <img src="../<?php echo $myArticle->ImageFile ?>" width="330" >
    <h2>
        Categories:
    </h2>
    <ul>
        <?php

        for ($i = 0; $i < sizeof($myTags) && $i < 3; $i++){
            echo "<li><a href=\"archiveController.php?type=1&id=".$myTags[$i]->id."\">".$myTags[$i]->tag."</a></li>";
        }
        ?>
    </ul>
    <h2>
        Weather:
    </h2>
    <ul>
        <?php echo $myArticle->Weather;?>
    </ul>
</aside>
<div id="shim"></div>
<div id="Jnav">
    <ul>
        <li><a href="journalController.php?id=<?php echo (($myArticle->id) - 1); ?>">Previous</a></li>
        <li><a href="journalController.php?id=<?php echo (($myArticle->id) + 1); ?>">Next</a></li>
    </ul>
</div><!--end jnav-->
<?php include 'templates/footer.php';?>


