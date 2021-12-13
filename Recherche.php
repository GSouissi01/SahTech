<?php
include_once '../config.php';
    // try
    // {
    //     $bdd = new PDO("mysql:host=localhost;dbname=bdr", "root", "");
    //     $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }
    // catch(Exception $e)
    // {
    //     die("Une érreur a été trouvé : " . $e->getMessage());
    // }
    // $bdd->query("SET NAMES UTF8");
    $db = config::getConnexion();
    if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher")
    {
        $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
        $terme = $_GET["terme"];
        $terme = trim($terme)   ; //pour supprimer les espaces dans la requête de l'internaute
        $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
        if (isset($terme))
        {
            $terme = strtolower($terme);
            $select_terme = $db->prepare("SELECT nom, dsc FROM equipementmed WHERE nom LIKE ? OR dsc LIKE ?");
            $select_terme->execute(array("%".$terme."%", "%".$terme."%"));
        }
        else
        {
            $message = "Vous devez entrer votre requete dans la barre de recherche";
        }
    }
?>
<!-- <!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8" >
  <title>Les résultats de recherche</title>
 </head>
 <body>
 <form action = "Recherche.php" method = "get">
   <input type = "search" name = "terme">
   <input type = "submit" name = "s" value = "Rechercher">
   <?php
//   $select_terme = $db->prepare("SELECT nom, dsc FROM equipementmed WHERE nom LIKE ? OR dsc LIKE ?");
// while($terme_trouve = $select_terme->fetch())
// {
//     echo "<div><h2>".$terme_trouve['nom']."</h2><p> ".$terme_trouve['dsc']."</p>";
// }
// $select_terme->closeCursor();
?>
</form>
 </body>
</html>
<!-- <!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8">
  <title>Barre de recherche</title>
 </head>
 <body>
  
 </body>
</html> --> -->