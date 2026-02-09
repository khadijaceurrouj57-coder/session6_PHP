<!-- Étape 1 : -->
<?php
function saluer() {
    echo "Bonjour tout le monde ! <br>";
}
saluer();

// Étape 2 : 
function addition($a, $b) {
    return $a + $b;
}
echo "Somme : " . addition(5, 10)."<br>";

// Étape 3 :
function bienvenue($nom = "visiteur") {
    echo "Bienvenue " . $nom ."<br>";
}
bienvenue(); 

// Étape 4 : 
$compteur = 0;

function incrementer() {
    static $compteur = 0;
    $compteur++;
    echo" $compteur  <br>";
}
incrementer(); 
incrementer(); 