<?php
    include_once '../Model/Equip.php';
    include_once '../Controller/EquipC.php';
    include_once '../config.php';
?>
<!-- Export link -->
<div class="col-md-12 head">
    <div class="float-right">
        <a href="../export.php" class="btn btn-success" ><i class="dwn"></i> Export</a>
    </div>
</div>

<!-- Data list table -->
<!-- Bootstrap library -->
<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
<!-- Stylesheet file -->
<link rel="stylesheet" href="assets/css/style.css"> 
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <form action="export.php" method="">
        <tr>
            <th>#Ref</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Quantite</th>
            <th>Prix</th>
        </tr>
</form>
    </thead>
    <tbody>
   <?php 
    // Fetch records from database 
    $db = config::getConnexion();
    $sth = $db->query("SELECT * FROM equipementmed ORDER BY ref ASC"); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        while($Exp = $sth->fetch()){ 
    ?>
        <tr>
            <td><?php echo $Exp['ref']; ?></td>
            <td><?php echo $Exp['nom']; ?></td>
            <td><?php echo $Exp['dsc']; ?></td>
            <td><?php echo $Exp['quantite']; ?></td>
            <td><?php echo $Exp['prix']; ?></td>
        </tr>
    <?php
         } 
    ?>
        <!-- <tr><td colspan="7">No member(s) found...</td></tr> -->
    </tbody>
</table>