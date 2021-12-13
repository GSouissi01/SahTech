<?php
include_once '../config.php';
include '../View/fpdf.php';
$db = config::getConnexion();

$pdf = new FPDF();
$pdf->AddPage();
 
$pdf->SetFont('Arial','B',12);	
$ret ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='database_name' AND `TABLE_NAME`='equipemented'";
$query1 = $db -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(39,12,$column_heading,1);
}}
//code for print data
$sql = "SELECT * from  equipementmed";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row) {
$pdf->SetFont('Arial','',7);	
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(39,7,$column,1);
} }
$pdf->Output();
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
        
        <!-- <div id="error">
            <?php echo $error; ?>
        </div> -->
    <div class="card-header">
        <form action="generatePDF.php" method="POST">
            <button type="submit" class="btn btn-success">PDF</buton>
        </form>
</div>
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