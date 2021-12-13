<?php 
include '../configuration.php';
?>

<script language="Javascript"
    src="<?php echo $base_url;?>count.php?page=<?php echo $_REQUEST['section'];?>">
</script>
<?php
echo "<br>";                

echo '<img src="'.$base_url.'graph.php?page='.$_REQUEST['section'].'" />';      

?>