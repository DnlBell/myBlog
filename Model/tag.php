<?php
/**
 * Created by PhpStorm.
 * User: dnlbe
 * Date: 3/11/2018
 * Time: 6:34 PM
 */
include_once "../database/connection.php";

class tag
{
    public $id;
    public $tag;

    public function __construct($id, $tag)
    {
        $this->id = $id;
        $this->tag = $tag;
    }

    public static function tags() {
        $db = Db::getInstance();
        $tags = [];
        $query = "SELECT *
                  FROM blog.tags
                  LIMIT 5";

        if ($stmt = $db->prepare($query)) {

            $stmt->execute();

            $stmt->bind_result($id,$tag);

            for ($i = 0; $stmt->fetch(); $i++) {
                $tags[$i] = new tag($id,$tag);
            }

            return $tags;
        }


    }

    public static function tagsByEntryId($id){
        $db = Db::getInstance();
        $tags = [];
        $query = "SELECT tags.id, tags.tag
                  FROM blog.tags
                  JOIN blog.entryTags 
                  ON tags.id = tags_id
                  WHERE entryTags.entry_id = $id";

        if ($stmt = $db->prepare($query)) {

            $stmt->execute();

            $stmt->bind_result($id,$tag);

            for ($i = 0; $stmt->fetch(); $i++) {
                $tags[$i] = new tag($id,$tag);
            }

            return $tags;
        }
    }


}

