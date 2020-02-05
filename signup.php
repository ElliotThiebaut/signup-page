<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/uikit.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <header>

    </header>

    <main>
        <div class="background">
            <div class="uk-container uk-container-large uk-flex uk-flex-middle uk-height-1-1">
                <div class="uk-card uk-card-default uk-card-body uk-width-1-3 card">
                    <h2 class="secondaryTitle uk-margin-remove-bottom">Welcome to</h2>
                    <h1 class="title uk-margin-remove-top">Space.io</h1>

                    <form class="uk-form-stacked uk-margin-medium-top" action="signup_post.php" method="POST">
                        <div class="uk-margin">
                            <label class="form-label" for="form-stacked-text">Name</label>
                            <div class="uk-form-controls">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="text" name="name">
                            </div>
                        </div>
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
                        </div>
                        <div class="uk-margin">
                            <label class="form-label" for="form-stacked-text">Confirm password</label>
                            <div class="uk-form-controls">
                                <input class="input uk-width-1-1" id="form-stacked-text" type="password" name="confirm_password">
                            </div>
                        </div>

                        <div class="uk-margin-medium-top">
                            <input type="submit" class="btn-submit uk-border-pill" value="Sign up">
                        </div>
                    </form>
                    <div class="uk-margin-medium-top uk-flex">
                        <p class="signup_text">Already have an account ?</p>
                        <a class="signup_link" href="index.php">Sign in</a>
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