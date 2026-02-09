<?php
// etape1
$age = 17;
if ($age >= 18) {
    echo "Vous êtes majeur.<br>";
} else {
    echo "Vous êtes mineur.<br>";
}


// etap2
$note = 14;
if ($note >= 16) {
    echo "Très bien <br> ";
} elseif ($note >= 10) {
    echo "Passable <br>";
} else {
    echo "Échec <br>";
}



// etap3
$jour = "Vendredi";
switch ($jour) {
    case "Lundi":
        echo "Début de semaine <br>";
        break;
    case "Vendredi":
        echo "Dernier jour avant le week-end <br>";
        break;
    default:
        echo "Jour normal <br>";
}