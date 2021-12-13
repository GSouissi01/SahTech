<?php 
// Load the database configuration file 
include_once 'config.php'; 
 
// Fetch records from database 
    $db = config::getConnexion(); 
	$query = $db->query("SELECT * FROM equipementmed ORDER BY ref ASC"); 
	
	if($query->num_rows > 0){ 
	$delimiter = ","; 
	$filename = "equipment-data_" . date('Y-m-d') . ".csv"; 
		
				// Create a file pointer 
	$f = fopen('../equipment.csv', 'w'); 
		
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
exit; 
 
?>