<?php session_start(); ?>
<?php require_once "../include/db.php"; ?>

<?php

    $category = $_POST['categorie'];
    $title = $_POST['titre'];
    $content = $_POST['contenu'];
    $created_at = date('Y-m-d H:i:s', time());

    $target_dir = "../images/articles/";
    $randomValue = rand(1, 1000000);
    $uploadOk = 1;
    $originalFilename = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
    $newFilename = $randomValue . '.' . $imageFileType;
    $target_file = $target_dir . $randomValue . '.' . $imageFileType;

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        if ($_FILES["image"]["size"] > 5000000) {
            echo '<div class="alert alert-danger" role="alert">Sorry, your file is too large.</div>';
            $uploadOk = 0;
        }
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_types)) {
            echo '<div class="alert alert-danger" role="alert">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo '<div class="alert alert-danger" role="alert">Sorry, your file was not uploaded.</div>';
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO articles (
                        category,
                        picture,
                        alt,
                        title,
                        content,
                        created_at
                        ) 
                        VALUES (
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?
                        )"; 
                        
                        $pdo->prepare($sql)->execute([
                        $category,
                        $newFilename,
                        $originalFilename,
                        $title,
                        $content,
                        $created_at
                        ]);
                    
                        $_SESSION['flash']['success'] = '<strong><i class="fa fa-check-circle"></i> Votre article a bien été créé !</strong> Bravo Margaux !';
                        print("<script language=\"javascript\" type=\"text/javascript\">window.location.replace(\"../create-article.php\");</script>");

            } else {
                $_SESSION['flash']['error'] = '<strong><i class="fa fa-check-circle"></i> Problème avec l\'envoi du fichier !</strong> Réessayez !';
                print("<script language=\"javascript\" type=\"text/javascript\">window.location.replace(\"../create-article.php?\");</script>");
            }
        }
    }
?>