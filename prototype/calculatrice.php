<?php
$resultat = "";
$message = "Veuillez saisir des valeurs.";
$operation_nom = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $op = $_POST['operation'];

    // Validation des données
    if (is_numeric($n1) && is_numeric($n2)) {
        if ($op == "/" && $n2 == 0) {
            $message = "Erreur : Division par zéro impossible !";
        } else {
            $res_calcul = calculer($n1, $n2, $op);
            $resultat = $res_calcul;
            
            // Déterminer le nom de l'opération
            $noms = ['+' => 'Addition', '-' => 'Soustraction', '*' => 'Multiplication', '/' => 'Division'];
            $operation_nom = $noms[$op];
            $message = "Résultat de l'opération : $operation_nom";
        }
    } else {
        $message = "Erreur : Veuillez entrer des nombres valides.";
    }
}

function calculer($a, $b, $op) {
    switch ($op) {
        case '+': return $a + $b;
        case '-': return $a - $b;
        case '*': return $a * $b;
        case '/': return $a / $b;
        default: return "Opération invalide";
    }
}
?>

<form method="post">
    <input type="number" name="n1" placeholder="Nombre 1" step="any" required>
    
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    
    <input type="number" name="n2" placeholder="Nombre 2" step="any" required>
    <button type="submit">Calculer</button>
    
    <br><br>
    <label>Résultat (<?php echo $operation_nom; ?>) :</label>
    <input type="text" value="<?php echo $resultat; ?>" readonly>
    <p><strong>Statut :</strong> <?php echo $message; ?></p>
</form>
