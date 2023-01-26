<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "moduleconnexion");
if ($mysqli -> connect_errno){
    echo "failed to connect to my MySQL" .$mysqli -> connect_error; 
    exit();
}
if(isset($_POST['submit'])){
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['password'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $request = $mysqli->query("INSERT INTO utilisateurs(nom,prenom,login,password) VALUES('$nom', '$prenom', '$login', '$password')");
    }
    header('location: connexion.php');
   
}

    


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="connexion.php">Se connecter</a></li>
            <li><a href="inscription.php">Créer un compte</a></li>     
        </ul>
    </nav>
    <div id="container">
    <!-- zone de connexion -->
    
    <form action="" method="POST">
    <h1>Créer votre compte</h1>
    
    <label><b>Nom</b></label>
    <input type="text" placeholder="Entrer le nom" name="nom" required>
    <label><b>Prénom</b></label>
    <input type="text" placeholder="Entrer le prenom" name="prenom" required>
    <label><b>Login</b></label>
    <input type="text" placeholder="Entrer le login" name="login" required>
    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
    <label for="confirm_password"><b>Confirmer le Password</b></label>
    <input type="password" name="confirm_password" class="form-control form-control-lg" id="confirm_password">
    <input type="submit" id='submit' value="S'INSCRIRE" name="submit" >

    </form>
    </div>

<?php
session_destroy();
?>
</body>
</html>