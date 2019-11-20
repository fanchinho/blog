<?php
// Chargement des classes
require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/TagManager.php');


use \OpenClassRooms\Blog\Model\PostManager;
use \OpenClassRooms\Blog\Model\CommentManager;
use \OpenClassRooms\Blog\Model\TagManager;

function homepage ()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $tagManager = new TagManager();
        
    //Récupération des tags sur les côtés
    $tagSide = $tagManager->getTags();
    
    //PAGINATION 
    $countPost = $postManager->numberPosts();
    $nbrPost = $countPost['NbrPost'];
    
    $limitPost = 5;
    $currentPage = 1;
    $nbrePage = ceil($nbrPost/$limitPost);
    
    if (isset($_GET['p']) && ($_GET['p']) < $nbrePage){
        $currentPage = $_GET['p'];
    }
    
    $post = $postManager->getPosts($currentPage, $limitPost);
    
    require('view/frontend/home.php');
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


function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $tagManager = new TagManager();
    
    $post = $postManager->getPost($_GET['id']);
    
    //récupération des id des tags
    $tagsPost = $tagManager->TagsbyPost($_GET['id']);

    //récupération des tags
    $tagsPost = $tagManager->TagsbyPost($_GET['id']);
    
    //nombre de commentaires
    $numberComments = $commentManager->NumberComments($_GET['id']);
    
    //récupération des commentaires de l'article
    $comments = $commentManager->getComments($_GET['id']);
    
    require('view/frontend/post.php');
}


function addComment($postId, $author, $mail, $content)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $mail, $author, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        return true;
    }
}


