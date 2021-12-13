<?php
    require_once '../Model/reclam.php';
    require_once '../Controller/reclamC.php';

    $error = "";

    // create adherent
    $reclam = null;

    // create an instance of the controller
    $reclamC = new reclamC();
    if (
        isset($_POST["identifiant"]) &&
		isset($_POST["nom et prenom"]) &&		
        isset($_POST["type de reclamation"]) &&
		isset($_POST["numero de commande "]) && 
        isset($_POST["date de reclamation"])&& 
        isset($_POST["texte de reclamation"])&& 
        isset($_POST["etat de reclamation"])
    ) {
    if (
            !empty($_POST["identifiant"]) && 
			!empty($_POST["nom et prenom"]) &&
            !empty($_POST["type de reclamation"]) && 
			!empty($_POST["date de reclamation"]) && 
            !empty($_POST["texte de reclamation"]) &&
            !empty($_POST["etat de reclamation"]) 
    ) {
            $reclam = new reclamC(
                $_POST['identifiant'],
				$_POST['nom et prenom'],
                $_POST['type de reclamation'], 
				$_POST['date de reclamation'],
                $_POST['texte de reclamation'],
                $_POST['etat de reclamation']
            );
            $reclamC->ajouterreclam($reclam);
            header('Location:AfficherReclam.php');
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
    <title>reclamation</title>
</head>
    <body>
        <button><a href="AfficherReclam.php">Retour à la liste des reclamations</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="identifiant">identifiant:
                        </label>
                    </td>
                    <td><input type="text" name="identifiant" id="identifiant" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Nom et prenom">Nom et prenom:
                        </label>
                    </td>
                    <td><input type="text" name="nometprenom" id="nometprenom" maxlength="20"></td>
                </tr>
                <tr>   
                    <td>
                        <label for="type de reclamation">type de reclamation:
                        </label>
                    </td>
                    <td><input type="text" name="type de reclamation" id="type de reclamation" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date de reclamation">date de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date de reclamation" id="date de reclamation">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="texte de reclamation">texte de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="texte de reclamation" id="texte de reclamation">
                    </td>
                </tr>
                <tr>
                <td>
                        <label for="etat de reclamation">etat de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="texte" name="etat de reclamation" id="etat de reclamation">
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