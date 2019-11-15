<?php
namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT author, content, status, DATE_FORMAT(date, \'%d/%m/%Y \') AS comment_date FROM comment WHERE id_post = ? ORDER BY date DESC');
        $req->execute(array($postId));
        
        return $req;

    }

    public function postComment($postId, $mail, $author, $content)
    {

        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(id_post, mail, author, content, status, date) VALUES(?, ?, ?, ?, 0,NOW())');

        $affectedLines = $comments->execute(array($postId, $mail, $author, $content));
        
        return $affectedLines;
    }
    
    public function NumberComments($postId)
    {
        $db = $this->dbConnect();
        $number = $db->prepare('SELECT COUNT(*) AS Nbr_comments FROM comment WHERE id_post = ? AND status = 1');
        $number->execute(array($postId));
        $numberComments = $number->fetch();

        return $numberComments;
    }
    
    public function StatusComment($comment)
    {
        $db = $this->dbConnect();
        $statut = $db->query('SELECT ? FROM comment');
        $statut ->execute(array($comment));

        return $statut;
    }
    
}
