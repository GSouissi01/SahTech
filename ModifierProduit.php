<?php
    require_once '../Model/Equip.php';
    require_once '../Controller/EquipC.php';
    // ini_set('display_errors',1);
    // error_reporting(E_ALL);
    //$error = "";

    // create adherent
    $equip = null;

    // create an instance of the controller
    $equipC = new EquipC();
    if (
        isset($_POST['ref']) &&
		isset($_POST['nom']) &&		
        isset($_POST['dsc']) &&
		isset($_POST['quantite']) && 
        isset($_POST['prix']) &&
        isset($_POST['img'])&&
        isset($_POST['id_catalogue'])
    ) {
        if (
            !empty($_POST['ref']) && 
			!empty($_POST['nom']) &&
            !empty($_POST['dsc']) && 
			!empty($_POST['quantite']) &&  
            !empty($_POST['prix'])&&
            !empty($_POST['img'])&&
            !empty($_POST['id_catalogue'])
        ) {
            $equip = new Equip(
                $_POST['ref'],
				$_POST['nom'],
                $_POST['dsc'], 
				$_POST['quantite'],
                $_POST['prix'],
                $_POST['img'],
                $_POST['id_catalogue']
            );
            print_r($equip);
            $equipC->modifierequip($equip, $_POST['ref']);
            header("Location:./AfficherProduit.php");
        }
        // else
        //     $error = "!!!";
    } 
   
    //echo gettype($equip['nom']);
   
?>
    
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Front</title>
</head>
    <body>
        <button><a href="AfficherProduit.php">Retour à la liste des produits</a></button>
        <!-- <hr> -->
        <!-- <div id="error">
        </div> -->
		<?php
			if (isset($_POST['ref'])){
				$equip = $equipC->recupererequip($_POST['ref']);		
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ref">Référence:
                        </label>
                    </td>
                    <td><input type="number" name="ref" id="ref" value="<?php echo $equip['ref']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom du produit:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $equip['nom']; ?>" maxlength="60"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dsc">Description:
                        </label>
                    </td>
                    <td><input type="text" name="dsc" id="dsc" value="<?php echo $equip['dsc']; ?>" maxlength="60"></td>
                </tr>
                <tr>
                    <td>
                        <label for="quantite">Quantite:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="quantite" min=0 value="<?php echo $equip['quantite']; ?>" id="quantite">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">Prix:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="prix" id="prix" min=0 value="<?php echo $equip['prix']; ?>">
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label for="img">Image:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="img" id="img" value="<?php echo $equip['img']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="id_catalogue">ID Catalogue:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="id_catalogue" id="id_catalogue" value="<?php echo $equip['id_catalogue']; ?>">
                    </td>
                </tr>                         
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
            }
		?>
    </body>
</html>