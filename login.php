<?php session_start(); ?>
<?php require_once("include/db.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>Florencia Wedding Designer</title>
    <!-- Stylesheets & Fonts -->
    <link href="css/plugins.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- INFO SESSION -->
        <div>
            <?php if (!empty($_SESSION['flash']['success'])) {
            ?>
                <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function() {
                            $(this).remove();
                        });
                    }, 6000);
                </script>

                <div role="alert" class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                    <?= $_SESSION['flash']['success'] ?>
                </div>
            <?php
            }
            unset($_SESSION['flash']['success']);

            if (!empty($_SESSION['flash']['error'])) {
            ?>
                <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function() {
                            $(this).remove();
                        });
                    }, 6000);
                </script>

                <div class="alert alert-danger solid alert-dismissible fade show">
                    <div style="padding:15px;">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <strong>Erreur!</strong> <?= $_SESSION['flash']['error'] ?>
                    </div>
                </div>
            <?php
            }
            unset($_SESSION['flash']['error']);
            ?>
        </div>
        <!-- END INFO SESSION -->
        <section class="pt-5 pb-5 lazy-bg bg-loaded" data-bg-image="images/pages/1.jpg" data-bg="images/pages/1.jpg" data-ll-status="loaded" style="background-image: url(&quot;images/pages/1.jpg&quot;);">
            <div class="container-fluid d-flex flex-column">
                <div class="row align-items-center min-vh-100">
                    <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                        <div class="card">
                            <div class="card-body py-5 px-sm-5">
                                <div class="mb-5 text-center">
                                    <h6 class="h3 mb-1">Login</h6>
                                    <p class="text-muted mb-0">Sign in to your account to continue.</p>
                                </div><span class="clearfix"></span>
                                <form class="form-validate" method="POST" action="functions/login.php">
                                    <div class="form-group">
                                        <label for="email">Adresse email</label>
                                        <div class="input-group">
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                    </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password">Mot de passe</label>
                                        <div class="input-group show-hide-password">
                                            <input class="form-control" name="password" placeholder="Enter password" type="password" required="">
                                            <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                        </div>
                                    </div>
                                    <div class="mt-4"><button type="submit" class="btn btn-primary btn-block btn-primary">Sign in</button></div>
                                </form>
                                <div class="mt-4 text-center"><small>Not registered?</small> <a href="page-user-register.html" class="small fw-bold">Create account</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php require_once 'include/footer.php'; ?>