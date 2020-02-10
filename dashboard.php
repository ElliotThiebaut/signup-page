<?php
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
    header('Location: index.php?e=no_login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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

                if ($_GET['e'] == 'password_updated') {
                    echo '<div class="uk-animation-fade uk-alert-success overlay uk-margin-small-top uk-position-top-center" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>Le mot de passe à bien été mise à jour !</p>
    </div>';
                }

                if ($_GET['e'] == 'name_updated') {
                    echo '<div class="uk-animation-fade uk-alert-success overlay uk-margin-small-top uk-position-top-center" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>Le nom à bien été mise à jour !</p>
    </div>';
                }

                if ($_GET['e'] == 'email_updated') {
                    echo '<div class="uk-animation-fade uk-alert-success overlay uk-margin-small-top uk-position-top-center" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>L\'email à bien été mise à jour !</p>
    </div>';
                }
            }

            ?>


            <div class="uk-container uk-container-large uk-flex uk-flex-middle uk-height-1-1">
                <div class="uk-card uk-card-default uk-card-body uk-width-1-1 card-dashboard">
                    <div class="uk-flex uk-flex-between">
                        <h2 class="secondaryTitle uk-width-1-2">Bonjour<span class="title uk-margin-small-left"><?php echo $_SESSION['user_name'] ?></span>,</h2>
                        <a class="btn-logout uk-border-pill uk-text-center uk-width-1-6" href="logout.php">Deconnexion</a>
                    </div>
                    <div class="uk-margin-large-top">
                        <form class="uk-form-stacked" action="update.php?u=name" method="post">
                            <label class="form-label" for="form-stacked-text">Nom</label>
                            <div class="uk-form-controls uk-flex">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="text" name="name" placeholder="<?php echo $_SESSION['user_name'] ?>">
                                <input class="btn-submit uk-border-pill uk-margin-large-left" type="submit" value="Modifier">
                            </div>
                            <?php
                            if (isset($_GET['e'])) {
                                if ($_GET['e'] == 'bad_name') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Il faut renseigner un nom ! </p>
                </div>';
                                }
                            }
                            ?>
                        </form>

                        <form class="uk-form-stacked uk-margin-small-top" action="update.php?u=email" method="post">
                            <label class="form-label" for="form-stacked-text">Email</label>
                            <div class="uk-form-controls uk-flex">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="email" name="email" placeholder="<?php echo $_SESSION['user_email'] ?>">
                                <input class="btn-submit uk-border-pill uk-margin-large-left" type="submit" value="Modifier">
                            </div>
                            <?php
                            if (isset($_GET['e'])) {
                                if ($_GET['e'] == 'user_exists') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Cette adresse mail est deja utilisé !</p>
                </div>';
                                }

                                if ($_GET['e'] == 'bad_email') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Il faut renseigner une vrai adresse email !</p>
                </div>';
                                }
                            }
                            ?>
                        </form>

                        <form class="uk-form-stacked uk-margin-medium-top" action="update.php?u=password" method="post">
                            <label class="form-label" for="form-stacked-text">Mot de passe</label>
                            <div class="uk-form-controls uk-flex">
                                <input class="input uk-width-1-1 uk-margin-small-right" id="form-stacked-text" type="password" name="curent_password" placeholder="Ancien mot de passe">
                                <input class="input uk-width-1-1 uk-margin-small-left" id="form-stacked-text" type="password" name="new_password" placeholder="Nouveau mot de passe">
                                <input class="btn-submit uk-border-pill uk-margin-large-left" type="submit" value="Modifier">
                            </div>

                            <?php
                            if (isset($_GET['e'])) {
                                if ($_GET['e'] == 'wrong_password') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Le mot de passe renseigné n\'est pas le bon !</p>
                </div>';
                                }

                                if ($_GET['e'] == 'bad_password') {
                                    echo '<div class="uk-animation-fade uk-alert-danger uk-margin-small-top" uk-alert>
                    <p>Il faut au moins 8 caractères, une majuscule, un symbole et un chiffre !</p>
                </div>';
                                }
                            }
                            ?>
                        </form>
                    </div>


                    <div class="uk-margin-large-top">
                        <a class="btn-delete uk-border-pill uk-text-center uk-margin-medium-top" href="#modal-delete" uk-toggle>Suprimer le compte</a>


                        <div id="modal-delete" class="uk-flex-top" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                <p class="deleteText uk-text-center">Voulez vous vraiment supprimer ce compte ? Cette action est irreversible !</p>
                                <div class="uk-flex uk-flex-around uk-margin-medium-top">
                                    <a class="btn-delete uk-border-pill uk-text-center" href="update.php?u=delete">Supprimer le compte</a>
                                    <a class="btn-anulation uk-border-pill uk-text-center" href="">Annuler</a>
                                </div>

                            </div>
                        </div>
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