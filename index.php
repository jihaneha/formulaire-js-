<?php
session_start();
// require 'profil.php';

if(!empty($_POST)){

$serveur = "localhost"; 
$dbname = "users"; 
$user = "root"; 
$pass = "";
// fonction pour filtrer les donnees 
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = strip_tags($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
// récupération des données 
$username= valid_donnees($_POST["username"]);
$mail = valid_donnees($_POST["email"]);
$password = valid_donnees($_POST["password"]);
$password2 = valid_donnees($_POST["password2"]);


//connexion a la base de données 

try{
    $connexion=new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $connexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connexion à la base de données réussie";
    $requete =$connexion->prepare("INSERT INTO users(nom,motdepasse,email)
                            VALUES (:nom,:motdepasse,:email)" 
                            );
    $requete->bindParam(':nom', $username);
    $requete->bindParam(':motdepasse', $password);
    $requete->bindParam(':email', $mail);
    $requete->execute();
    
}
catch(PDOException $e){
    echo "Echec de la connexion : ".$e->getMessage();
}
// verifier si l'adresse email existe 








}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"
    >
    <title>javascript formulaire</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Create Account</h2>
        </div>
        <form id="form" class="form" action="#" method="POST">
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" placeholder="jijiha" id="username" name="username">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" placeholder="jijiha@hotmail.com" name="email" id="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password</label>
                <input type="password" placeholder="Password" name="password" id="password"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password check</label>
                <input type="password" placeholder="Password2" name="password2" id="password2"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    
    
    <!-- SOCIAL PANEL HTML -->
    <div class="social-panel-container">
        <div class="social-panel">
            <p>Created with <i class="fa fa-heart"></i> by
                <a target="_blank" href="#">jiji</a></p>
            <button class="close-btn"><i class="fas fa-times"></i></button>
            <h4>Get in touch on</h4>
            <ul>
                <li>
                    <a href="#" target="_blank">
                        <i class="fab fa-discord"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://linkedin.com" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="https://facebook.com" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://instagram.com" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <button class="floating-btn">
        Get in Touch
    </button>

    
    <!-- <script src="script.js"></script> -->
    
</body>
</html>