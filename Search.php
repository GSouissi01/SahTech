<?php
    include './Controller/Recherche.php';
?>
<!DOCTYPE html>
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
        $select_terme = $db->prepare("SELECT nom, dsc FROM equipementmed WHERE nom LIKE ? OR dsc LIKE ?");
        while($terme_trouve = $select_terme->fetch())
        {
            echo "<div><h2>".$terme_trouve['nom']."</h2><p> ".$terme_trouve['dsc']."</p>";
        }
        $select_terme->closeCursor();
?>
</form>
 </body>
</html>