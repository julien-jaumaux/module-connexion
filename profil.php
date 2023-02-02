<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "moduleconnexion");
if ($mysqli -> connect_errno){
    echo "failed to connect to my MySQL" .$mysqli -> connect_error; 
    exit();
}

$requete = $mysqli->query("SELECT * FROM utilisateurs");

if(isset($_POST['submit'])){

    if($_POST['confirm_password'] != $_SESSION['password']){
        echo "Mot de passe non identique";
    }

    elseif(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['password'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];

    $request = $mysqli->query("UPDATE utilisateurs SET nom = '$nom', prenom = '$prenom', login = '$login', password = '$password' WHERE id = '$id'");
    }
    header('Location: ./profil.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page profil</title>
</head>
<body>
<nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="./logout.php">Se déconnecter</a></li>
        </ul>
    </nav>
    <div id="container">
    <!-- zone de connexion -->
    
    <form action="" method="POST">
    <h1>Modifier vos informations</h1>
    
    <label><b>Modifier nom</b></label>
    <input type="text" name="nom" value=<?php echo $_SESSION['nom'];?>  required>
    <label><b>Modifier prénom</b></label>
    <input type="text" name="prenom" value=<?php echo $_SESSION['prenom'];?> required>
    <label><b>Modifier login</b></label>
    <input type="text" name="login" value=<?php echo $_SESSION['login'];?> required>
    <label><b>Modifier mot de passe</b></label>
    <input type="password" name="password" value=<?php echo $_SESSION['password'];?> required>
    <label for="confirm_password"><b>Confirmer le Password</b></label>
    <input type="password" name="confirm_password" class="form-control form-control-lg" id="confirm_password">
    <input type="submit" id='submit' value="MODIFIER" name="submit" >
    </form>
    </div>

</body>
</html>