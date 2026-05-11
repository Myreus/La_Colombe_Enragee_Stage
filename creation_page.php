<?php
require_once 'connexionBDD.php';

// Récupérer l'identifiant de l'activité depuis l'URL (ex: ?id=1)
$id_activity = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_activity <= 0) {
    // Pas d'ID valide → afficher une erreur 404
    http_response_code(404);
    echo "<h1>Activité non spécifiée</h1>";
    exit;
}

// Requête pour récupérer les infos de l'activité
$sql = "SELECT activity_name, slug, activity_year, status, subtitle, description, credits1, credits2, video_url, activity_img
        FROM activity
        WHERE activity_id = :id";
$req = $pdo->prepare($sql);
$req->execute([':id' => $id_activity]);
$activity = $req->fetch(PDO::FETCH_ASSOC);

if (!$activity) {
    // Aucune activité trouvée avec cet ID
    http_response_code(404);
    echo "<h1>Création introuvable</h1>";
    exit;
}

// Faudra potentiellement supprimer cette fonction et gérer l'extraction d'URL au moment de l'envoi du formulaire.
function extractLink($iframe_html) {
    // Expression régulière pour capturer src="..."
    preg_match("/src=[\"']([^\"']*)[\"']/i", $iframe_html, $matches);
    
    if (!empty($matches[1])) {
        // Nettoyer l'URL (enlever les espaces, caractères indésirables)
        $iframe_html = trim($matches[1]);
    }
    
    return $iframe_html;
}

// Extraire l'ID YouTube depuis video_url (si c'est une URL standard)
$video_url = '';
if (!empty($activity['video_url'])) {
    $video_url = extractLink($activity['video_url']);
}

// Optionnel : récupérer les dates de représentation
$sqlDates = "SELECT date_value, place FROM date WHERE id_activity = :id ORDER BY date_value ASC";
$reqDates = $pdo->prepare($sqlDates);
$reqDates->execute([':id' => $id_activity]);
$dates = $reqDates->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($activity['activity_name']) ?> - La Colombe Enragée</title>
    <link rel="stylesheet" href="./style/theme.css">
    <link rel="stylesheet" href="./style/nav.css">
    <link rel="stylesheet" href="./style/creation_page.css">
    <link rel="stylesheet" href="./style/footer.css">
</head>
<body>
    
    <?php require_once 'nav.php'; ?>

    <main>
        <article>
            <figure>
                <img src="<?= htmlspecialchars($activity['activity_img']) ?>" alt="<?= htmlspecialchars($activity['activity_name']) ?>">
            </figure>
            <h3 class="activity-name"><?= htmlspecialchars($activity['activity_name']) ?></h3>
            <div class="details-container">
                <p class="details" id="year"><?= htmlspecialchars($activity['activity_year']) ?></p>
                <span>-</span>
                <p class="details" id="status"><?= htmlspecialchars($activity['status']) ?></p>
            </div>
            <?php if (!empty($activity['subtitle'])): ?>
                <p class="subtitle"><?= htmlspecialchars($activity['subtitle']) ?></p>
            <?php endif; ?>
            <p class="description"><?= nl2br(htmlspecialchars($activity['description'])) ?></p>

            <section>
                <div class="video-wrapper">
                    <?php if ($video_url): ?>
                        <iframe src="<?= htmlspecialchars($video_url) ?>" 
                                title="video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen></iframe>
                    <?php else: ?>
                        <p>Aucune vidéo disponible</p>
                    <?php endif; ?>
                </div>

                <div class="credits-card">
                    <p class="credits-text"><?= nl2br(htmlspecialchars($activity['credits1'])) ?></p>
                    <p class="credits-text"><?= nl2br(htmlspecialchars($activity['credits2'])) ?></p>
                </div>
            </section>

            <?php if (!empty($dates)): ?>
                <div class="dates-container">
                    <h4>Prochaines dates</h4>
                    <ul>
                        <?php foreach ($dates as $date): ?>
                            <li><?= date('d/m/Y H:i', strtotime($date['date_value'])) ?> – <?= htmlspecialchars($date['place']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </article>
    </main>

    <?php require_once 'footer.php'; ?>
</body>
</html>