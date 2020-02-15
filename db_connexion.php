<?php


//DB Connexion

// 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=signup;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


?>