<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/uikit.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body>

    <header>

    </header>

    <main>
        <div class="background">
            <?php

            if (isset($_GET['e'])) {
                if ($_GET['e'] == 'missing_form') {
                    echo '<div class="uk-animation-fade uk-alert-danger overlay uk-margin-small-top uk-position-top-center" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>Une erreur est survenu lors de l\'envoie du formulaire ! </p>
    </div>';
                }
                if ($_GET['e'] == 'sucess') {
                    echo '<div class="uk-animation-fade uk-alert-success overlay uk-margin-small-top uk-position-top-center" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>Votre inscription à réussi !</p>
    </div>';
                }
            }

            ?>


            <div class="uk-container uk-container-large uk-flex uk-flex-middle uk-height-1-1">
                <div class="uk-card uk-card-default uk-card-body uk-width-1-3 card">
                    <h2 class="secondaryTitle uk-margin-remove-bottom">Welcome to</h2>
                    <h1 class="title uk-margin-remove-top">Space.io</h1>

                    <form class="uk-form-stacked uk-margin-medium-top" action="signin_post.php" method="POST">
                        <div class="uk-margin">
                            <label class="form-label" for="form-stacked-text">Email</label>
                            <div class="uk-form-controls">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="email" name="email">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="form-label" for="form-stacked-text">Password</label>
                            <div class="uk-form-controls">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="password" name="password">
                            </div>
                            <?php
                            if (isset($_GET['e'])) {
                                if ($_GET['e'] == 'invalid_creds') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>L\'email ou le mot de passe est incorrect </p>
                </div>';
                                }
                            }
                            ?>
                        </div>

                        <div class="uk-margin-large-top">
                            <input type="submit" class="btn-submit uk-border-pill" value="Login">
                        </div>
                    </form>
                    <div class="uk-margin-medium-top uk-flex">
                        <p class="signup_text">Don't have an account ?</p>
                        <a class="signup_link" href="signup.php">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>

    </footer>





    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/uikit-icons.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>