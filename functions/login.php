<?php session_start(); ?>
<?php ob_start(); ?>

<?php require_once "../include/db.php"; ?>

<?php
        $email = $_POST['email'];
	    $password = $_POST['password'];

        if(!empty($_POST['password']) && !empty($_POST['email'])){

            $listUser = $pdo->query('SELECT * FROM user WHERE email ="'.$email.'" ');
            $user = $listUser->fetch(PDO::FETCH_ASSOC);
    
            if(!empty($user['email'])){
        
                $email = htmlspecialchars($_POST['email']);
                $id = $user['id'];
                $hash = $user['password'] ;
    
                if (password_verify($password , $hash)) {
            
                    $_SESSION['id'] = $id;
                    $_SESSION['access'] = "granted";

                    $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
                    header('Location: ../index.php');
                    ob_end_flush();

                }else{
                    $_SESSION['flash']['error'] = 'Mot de passe invalide !';
                    header('Location: ../index.php');
                    ob_end_flush();
                }

            }else{
                $_SESSION['flash']['error'] = 'Mot de passe ou E-mail invalide !';
                header('Location: ../index.php');
                ob_end_flush();
            }
        }