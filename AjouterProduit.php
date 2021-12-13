<?php
    include_once '../Model/Equip.php';
    include_once '../Controller/EquipC.php';

    $error = "";

    // create adherent
    $equip = null;

    // create an instance of the controller
    $equipC = new EquipC();
    if (
        isset($_POST["ref"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["dsc"]) &&
		isset($_POST["quantite"]) && 
        isset($_POST["prix"])&&
        isset($_POST["img"]) && 
        isset($_POST["id_catalogue"])
    ) {
    if (
            !empty($_POST["ref"]) && 
			!empty($_POST["nom"]) &&
            !empty($_POST["dsc"]) && 
			!empty($_POST["quantite"]) && 
            !empty($_POST["prix"]) &&
            !empty($_POST["img"]) && 
            !empty($_POST["id_catalogue"])
    ) {
            //$img = $this->uploadImg();
            $equip = new Equip(
                $_POST['ref'],
				$_POST['nom'],
                $_POST['dsc'], 
				$_POST['quantite'],
                $_POST['prix'],
                $_POST['img'],
                $_POST['id_catalogue']
            );
            $equipC->ajouterequip($equip);
            header('Location:AfficherProduit.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>Produits</title>
</head>
    <body>
        <button><a href="AfficherProduit.php">Retour à la liste des produits</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ref">Référence:
                        </label>
                    </td>
                    <td><input type="number" name="ref" id="ref" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom du produit:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="nom" id="nom" maxlength="20" ></td>
                </tr>
                <tr>   
                    <td>
                        <label for="dsc">Description:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="dsc" id="dsc" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="quantite">Quantité:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="quantite" id="quantite" min=0>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">Prix:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="prix" id="prix" min=0>
                    </td>
                </tr>
                <tr>
                    <td> 
                        <label for="img"> Image: 
                        </label>
                    </td>
                    <td>
                        <input type="text" name="img" id="img">
                    </td>
                </tr>
                <tr>
                    <td> 
                        <label for="id_catalogue"> ID Catalogue: 
                        </label>
                    </td>
                    <td>
                        <input type="number" name="id_catalogue" id="id_catalogue">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>