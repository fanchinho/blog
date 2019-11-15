<?php session_start(); ?>
<?php require('Controller/frontend.php');
require('Controller/backend.php');
try {
    if (isset($_GET['action'])) {
        if (isset($_GET['p'])) {
            homepage();
        }
        if ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['message'])) {
                    if(addComment($_GET['id'], $_POST['pseudo'], $_POST['email'], $_POST['message']) == true) 
                    {
                        post();
                    }
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif ($_GET['action'] == 'comment') {
            if (isset($_GET['id']) && isset($_POST['idComment'])) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    comment();
                }
                else {
                    throw new Exception('bugg');
                }
            }
            else {
                throw new Exception('il manque des informations');
            }
        }
        elseif ($_GET['action'] == 'updateComment') {
            updateComment($_GET['id'],$_GET['idComment'], $_POST['author'], $_POST['comment']);
        }
        //RUBRIQUE CONTACT
        elseif ($_GET['action'] == 'contact') {
            contact();
        }
        //Formulaire de contact 
        elseif ($_GET['action'] == 'contactPost') {
            contactForm();
        }
        elseif ($_GET['action'] == 'blog') {
            blog();
        }
        elseif ($_GET['action'] == 'about') {
            about();
        }
        
        
        //CONNEXION À L'ADMIN DU SITE INTERNET
        elseif ($_GET['action'] == 'admin') {
            if (isset($_SESSION['status']) && ($_SESSION['status'] == 'connected') ) {
                adminHome();
            }
            else {
                admin();
            }
        }
        elseif ($_GET['action'] == 'adminConnect') {
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                if(adminConnect($_POST['login'], $_POST['password']) == true) {
                    adminHome();
                }
                else {
                    throw new Exception('le mot de passe est faux');
                }
            }
            else {
                throw new Exception('tout n\'est pas rempli');
            }
        }
        
        //CREATION DES POSTS
        elseif ($_GET['action'] == 'createPost') {
            createPost();
        }
        
        // Ajout d'un post via l'admin
        elseif ($_GET['action'] == 'addPost') {
            addPost();
        }
        
        //SUPPRESSION D'UN ARTICLE
        // Avertissement avant la suppresion d'un article
        elseif ($_GET['action'] == 'advertDeletePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                advertDelete($_GET['id']); 
            }
            else {
                throw new Exception('chargement non effectué');
            }
        }
        
        // Suppression définitive d'un article 
        elseif ($_GET['action'] == 'deletePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete($_GET['id']);
                
                if(delete($_GET['id']) == true) {
                    adminHome();
                }
            }
            else {
                throw new Exception('suppression non effectué');
            }
        }
        
        // Page modification de l'article
        elseif ($_GET['action'] == 'adminPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                change($_GET['id']); 
            }
            else {
                throw new Exception('chargement non effectué');
            }
        }
        
        elseif ($_GET['action'] == 'changePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                
                $filename = uploadPhoto($_FILES["photo"]);
                
                    if (changePost($_GET['id'], $_POST['title'], $_POST['content'], $filename) == true) {
                        adminHome();
                    }
                    
                }
            else {
                throw new Exception('problême de données');
            }
        }
        
        // MODERATION DES COMMENTAIRES
        // Accès à la liste des commentaires à modérer
        elseif ($_GET['action'] == 'adminComments') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                commentsByPost($_GET['id']); 
            }
            else {
                throw new Exception('Problême de url');
            }
        }
        // Accès à la liste des commentaires à modérer
        elseif ($_GET['action'] == 'CommentOnline') {
            if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                if(commentOnLine($_GET['idComment']) == true) {
                    commentsByPost($_GET['id']); 
                }
            }
            else {
                throw new Exception('Problême de url');
            }
        }
        elseif ($_GET['action'] == 'CommentOffline') {
            if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                if(commentOffLine($_GET['idComment']) == true) {
                    commentsByPost($_GET['id']); 
                }
            }
            else {
                throw new Exception('Problême de url');
            }
        }
        // DECONNEXION
        elseif ($_GET['action'] == 'deconnexion') {
            adminDeconnexion();
        }
    }
    else {
        homepage();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
