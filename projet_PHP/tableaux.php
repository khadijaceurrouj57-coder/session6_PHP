<!-- etape 1 : -->
<?php
$animaux = ["Chat", "Chien", "Lapin"];
echo "Premier animal : " . $animaux[0] . "<br>";

// Étape 2 :
foreach ($animaux as $animal) {
    echo "Animal : $animal <br>";
}

// Étape 3 : 
$voiture = [
    "marque" => "Toyota",
    "modele" => "Corolla",
    "année" => 2020
];
echo "Modèle : " . $voiture["modele"] . "<br>";

// Étape 4 :
$fruits = ["Pomme", "Banane"];
array_push($fruits, "Mangue"); // Ajoute "Mangue"
unset($fruits[1]); // Supprime "Banane"

// Étape 5 : 
echo "Nombre de fruits : " . count($fruits);