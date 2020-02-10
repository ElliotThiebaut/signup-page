<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
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
                if ($_GET['e'] == 'missing_info') {
                    echo '<div class="uk-animation-fade uk-alert-danger overlay uk-margin-small-top uk-position-top-center" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Il faut remplir tout les champs du formulaire ! </p>
                </div>';
                }
            }


            ?>
            <div class="uk-container uk-container-large uk-flex uk-flex-middle uk-height-1-1">
                <div class="uk-card uk-card-default uk-card-body uk-width-1-3 card">
                    <h2 class="secondaryTitle uk-margin-remove-bottom">Bienvenu chez</h2>
                    <h1 class="title uk-margin-remove-top">Space.io</h1>

                    <form class="uk-form-stacked uk-margin-medium-top" action="signup_post.php" method="POST">
                        <div class="uk-margin">
                            <label class="form-label" for="form-stacked-text">Nom</label>
                            <div class="uk-form-controls">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="text" name="name">
                            </div>
                            <?php
                            if (isset($_GET['e'])) {
                                if ($_GET['e'] == 'name') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Il faut renseigner un nom ! </p>
                </div>';
                                }
                            }
                            ?>
                        </div>
                        <div class="uk-margin">
                            <label class="form-label" for="form-stacked-text">Email</label>
                            <div class="uk-form-controls">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="email" name="email">
                            </div>
                            <?php
                            if (isset($_GET['e'])) {
                                if ($_GET['e'] == 'email') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Il faut renseigner un email valide ! </p>
                </div>';
                                }

                                if ($_GET['e'] == 'user_exist') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Cet email est deja utilisé ! </p>
                </div>';
                                }
                            }
                            ?>
                        </div>

                        <div class="uk-margin">
                            <label class="form-label" for="form-stacked-text">Mot de passe</label>
                            <div class="uk-form-controls">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="password" name="password">
                            </div>
                            <?php
                            if (isset($_GET['e'])) {
                                if ($_GET['e'] == 'bad_password') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Il faut au moins 8 caractères, une majuscule, un symbole et un chiffre ! </p>
                </div>';
                                }
                            }
                            ?>
                        </div>
                        <div class="uk-margin">
                            <label class="form-label" for="form-stacked-text">Confirmez le mot de passe</label>
                            <div class="uk-form-controls">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="password" name="confirm_password">
                            </div>
                            <?php
                            if (isset($_GET['e'])) {
                                if ($_GET['e'] == 'match_password') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Les mots de passes ne correspondent pas ! </p>
                </div>';
                                }
                            }
                            ?>
                        </div>

                        <div class="uk-margin-medium-top">
                            <input type="submit" class="btn-submit uk-border-pill" value="S'inscrire">
                        </div>
                    </form>
                    <div class="uk-margin-medium-top uk-flex">
                        <p class="signup_text">Vous possédez déjà un compte ?</p>
                        <a class="signup_link" href="index.php">Connectez vous</a>
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