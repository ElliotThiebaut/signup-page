<?php

// connect to DB
include 'db_connexion.php';


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

} else {
    header('Location: signup.php?e=missing_form');
    exit;
}


// Check if data is correct (email is an email, password is correct, confirm_password = password)

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (preg_match("#[a-z]|[0-9]#", $name)) {
        // Password of 8 characters with at least one upercase one number and one special character
        if (preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,254}$/", $password)) {
            if ($password == $confirm_password) {
                // Haching password

                $hash_password = password_hash($password, PASSWORD_DEFAULT);

                // Upload data
                $reponse = $bdd -> query('SELECT email FROM users');
                $user_exists = false;

                while ($donnees = $reponse->fetch()) {
                    //Check if user already exists
                    if ($email == $donnees['email']) {
                        $user_exists = true;
                    }         
                }

                $reponse->closeCursor();

                if ($user_exists) {
                    header('Location: signup.php?e=user_exist');
                } else {
                    //Create new user
                    $req = $bdd->prepare('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)');

                    $req->execute(array(
                        'name' => $name,
                        'email' => $email,
                        'password' => $hash_password
                    ));
                    
                    $user_created = true;

                }

            } else {
                header('Location: signup.php?e=match_password');
                exit;
            }
        } else {
            header('Location: signup.php?e=bad_password');
            exit;
        }
    } else {
        header('Location: signup.php?e=name');
        exit;
    }
} else {
    header('Location: signup.php?e=email');
    exit;
}



// Go to next page
if ($user_created == true) {
    header('Location: index.php?e=sucess');
}
