<?php
	include '../Controller/EquipC.php';
	$equipC=new EquipC();
	$listeProduit=$equipC->afficherequip(); 
?>
<html>
	<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
	    <button><a href="AjouterProduit.php">Ajouter un produit</a></button>
		<center><h1>Liste des produits</h1></center>
		<table border="1" align="center">
			<tr>
				<th>Référence</th>
				<th>Nom du produit</th>
				<th>Description</th>
				<th>Quantite</th>
				<th>Prix</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeProduit as $produit){
			?>
			<tr>
				<td><?php echo $produit['Ref']; ?></td>
				<td><?php echo $produit['Nom du produit']; ?></td>
				<td><?php echo $produit['Description']; ?></td>
				<td><?php echo $produit['Quantité']; ?></td>
				<td><?php echo $produit['Prix']; ?></td>
				<td>
					<form method="POST" action="ModifierProduit.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $produit['Ref']; ?> name="Ref">
					</form>
				</td>
				<td>
					<a href="SupprimerProduit.php?Ref=<?php echo $produit['Ref']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>