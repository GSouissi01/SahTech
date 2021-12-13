<?php
	include_once '../config.php';
	include_once '../Model/Equip.php';
	class EquipC {
		function afficherequip(){
			$sql="SELECT * FROM equipementmed";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerequip($ref){
			$sql="DELETE FROM equipementmed WHERE ref=:ref";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':ref', $ref,PDO::PARAM_STR);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		// function ajouterequip($equipementmed){
		// 	$sql="INSERT INTO equipementmed (ref, nom,dsc, quantite, prix, img, id_catalogue) 
		// 	VALUES (:ref,:nom, :dsc, :quantite, :prix, :img, :id_catalogue)";
		// 	$db = config::getConnexion();
		// 	try{
		// 		$query = $db->prepare($sql);
		// 		$query->execute([
		// 			'ref' => $equipementmed->getRef(),
		// 			'nom' => $equipementmed->getNom(),
		// 			'dsc' => $equipementmed->getDesc(),
		// 			'quantite' => $equipementmed->getQt(),
        //             'prix' => $equipementmed->getPrix(),
		// 			'img' =>$equipementmed->getImage(),
		// 			'id_catalogue' =>$equipementmed->getCateg()
		// 		]);			
		// 	}
		// 	catch (Exception $e){
		// 		echo 'Erreur: '.$e->getMessage();
		// 	}			
		// }
		function ajouterequip($equipementmed)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					'INSERT INTO equipementmed (ref,nom , dsc, quantite , prix ,img, id_catalogue )
					 VALUES (:ref, :nom ,:dsc, :quantite , :prix ,:img,:id_catalogue )
					');
					//INSERT
					$query->bindValue('ref', $equipementmed->getRef());
					$query->bindValue('nom' , $equipementmed->getNom());
					$query->bindValue('dsc' , $equipementmed->getDesc());
					$query->bindValue('quantite' ,$equipementmed->getQt());
					$query->bindValue('prix' ,$equipementmed->getPrix());
					$query->bindValue('img' ,$equipementmed->getImage());
					$query->bindValue('id_catalogue' ,$equipementmed->getCateg());
					//$query->bindValue('date' ,$a->getDate());
					$query->execute();
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		function recupererequip($ref){
			$sql="SELECT * from equipementmed WHERE ref=$ref";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$equip=$query->fetch();
				return $equip;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierequip($equipc,$ref)
		{
			$db = config::getConnexion();
			try
			{	
				$query = $db->prepare(
					//PREPARE
					' UPDATE equipementmed SET
						nom= :nom, 
						dsc= :dsc, 
						quantite= :quantite, 
						prix= :prix,
						img= :img,
						id_catalogue= :id_catalogue
						WHERE ref=:ref'
				);
					//INSERT
					$query->execute([
						'nom' => $equipc->getNom(),
						'dsc' => $equipc->getDesc(),
						'quantite' => $equipc->getQt(),
						'prix' => $equipc->getPrix(),
						'img'=> $equipc->getImage(),
						'id_catalogue' =>$equipc->getCateg(),
						'ref' => $ref
					]);
					echo $query->rowCount() . " records UPDATED successfully <br>";
				} catch (PDOException $e)
			{die($e ->getMessage()); }
		}
		
		// function modifierequip($equipc, $ref){
		// 	try {
		// 		$db = config::getConnexion();
		// 		$query = $db->prepare(
		// 			'UPDATE equipementmed SET 
		// 				nom= :nom, 
		// 				dsc= :dsc, 
		// 				quantite= :quantite, 
		// 				prix= :prix,
		// 				img= :img,
		// 				id_categorie= :id_categorie
		// 			WHERE ref= :ref'
		// 		);
				// $query->execute([
				// 	'nom' => $equipc->getNom(),
				// 	'dsc' => $equipc->getDesc(),
				// 	'quantite' => $equipc->getQt(),
				// 	'prix' => $equipc->getPrix(),
				// 	'img'=> $equipc->getImage(),
				// 	'id_catalogue' =>$equipc->getCateg(),
				// 	'ref' => $ref
				// ]);
				// echo $query->rowCount() . " records UPDATED successfully <br>";
		// 	} catch (PDOException $e) {
		// 		$e->getMessage();
		// 	}
		// }
		// public function uploadImg(){
		// 	$target_dir = "../uploads/";
		// 	$random = rand(0,9999);
		// 	$target_file = $target_dir . $random . basename($_FILES["fileToUpload"]["name"]);
		// 	$uploadOk = 1;
		// 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		// 	// Check if image file is a actual image or fake image
		// 	if(isset($_FILES["fileToUpload"])) {
		// 	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		// 	  if($check !== false) {
		// 		$uploadOk = 1;
		// 	  } else {
		// 		$uploadOk = 0;
		// 	  }
		// 	}
	
		// 	// Check if file already exists
		// 	if (file_exists($target_file)) {
		// 	  $uploadOk = 0;
		// 	}
	
		// 	// Check file size
		// 	if ($_FILES["fileToUpload"]["size"] > 500000) {
		// 	  $uploadOk = 0;
		// 	}
	
		// 	// Allow certain file formats
		// 	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		// 	&& $imageFileType != "gif" ) {
		// 	  $uploadOk = 0;
		// 	}
		// 	// Check if $uploadOk is set to 0 by an error
		// 	if ($uploadOk == 0) {
		// 	// if everything is ok, try to upload file
		// 	} else {
		// 		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
		// 			return $target_file;
		// 		}
		// 	}
		// 	return "erreur";
		// }
		function approvisequip($equip, $quantite){
			try{
				$db = config::getConnexion(); 
				$query = $db->prepare(
					'SELECT quantite from equipementmed'
				);
				$query->execute(); 
				$equip=$query->fetch(); 
			}
			catch (PDOException $e){
				$e->getMessage(); 
			}
		}
		function exportequip(){
			try{
				$db = config::getConnexion(); 
				$query = $db->query("SELECT * FROM equipementmed ORDER BY ref ASC"); 
	
				if($query->num_rows > 0){ 
				$delimiter = ","; 
				$filename = "equipment-data_" . date('Y-m-d') . ".csv"; 
		
				// Create a file pointer 
				$f = fopen('php://equipment', 'w'); 
		
				// Set column headers 
				$fields = array('REFERENCE', 'NOM', 'DESCRIPTION', 'QUANTITE', 'PRIX'); 
				fputcsv($f, $fields, $delimiter); 
		
				// Output each row of the data, format line as csv and write to file pointer 
				while($row = $query->fetch_assoc()){ 
					$lineData = array($row['ref'], $row['nom'], $row['dsc'], $row['quantite'], $row['prix']); 
					fputcsv($f, $lineData, $delimiter); 
				} 
		
				// Move back to beginning of file 
					fseek($f, 0); 
		
				// Set headers to download file rather than displayed 
				header('Content-Type: text/csv'); 
				header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
				//output all remaining data on a file pointer 
				fpassthru($f); 
				} 
			}
			catch (PDOException $e){
				$e->getMessage(); 
			}
		}
		function exportpdf(){
			include('config.php');
			$database = new config();
			$result = $database->runQuery("SELECT ref, nom, dsc, quantite, prix FROM equipementmed");
			$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
			FROM `INFORMATION_SCHEMA`.`COLUMNS` 
			WHERE `TABLE_SCHEMA`='crud' 
			AND `TABLE_NAME`='equipementmed'
			and `COLUMN_NAME` in ('ref','nom','dsc','quantite','prix')");

			require('fpdf/fpdf.php');
			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);

			foreach($header as $heading) {
				foreach($heading as $column_heading)
					$pdf->Cell(95,12,$column_heading,1);
			}
			foreach($result as $row) {
				$pdf->Ln();
				foreach($row as $column)
					$pdf->Cell(95,12,$column,1);
			}
			$pdf->Output();
		}
		function rechercherListeProduit($nom){
			$sql="SELECT * from equipementmed where nom=$nom";
			$db = config::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}/**/
	}
		
?>