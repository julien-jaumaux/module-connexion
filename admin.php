<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "moduleconnexion");
if ($mysqli -> connect_errno){
    echo "failed to connect to my MySQL" .$mysqli -> connect_error; 
    exit();
}
   $request = $mysqli->query("SELECT * FROM `utilisateurs` ");
    $results = $request->fetch_array(MYSQLI_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page admin</title>
</head>
<body>
<nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="./logout.php">Se déconnecter</a></li>    
        </ul>
    </nav>
    <br>
    <div class = "tableau">
    <?php
        echo "<table border='5' solid green ><tr>";
    
    
        foreach ($results as $key => $value)
            {
            echo " <th> " . $key . " </th> ";
            }
            echo "</tr>";
            while ($results != NULL)
            {
            echo "<tr>";
            foreach ($results as $value)
            {
                    echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
            $results = $request -> fetch_array(MYSQLI_ASSOC);
        }
        echo "</table>";
    ?>

</body>
</html>