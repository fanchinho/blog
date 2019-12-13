<?php
// Chargement des classes
require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/TagManager.php');
require_once('class/comment.php');



use \OpenClassRooms\Blog\Model\PostManager;
use \OpenClassRooms\Blog\Model\CommentManager;
use \OpenClassRooms\Blog\Model\TagManager;

function postObjet($idPost)
{
    $idPost = $_GET['id'];
    $comment = new Comment($idPost);

    require('view/frontend/postObjet.php');
}

function homepage ()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $tagManager = new TagManager();
        
    //Récupération des tags sur les côtés
    $tagSide = $tagManager->getTags();
    
    //PAGINATION 
    $countPost = $postManager->numberPosts();
    
    $paginationInfo = pagination($countPost);

    $post = $postManager->getPosts($paginationInfo['0'], $paginationInfo['1']);
    
    require('view/frontend/home.php');
}
function listPostByTag ($idTag)
{
    $commentManager = new CommentManager();
    $tagManager = new TagManager();
        
    //Récupération des tags sur les côtés
    $tagSide = $tagManager->getTags();
    
    //PAGINATION 
    $countPost = $tagManager->numberPostsByTag($idTag);

    $paginationInfo = pagination($countPost);

    $post = $tagManager->getPostsByTag($paginationInfo['0'], $paginationInfo['1'], $idTag);

    require('view/frontend/PostsByTag.php');
}

function pagination ($countPost) {
    $nbrPost = $countPost['NbrPost'];
    $limitPost = 5;

    $nbrePage = ceil($nbrPost/$limitPost);

    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbrePage){
        $currentPage = $_GET['p'];
    }
    else {
        $currentPage = 1;
    }

    return array($currentPage, $limitPost, $nbrePage);
}

function about ()
{
    require('view/frontend/about.php');
}

function contact ()
{
    require('view/frontend/contact.php');
}


function blog ()
{
    $postManager = new PostManager();
    
    $post = $postManager->getPosts();
    
    require('view/frontend/blog.php');
}


function post($id)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $tagManager = new TagManager();
    
    $post = $postManager->getPost($id);
    
    //récupération des id des tags
    $tagsPost = $tagManager->TagsbyPost($id);

    //récupération des tags
    $tagsPost = $tagManager->TagsbyPost($id);
    
    //nombre de commentaires
    $numberComments = $commentManager->NumberComments($id);
    
    //récupération des commentaires de l'article
    $comments = $commentManager->getComments($id);

    //récupération des derniers articles
    $lastPosts = $postManager -> lastPosts();
    
    require('view/frontend/post.php');
}

function addComment($postId, $author, $mail, $content)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $mail, $author, $content);

    header("Location: index.php?action=post&id=".$postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        return true;
    }
}
function signalComment($idComment)
{
    $commentManager = new CommentManager();

    $comment = $commentManager->CommentToSIgnal($idComment);

    require('view/frontend/commentSignal.php');
}
function signalBack($idComment)
{
    $commentManager = new CommentManager();

    $comment = $commentManager->signalBack($idComment);

    header("Location: index.php");
}
