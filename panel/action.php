<?php
include ('class/class_gossip.php');
$app = new Application();
//$app->checkIsLogin();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'login':
            $username = (isset($_POST['username'])) ? $_POST['username'] : '';
            $password = (isset($_POST['password'])) ? $_POST['password'] : '';
            $req = $app->validateLogin($username, $password);
			if ($req == FALSE) {
                $_SESSION['error'] = "Invalid User Credentials";
               header('Location: login.php');
            }
            break;
        
        case 'logout':
            $app->logout();
            header('Location: login.php');
            break;
        
        case 'createpost':
            $post = array();
            $post['category'] = (isset($_POST['category'])) ? $_POST['category'] : false;
            $post['title'] = (isset($_POST['article-title'])) ? $_POST['article-title'] : false;
            $post['url'] = (isset($_POST['article-url'])) ? $_POST['article-url'] : false;
            $post['content'] = (isset($_POST['article-content'])) ? $_POST['article-content'] : false;
            $post['tags'] = (isset($_POST['article-tags'])) ? $_POST['article-tags'] : false;
            $post['reference'] = (isset($_POST['reference-url'])) ? $_POST['reference-url'] : false;
            $post['image'] = (isset($_FILES["article-image"])) ? $_FILES["article-image"] : false;
            $app->createCustomPost($post);
            break;
			
    }
} else {
    header('Location: login.php');
}