<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'connexionBDD.php';
require_once 'fonctions.php';

$sqlActivities = "SELECT * FROM activity WHERE on_frontpage = 1 ORDER BY display_order ASC, activity_id DESC";
$reqActivities = $pdo->prepare($sqlActivities);
$reqActivities->execute();
$activities = $reqActivities->fetchAll(PDO::FETCH_ASSOC);

$sqlDates = "SELECT d.date_id, d.date_value, d.place, a.activity_name FROM `date` d
                            INNER JOIN `activity` AS a ON d.id_activity = a.activity_id ORDER BY d.date_value ASC";
$reqDates = $pdo->prepare($sqlDates);
$reqDates->execute();
$dates = $reqDates->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/theme.css">
    <link rel="stylesheet" href="./style/nav.css">
    <link rel="stylesheet" href="./style/frontpage.css">
    <link rel="stylesheet" href="./style/footer.css">
</head>

<body>

    <?php require_once 'nav.php'; ?>

    <main>
        <article>
            <h1>LA COLOMBE ENRAGÉE</h1>
            <p class="summary">La Colombe enragée est une compagnie de danse et d'oralité toulousaine évoluant principalement pour et avec l'espace public et les gens qui l'habitent. À travers arts du mouvement et de la parole, Maryem D. et son équipe allient création et médiation pour aller à la rencontre de publics souvent marginalisés et les remettre au centre.</p>
            <img src="./img/Lce.webp" alt="La colombe enragée photo équipe">
        </article>
        <?php foreach ($activities as $activity): ?>
        <article class="fade-in">
            <section>
                <h3 class="activity-name"><?= htmlspecialchars($activity['activity_name']) ?></h3>
                <div class="details-container">
                    <p class="details" id="year"><?= htmlspecialchars($activity['activity_year']) ?? '' ?></p>
                    <span>-</span>
                    <p class="details" id="status"><?= htmlspecialchars($activity['status']) ?? '' ?></p>
                </div>
                <p class="subtitle"><?= htmlspecialchars($activity['subtitle']) ?? '' ?></p>
                <p class="summary"><?= htmlspecialchars($activity['summary']) ?></p>
                <button>Voir plus</button>
            </section>
            <figure>
                <img src="<?= htmlspecialchars($activity['activity_img']) ?>" alt="<?= htmlspecialchars($activity['activity_name']) ?> photo d'illustration">
            </figure>
        </article>
        <?php endforeach; ?>
        <article class="fade-in">
            <section>
                <h3 class="activity-name">Actions Culturelles</h3>
                <p class="summary">Nos actions culturelles prolongent la démarche artistique de la compagnie : créer avec les personnes, les lieux et les récits souvent invisibilisés. À travers des ateliers, stages, résidences de territoire et projets participatifs, nous tentons d’ouvrir des espaces d’expression accessibles où la danse, l’oralité, le jeu, le rythme et l’improvisation deviennent des outils de rencontre, de confiance et de création collective. Chaque projet s’adapte aux participant·es, à leurs besoins et à leurs imaginaires, pour valoriser les présences de chacun·e et transformer les espaces du quotidien en terrains sensibles, poétiques et partagés.</p>
                <button>Voir plus</button>
            </section>
            <figure>
                <img src="./img/Photo médiation.webp" alt="Le prénom photo d'illustration">
            </figure>
        </article>
        <article id="date-container">
            <h3>Nos dates à venir</h3>
            <?php foreach ($dates as $date): ?>
            <article class="date fade-in">
                <?= htmlspecialchars(formaterDate($date['date_value'])) . ' | ' . htmlspecialchars($date['place']) . ' | ' . htmlspecialchars($date['activity_name']) ?>
            </article>
            <?php endforeach; ?>
        </article>
    </main>

    <?php require_once 'footer.php'; ?>
    
    <script src="./script/main.js"></script>
</body>

</html>