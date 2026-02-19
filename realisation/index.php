<?php
$filename = 'livre_d_or.txt';
$message_info = "";

// 1. Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['message'])) {
        $message_info = "⚠️ Tous les champs sont obligatoires !";
    } else {
        $nom = htmlspecialchars(trim($_POST['nom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $date = date('d/m/y H:i:s');
        $message = htmlspecialchars(trim($_POST['message']));

        $ligne = "<<$nom|$email|$date|$message>>\n";
        if (file_put_contents($filename, $ligne, FILE_APPEND)) {
            $message_info = "✅ Votre avis a été enregistré avec succès !";
        } else {
            $message_info = "❌ Erreur lors de l'enregistrement. Réessayez.";
        }
    }
}

// 2. Lecture des 5 derniers avis
$messages_a_afficher = [];
if (file_exists($filename)) {
    $lignes = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lignes_inversees = array_reverse($lignes);
    $messages_a_afficher = array_slice($lignes_inversees, 0, 5);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Livre d'Or</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .cadre {
            max-width: 700px;
            margin: auto;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        form input, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
        table { 
            border-collapse: collapse; 
            width: 100%; 
            margin-top: 20px; 
        }
        th, td { 
            border: 1px solid #ccc; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: #f2f2f2; 
        }
        .message-info {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="cadre">
    <h1>Livre d'Or</h1>

    <form method="post">
        <input type="text" name="nom" placeholder="Votre nom" required>
        <input type="email" name="email" placeholder="Votre email" required>
        <textarea name="message" placeholder="Votre message" required></textarea>
        <button type="submit">Envoyer</button>
    </form>

    <?php if($message_info): ?>
        <p class="message-info"><?php echo $message_info; ?></p>
    <?php endif; ?>

    <hr>

    <h2>Les 5 derniers avis</h2>

    <?php if (empty($messages_a_afficher)): ?>
        <p>Aucun message pour le moment.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Date</th>
                <th>Message</th>
            </tr>
            <?php foreach ($messages_a_afficher as $msg):
                $propre = trim($msg, "<>");
                $infos = explode('|', $propre);
                if (count($infos) < 4) continue;
            ?>
            <tr>
                <td><?php echo $infos[0]; ?></td>
                <td><?php echo $infos[1]; ?></td>
                <td><?php echo $infos[2]; ?></td>
                <td><?php echo $infos[3]; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

</body>
</html>


