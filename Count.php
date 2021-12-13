<?php
include '../configuration.php';
/* Get page and log file names */
$page= input($_GET['page']) or die('ERROR: Missing page ID');    
$timestampInSeconds = $_SERVER['REQUEST_TIME']; 
$mySqlDateTime= date("Y-m-d H:i:s", $timestampInSeconds);
$sql = 'INSERT INTO '.$tableName.'(ref, nom, dsc, quantite, prix) 
VALUES (NULL, \''.$page.'\',\''.$mySqlDateTime.'\', \''.$_SERVER['REMOTE_ADDR'].'\');';
mysql_select_db($database, $con);
mysql_query($sql);

$query='SELECT COUNT( * ) total FROM  '.$tableName.' where section=\''.$page.'\'';
$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_NUM);
$count = $row[0];

$query='SELECT  count(distinct quantite) FROM '.$tableName.' where section=\''.$page.'\'';
$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_NUM);
$UniaquCount = $row[0];
mysql_close($con);

/* Get style and extension information */
$style      = input($_GET['style']) or $style = $default_style;
$style_dir  = 'styles/' . $style . '/';
$ext        = input($_GET['ext']) or $ext = $default_ext;

    $count = $count + 1;      
    if ($min_digits > 0) 
        $count = sprintf('%0'.$min_digits.'s',$count);
    
    /* Print out Javascript code and exit */
    echo 'document.write(\'&nbsp;&nbsp;&nbsp;Vists:&nbsp;\');';
    $len = strlen($count);

    for ($i=0;$i<$len;$i++)
        echo 'document.write(\'<img src="'.$base_url . $style_dir . substr(
           $count,$i,1) . '.' . $ext .'" border="0">\');';    

    echo 'document.write(\'<br>\');';
    echo 'document.write(\'Vistors:&nbsp;\');';
    $len = strlen($UniaquCount);    
    for ($i=0;$i<$len;$i++) 
        echo 'document.write(\'<img src="'.$base_url . $style_dir . substr(
            $UniaquCount,$i,1) . '.' . $ext .'" border="0">\');';    
   exit();
?>