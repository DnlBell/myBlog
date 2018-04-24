<?php
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/4/2018
 * Time: 11:52 AM
 */
include_once "../database/connection.php";

class entry
{
    public $id;
    public $Title;
    public $Date;
    public $Weather;
    public $Content;
    public $ImageFile;
    public $Tags;

    public function __construct($id, $Title, $Date, $Weather, $Content, $ImageFile, $Tags)
    {
        $this->id = $id;
        $this->Title = $Title;
        $this->Date = $Date;
        $this->Weather = $Weather;
        $this->Content = $Content;
        $this->ImageFile = $ImageFile;
        $this->Tags = $Tags;
    }


    /**
     * @param $id
     * @return bool|entry
     *
     * Get article returns an entry
     */
    public static function getArticle($id)
    {

        $db = Db::getInstance();

        $id = intval($id);

        $query = "SELECT * 
                  FROM  blog.entry
                  WHERE entry.id = $id";


        if ($stmt = $db->prepare($query)) {

            $stmt->execute();
            $stmt->bind_result($id, $Title, $Date, $Weather, $Content, $ImageFile);
            $stmt->fetch();
            $article = new entry($id, $Title, $Date, $Weather, $Content, $ImageFile, []);


            return $article;
        } else {
            echo mysqli_error($db);

        }
    }

    public static function getTags($id)
    {
        $db = db::getInstance();
        $tags = [];
        $id = intval($id);

        $queryTags = "SELECT tags.tag
                     FROM blog.entry
                     JOIN entryTags ON entry.id = entryTags.entry_id
                     JOIN tags ON entryTags.tags_id = tags.id
                     WHERE entry.id = $id";

        if ($stmt = $db->prepare($queryTags)) {
            $stmt->execute();
            $stmt->bind_result($tag);

            for ($i = 0; $stmt->fetch(); $i++) {
                $tags[$i] = $tag;
            }
            return $tags;
        }
        return false;
    }

    public static function listable($from, $length)
    {
        $db = db::getInstance();
        $Articles = [];

        $onTopQuery = "SELECT *
                       FROM blog.entry
                       WHERE entry.id <= $from AND entry.id >= $length - $from
                       ORDER BY entry.id DESC";

        if ($stmt = $db->prepare($onTopQuery)) {

            $stmt->execute();

            $stmt->bind_result($id, $Title, $Date, $Weather, $Content, $ImageFile);

            for ($i = 0; $stmt->fetch(); $i++) {
                $Articles[$i] = new entry($id, $Title, $Date, $Weather, $Content, $ImageFile, []);
            }
            return $Articles;
        } else {
            return false;
        }

    }

    public static function tagged($tagId)
    {
        $db = db::getInstance();
        $Articles = [];

        $tagId = intval($tagId);

        $tagQuery = "SELECT *
                      FROM blog.entry
                      INNER JOIN entrytags
                      ON entry.id = entry_id
                      WHERE entrytags.tags_id = $tagId";

        if ($stmt = $db->prepare($tagQuery)) {
            $stmt->execute();

            $stmt->bind_result($id, $Title, $Date, $Weather, $Content, $ImageFile, $TagId, $EntryId);

            for ($i = 0; $stmt->fetch(); $i++) {
                $Articles[$i] = new entry($id, $Title, $Date, $Weather, $Content, $ImageFile,$TagId);
            }
            return $Articles;
        } else {
            return false;
        }

    }

    public static function getTopId()
    {
        $db = db::getInstance();
        $tId = 0;

        $topQuery = "SELECT entry.id
                     FROM blog.entry
                     ORDER BY entry.id DESC
                     LIMIT 1";

        if ($stmt = $db->prepare($topQuery)) {
            $stmt->execute();

            $stmt->bind_result($id);
            $stmt->fetch();

            $tId = $id;
        }

        return $tId;
    }

    public static function newEntry ($id, $title, $date, $weather, $content, $imageFile) {

        $db = db::getInstance();

        $query = "INSERT INTO blog.entry (id, Title, Date, Weather, Content, ImageFile)
                  VALUES ($id,'$title','$date','$weather','$content','$imageFile')";

        if($stmt = $db->prepare($query)){
            $db->query($query);
        }

    }

    public static function newEntryTagMap($entryId,$tagId) {

        $db = db::getInstance();

        $query = "INSERT INTO blog.entryTags (tags_id, entry_id)
                  VALUES ($tagId, $entryId)";

        if($stmt = $db->prepare($query)){
            $db->query($query);
        }
    }
}