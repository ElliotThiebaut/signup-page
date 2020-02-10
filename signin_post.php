<?php
session_start();
//DB Connexion

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=signup;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
} else {
    header('Location: signup.php?e=missing_form');
    exit;
}

// Check user
$reponse = $bdd -> query('SELECT email, password, name, id FROM users');
$user_exists = false;

while ($donnees = $reponse->fetch()) {
    //Check if user already exists
    if ($email == $donnees['email'] && password_verify($password, $donnees['password'])) {
        $user_exists = true;
        $name = $donnees['name'];
        $id = $donnees['id'];
        $db_password = $donnees['password'];
    }      
}

$reponse->closeCursor();

if ($user_exists == true) {
    $_SESSION['loggedin'] = true;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_password'] = $db_password;
    $_SESSION['user_id'] = $id;
    header('Location: dashboard.php');
} else {
    header('Location: index.php?e=invalid_creds');
}























?>