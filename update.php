<?php

// start session
session_start();

// connect to DB
include 'db_connexion.php';


// update the user data
if (isset($_GET['u']) && $_GET['u'] == 'name') {
    $name = htmlspecialchars($_POST['name']);

    if (preg_match("#[a-z]|[0-9]#", $name)) {
        $req = $bdd->prepare('UPDATE users SET name = :newname WHERE id = :id');
        $req->execute(array(
            'newname' => $name,
            'id' => $_SESSION['user_id']
        ));

        $_SESSION['user_name'] = $name;
        header('Location: dashboard.php?e=name_updated');
        exit;
    } else {
        header('Location: dashboard.php?e=bad_name');
        exit;
    }
    
}

if (isset($_GET['u']) && $_GET['u'] == 'email') {
    $email = htmlspecialchars($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $reponse = $bdd -> query('SELECT email FROM users');
        $user_exists = false;

        while ($donnees = $reponse->fetch()) {
            //Check if user already exists
            if ($email == $donnees['email']) {
                $user_exists = true;
            }         
        }
        $reponse->closeCursor();

        if ($user_exists == false) {
        
            $req = $bdd->prepare('UPDATE users SET email = :newemail WHERE id = :id');
            $req->execute(array(
                'newemail' => $email,
                'id' => $_SESSION['user_id']
            ));

            $_SESSION['user_email'] = $email;
            header('Location: dashboard.php?e=email_updated');
            exit;
        } else {
            header('Location: dashboard.php?e=user_exists');
        }
        
    } else {
        header('Location: dashboard.php?e=bad_email');
        exit;
    }
    
}

if (isset($_GET['u']) && $_GET['u'] == 'password') {
    $curent_password = htmlspecialchars($_POST['curent_password']);
    $new_password = htmlspecialchars($_POST['new_password']);

    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);

    if (preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,254}$/", $new_password)) {
        if (password_verify($curent_password, $_SESSION['user_password'])) {
            echo 'Test';
            $req = $bdd->prepare('UPDATE users SET password = :newpassword WHERE id = :id');
            $req->execute(array(
                'newpassword' => $hash_password,
                'id' => $_SESSION['user_id']
            ));

            $_SESSION['user_password'] = $hash_password;
            header('Location: dashboard.php?e=password_updated');
            exit;
        } else {
            header('Location: dashboard.php?e=wrong_password');
            exit;
        }
    } else {
        header('Location: dashboard.php?e=bad_password');
        exit;
    }
    
}

if (isset($_GET['u']) && $_GET['u'] == 'delete') {

    $req = $bdd->prepare('DELETE FROM users WHERE id = :id');
        $req->execute(array(
            'id' => $_SESSION['user_id']
        ));
    
    $_SESSION['loggedin'] = false;
    header('Location: index.php?e=account_deleted');
    exit;
}
