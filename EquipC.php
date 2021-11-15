<?php
	include '../config.php';
	include_once '../Model/Equip.php';
	class EquipC {
		function afficherequip(){
			$sql="SELECT * FROM equipementmed";
			$db = config::getConnexion();
			try{
				$catalog = $db->query($sql);
				return $catalog;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerequip($Ref){
			$sql="DELETE FROM equipementmed WHERE Ref=:Ref";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Ref', $Ref);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterequip($equip){
			$sql="INSERT INTO equipementmed (Ref, Nom du produit,Description, Quantité, Prix) 
			VALUES (:Ref,:Nom du produit,:Description,:Quantité,:Prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Ref' => $equip->getRef(),
					'Nom du produit' => $equip->getNom(),
					'Description' => $equip->getDesc(),
					'Quantité' => $equip->getQt(),
                    'Prix' => $equip->getPrix(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		// function recupereradherent($NumAdherent){
		// 	$sql="SELECT * from adherent where NumAdherent=$NumAdherent";
		// 	$db = config::getConnexion();
		// 	try{
		// 		$query=$db->prepare($sql);
		// 		$query->execute();

		// 		$adherent=$query->fetch();
		// 		return $adherent;
		// 	}
		// 	catch (Exception $e){
		// 		die('Erreur: '.$e->getMessage());
		// 	}
		// }
		
		function modifierequip($equip, $refEquip){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE equip SET 
						Nom du produit= :Nom du produit, 
						Description= :Description, 
						Quantité= :Quantité, 
						Prix= :Prix,
					WHERE Reference= :Reference'
				);
				$query->execute([
					'Nom du produit' => $equip->getNom(),
					'Description' => $equip->getDesc(),
					'Quantite' => $equip->getQt(),
					'Prix' => $equip->getPrix(),
					'Reference' => $refEquip
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>