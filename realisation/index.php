<?php
$filename = 'livre_d_or.txt';

// 1. Traitement de l'envoi du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nom']) && !empty($_POST['message'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $date = date('d/m/y H:i:s');
    $message = htmlspecialchars($_POST['message']);

    // Formatage de la ligne : <<Nom|Email|Date|Message>>
    $ligne = "<<$nom|$email|$date|$message>>\n";

    // Enregistrement à la fin du fichier
    file_put_contents($filename, $ligne, FILE_APPEND);
}

// 2. Lecture des messages
$messages_a_afficher = [];
if (file_exists($filename)) {
    $lignes = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    // On inverse le tableau pour avoir les derniers en haut
    $lignes_inversees = array_reverse($lignes);
    
    // On ne garde que les 5 premiers
    $messages_a_afficher = array_slice($lignes_inversees, 0, 5);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Livre d'Or</title>
</head>
<body>
    <h1>Livre d'Or</h1>

    <form method="post">
        <input type="text" name="nom" placeholder="Votre nom" required><br>
        <input type="email" name="email" placeholder="Votre email" required><br>
        <textarea name="message" placeholder="Votre message" required></textarea><br>
        <button type="submit">Envoyer</button>
    </form>

    <hr>

    <h2>Les 5 derniers avis</h2>
    <?php if (empty($messages_a_afficher)): ?>
        <p>Aucun message pour le moment.</p>
    <?php else: ?>
        <?php foreach ($messages_a_afficher as $msg): 
            // On retire les "<<" et ">>" et on sépare par le "|"
            $propre = trim($msg, "<>");
            $infos = explode('|', $propre);
        ?>
            <div style="border-bottom: 1px solid #ccc; margin-bottom: 10px;">
                <strong><?php echo $infos[0]; ?></strong> <em>(<?php echo $infos[2]; ?>)</em><br>
                <p><?php echo $infos[3]; ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>