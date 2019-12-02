<?php
namespace OpenClassRooms\Blog\Model;

require_once("Model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, content, status, DATE_FORMAT(date, \'%d/%m/%Y \') AS comment_date FROM comment WHERE id_post = ? ORDER BY date DESC');
        $req->execute(array($postId));
        
        return $req;

    }

    public function postComment($postId, $mail, $author, $content)
    {

        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(id_post, mail, author, content, status, date) VALUES(?, ?, ?, ?, 1,NOW())');

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
    
    public function CommentToSIgnal($idComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comment WHERE id = ?');
        $req ->execute(array($idComment));
        $comment = $req->fetch();

        return $comment;
    }
    public function signalBack($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET moderate = :newStatus WHERE id = :commentId');
        $newStatus = $req->execute(array(
            'commentId' => $commentId,
            'newStatus' => 1,
            ));
        
        return $newStatus;

    }
    public function StatusComment($comment)
    {
        $db = $this->dbConnect();
        $statut = $db->query('SELECT ? FROM comment');
        $statut ->execute(array($comment));

        return $statut;
    }
    
}
