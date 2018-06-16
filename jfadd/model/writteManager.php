<?php
/*page writte ppost manager*/
namespace ced\Blog\projet4;

require_once("model/manager.php");

class writteManager extends Manager{
    /*send post after validation*/
    public function postPost($title, $content,$writer, $image, $posted){
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(posts.title, posts.content, posts.writer, posts.image, posts.posted, posts.date)
         VALUES(?, ?, ?, ?, ?, NOW())');
        $affectedLines = $posts->execute(array($title, $content,$writer, $image, $posted));

        return $affectedLines;
    }
}