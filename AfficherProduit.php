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
	    <button><a href="AfficherProduit.php">Afficher un produit</a></button>
		<center><h1>Liste des produits</h1></center>
		<table border="1" align="center">
			<tr>
				<th>Référence</th>
				<th>Nom du produit</th>
				<th>Description</th>
				<th>Quantite</th>
				<th>Prix</th>
				<th>Image</th>
				<th>ID Catalogue</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeProduit as $produit){
			?>
			<tr>
				<td><?php echo $produit['ref']; ?></td>
				<td><?php echo $produit['nom']; ?></td>
				<td><?php echo $produit['dsc']; ?></td>
				<td><?php echo $produit['quantite']; ?></td>
				<td><?php echo $produit['prix']; ?></td>
				<td>
						<?php $img=$produit['img'];
						echo "<img src='$img'>"; ?>
						<style> img{width:90px;height:90px;}</style>
				</td>
				<td><?php echo $produit['id_catalogue']; ?></td>
				<td>
					<form method="POST" action="ModifierProduit.php">
						<input type="submit" name="Modifier" value="Modifier">
						<!-- <input type="" value="" name="ref"> -->
					</form>
				</td>
				<td>
					<a href="SupprimerProduit.php? ref=<?php echo $produit['ref']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>