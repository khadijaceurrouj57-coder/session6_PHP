<?php
$res = "";
$message_erreur = "";
$ope_nom = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $op = $_POST['operation'];

    // Validation des données
    if (!is_numeric($n1) || !is_numeric($n2)) {
        $message_erreur = "Veuillez saisir des nombres valides.";
    } else {
        $res = calculer($n1, $n2, $op);
    }
}

function calculer($a, $b, $operation) {
    global $ope_nom, $message_erreur;
    switch ($operation) {
        case '+': $ope_nom = "Addition"; return $a + $b;
        case '-': $ope_nom = "Soustraction"; return $a - $b;
        case '*': $ope_nom = "Multiplication"; return $a * $b;
        case '/': 
            if ($b == 0) {
                $message_erreur = "Erreur : Division par zéro impossible !";
                return "";
            }
            $ope_nom = "Division";
            return $a / $b;
        default: return "Opération invalide";
    }
}
?>

<form method="post">
    <input type="number" name="n1" placeholder="Nombre 1" required>
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="n2" placeholder="Nombre 2" required>
    <button type="submit">=</button>
    <br><br>
    Type d'opération : <input type="text" value="<?php echo $ope_nom; ?>" readonly><br>
    Résultat : <input type="text" value="<?php echo $res; ?>" readonly>
</form>

<?php if($message_erreur) echo "<p style='color:red;'>$message_erreur</p>"; ?>