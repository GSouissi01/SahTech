<?php

require_once "reclamC.php";
require_once "../Model/reclam.php";

$reclam = new reclam("houssem", "en attent", 1, "please");

$reclamC = new reclamC();

var_dump($reclamC->nbr_enatte());