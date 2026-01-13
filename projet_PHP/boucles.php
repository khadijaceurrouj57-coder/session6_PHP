<!-- Étape 1 : Boucle for -->
<?php
for ($i = 1; $i <= 10; $i++) {
    echo "Nombre : $i <br>";
}

// Étape 2 : Boucle while
$j = 1;
while ($j <= 5) {
    echo "Itération : $j <br>";
    $j++;
}

// Étape 3 : Boucle foreach
$animaux = ["Chat", "Chien", "Lapin"];
foreach ($animaux as $animal) {
    echo "Animal : $animal <br>";
}

// Étape 4 : Utiliser break et continue
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) continue; // saute le 5
    if ($i == 8) break;    // arrête à 8
    echo "Valeur : $i <br>";
}