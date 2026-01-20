<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice PHP</title>
</head>
<body>

<h2>🧮 Calculatrice PHP</h2>

<form method="post">
    <label>Nombre 1 :</label>
    <input type="text" name="nb1"><br><br>

    <label>Nombre 2 :</label>
    <input type="text" name="nb2"><br><br>

    <label>Opération :</label>
    <select name="operation">
        <option value="">-- Choisir --</option>
        <option value="+">Addition (+)</option>
        <option value="-">Soustraction (-)</option>
        <option value="*">Multiplication (*)</option>
        <option value="/">Division (/)</option>
    </select><br><br>

    <input type="submit" name="calculer" value="Calculer">
</form>

<hr>

<?php
// 🔹 Fonction de calcul
function calculer($a, $b, $op) {
    switch ($op) {
        case '+': return $a + $b;
        case '-': return $a - $b;
        case '*': return $a * $b;
        case '/': return $a / $b;
        default: return null;
    }
}

// 🔹 Traitement du formulaire
if (isset($_POST['calculer'])) {

    $nb1 = $_POST['nb1'];
    $nb2 = $_POST['nb2'];
    $operation = $_POST['operation'];

    // ✅ Validation
    if (empty($nb1) || empty($nb2) || empty($operation)) {
        echo "<p style='color:red'>/p>";
    }
    elseif (!is_numeric($nb1) || !is_numeric($nb2)) {
        echo "<p style='color:red'></p>";
    }
    elseif ($operation == '/' && $nb2 == 0) {
        echo "<p style='color:red'></p>";
    }
    else {
        $resultat = calculer($nb1, $nb2, $operation);

        echo "<p style='color:green'>
               <strong>$operation</strong><br>
               <strong>$resultat</strong>
              </p>";
    }
}
?>

</body>
</html>
