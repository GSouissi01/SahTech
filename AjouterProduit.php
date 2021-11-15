<?php
    include_once '../Model/Equip.php';
    include_once '../Controller/EquipC.php';

    $error = "";

    // create adherent
    $equip = null;

    // create an instance of the controller
    $EquipC = new EquipC();
    if (
        isset($_POST["Ref"]) &&
		isset($_POST["Nom du produit"]) &&		
        isset($_POST["Description"]) &&
		isset($_POST["Quantité"]) && 
        isset($_POST["Prix"])
    ) {
    if (
            !empty($_POST["Ref"]) && 
			!empty($_POST["Nom du produit"]) &&
            !empty($_POST["Description"]) && 
			!empty($_POST["Quantité"]) && 
            !empty($_POST["Prix"]) 
    ) {
            $equip = new Equip(
                $_POST['Ref'],
				$_POST['Nom du produit'],
                $_POST['Description'], 
				$_POST['Quantité'],
                $_POST['Prix']
            );
            $EquipC->ajouterequip($equip);
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
    <link rel="stylesheet" href="assets/css/style.css">
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
                        <label for="Ref">Référence:
                        </label>
                    </td>
                    <td><input type="text" name="reference" id="reference" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Nom">Nom du produit:
                        </label>
                    </td>
                    <td><input type="text" name="nomduproduit" id="nomduproduit" maxlength="20"></td>
                </tr>
                <tr>   
                    <td>
                        <label for="Description">Description:
                        </label>
                    </td>
                    <td><input type="text" name="description" id="description" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Quantité">Quantite:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="quantite" id="quantite">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Prix">Prix:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="prix" id="prix">
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