<?php include 'templates\header.php';?>
<header>
    <h1>Archive</h1>
</header>
<?php include 'templates\nav.php';?>
    <main>
        <h2>:: Entries ::</h2>

<?php

    $entryTemplate = "
        <h2>
            <a href=\"%s\">Entry Date: %s :: <i>%s</i></a>
        </h2>
        <hr>
       <p>
       %s
       </p>";

    for($i = 0; $i < sizeof($Articles); $i++) {
        $preview = substr($Articles[$i]->Content, 0,200);
        $preview = $preview."...</p>";
        printf($entryTemplate,"../Controller/journalController.php?id=".$Articles[$i]->id,$Articles[$i]->Date,$Articles[$i]->Title,$preview);
    }

?>
    </main>
    <aside>
        <h3>Filter By Category</h3>
        <div id = "archTags">
            <ul>

<?php
        $tagTemplate = "<li><a href=\"%s\">%s</a></li>";
             for($i = 0; $i < sizeof($Tags); $i++) {
                 printf($tagTemplate,"../Controller/archiveController.php?type=1&id=".$Tags[$i]->id,$Tags[$i]->tag);
             }
?>
            </ul>
        </div><!--end archTags-->
    </aside>
<?php include 'templates\footer.php';?>
