<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $ville = htmlspecialchars($_POST['ville']);
    $cp = htmlspecialchars($_POST['cp']);

    echo "<h2>Données client récupérées</h2>";
    echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>
            <tr><th>Champ</th><th>Valeur</th></tr>
            <tr><td>Nom</td><td>$nom</td></tr>
            <tr><td>Prénom</td><td>$prenom</td></tr>
            <tr><td>Adresse</td><td>$adresse</td></tr>
            <tr><td>Ville</td><td>$ville</td></tr>
            <tr><td>Code Postal</td><td>$cp</td></tr>
          </table>";
} else {
    echo "Accès direct interdit.";
}
?>
<br><a href="formulaire.html">Retour au formulaire</a>