<?php session_start(); ?>
<?php require('Controller/frontend.php');
require('Controller/backend.php');
try {

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            //HOMEPAGE
            case 'p' : homepage(); 
            break;
            //AFFICHAGE PAR TAGS
            case 'tag' : 
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    listPostByTag($_GET['id']); 
                }
            break;
            //PAGE ARTICLE
            case 'post' : 
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            break;
            //COMMENTAIRES
            case 'addComment' :
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
            break;

            case 'comment' :
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
            break;

            case 'updateComment' :
                updateComment($_GET['id'],$_GET['idComment'], $_POST['author'], $_POST['comment']);
            break;
            //PAGE CONTACT
            case 'contact' :
                contact();
            break;

            case 'contactPost' :
                contactForm();
            break;
            case 'about' :
                about();
            break;

            case 'admin' :
                if (isset($_SESSION['status']) && ($_SESSION['status'] == 'connected') ) {
                    adminHome();
                }
                else {
                    admin();
                }
            break;

            //CONNEXION À L'ADMIN DU SITE INTERNET
            case 'admin' :
                if (isset($_SESSION['status']) && ($_SESSION['status'] == 'connected') ) {
                    adminHome();
                }
                else {
                    admin();
                }
            break;
            case 'adminConnect' :
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
            break;

            case 'updateComment' :
                updateComment($_GET['id'],$_GET['idComment'], $_POST['author'], $_POST['comment']);
            break;

            //RUBRIQUE CONTACT
            case 'contact' :
                contact();
            break;
            //Formulaire de contact 
            case 'contactPost' :
                contactForm();
            break;
            case 'blog' :
                blog();
            break;
            case 'about' :
                about();
            break;

            //CONNEXION À L'ADMIN DU SITE INTERNET
            case 'admin' :
                if (isset($_SESSION['status']) && ($_SESSION['status'] == 'connected') ) {
                    adminHome();
                }
                else {
                    admin();
                }
            break;
            case 'adminConnect' :
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
            break;

            //CREATION DES POSTS
            case 'createPost':   
                createPost();
            break;
            // Ajout d'un post via l'admin
            case 'addPost' : 
                addPost();
            break;
            //SUPPRESSION D'UN POST
            // Avertissement avant la suppresion d'un article
            case 'advertDeletePost' : 
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    advertDelete($_GET['id']); 
                }
                else {
                    throw new Exception('chargement non effectué');
                }
            break;
            // SUPPRESSION DÉFINITIVE DU POST
            case 'deletePost' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete($_GET['id']);
                    
                    if(delete($_GET['id']) == true) {
                        adminHome();
                    }
                }
                else {
                    throw new Exception('suppression non effectué');
                }
            break;
            // Page modification de l'article
            case 'adminPost' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    change($_GET['id']); 
                }
                else {
                    throw new Exception('chargement non effectué');
                }
            break;
            case 'changePost' : 
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (uploadPhoto($_FILES["photo"]) == false) {
                            if (changePost($_GET['id'], $_POST['title'], $_POST['content']) == true) {
                                header("Location: index.php?action=admin");
                            }
                        } else {
                            $filename = uploadPhoto($_FILES["photo"]);
                            if (changeCompletePost($_GET['id'], $_POST['title'], $_POST['content'], $filename ) == true) {
                                header("Location: index.php?action=admin");
                            }
                        }
                    }
                else {
                    throw new Exception('problême de données');
                }
            break;
            // MODERATION DES COMMENTAIRES
            // Accès à la liste des commentaires à modérer
            case 'adminComments' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    commentsByPost($_GET['id']); 
                }
                else {
                    throw new Exception('Problême de url');
                }
            break;
            case 'CommentOnline':
                if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                    if(commentOnLine($_GET['idComment']) == true) {
                        commentsByPost($_GET['id']); 
                    }
                }
                else {
                    throw new Exception('Problême de url');
                }
            break;
            // Accès à la liste des commentaires à modérer
            case 'CommentOffline' : 
                if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                    if(commentOffLine($_GET['idComment']) == true) {
                        commentsByPost($_GET['id']); 
                    }
                }
                else {
                    throw new Exception('Problême de url');
                }
            break;
            case 'CommentOnline' : 
                if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                    if(commentOnLine($_GET['idComment']) == true) {
                        commentsByPost($_GET['id']); 
                    }
                }
                else {
                    throw new Exception('Problême de url');
                }
            break;

             // DECONNEXION
            case 'deconnexion' : 
                adminDeconnexion();
            break;

            }
    }
    else {
        homepage();
    }
}

catch(Exception $e) {
    $messageError = 'il y a une erreur : ' . $e->getMessage();
    pageError($messageError);
}
