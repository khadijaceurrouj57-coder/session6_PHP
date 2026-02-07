<?php
$resultat = "";
$message_erreur = "";
$operation_nom = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST['nombre1'];
    $n2 = $_POST['nombre2'];
    $op = $_POST['operation'];

    // Validation des données
    if (!is_numeric($n1) || !is_numeric($n2)) {
        $message_erreur = "Erreur : Veuillez saisir des nombres valides.";
    } elseif ($op == "/" && $n2 == 0) {
        $message_erreur = "Erreur : Division par zéro impossible.";
    } else {
        // Traitement via une fonction
        $resultat = calculer($n1, $n2, $op);
        $noms = ['+' => 'Addition', '-' => 'Soustraction', '*' => 'Multiplication', '/' => 'Division'];
        $operation_nom = $noms[$op];
    }
}

function calculer($a, $b, $op) {
    switch ($op) {
        case '+': return $a + $b;
        case '-': return $a - $b;
        case '*': return $a * $b;
        case '/': return $a / $b;
    }
}
?>

<form method="post">
    <input type="number" step="any" name="nombre1" placeholder="Nombre 1" required>
    
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value=""></option>
        <option value="/">/</option>
    </select>
    
    <input type="number" step="any" name="nombre2" placeholder="Nombre 2" required>
    <button type="submit">Calculer</button>
    
    <br><br>
    <label>Résultat (<?php echo $operation_nom; ?>) :</label>
    <input type="text" value="<?php echo $resultat; ?>" readonly>
    
    <p style="color:red;"><?php echo $message_erreur; ?></p>
</form>
