<?php
require_once 'connexionBDD.php';
$sql = "SELECT member_id, firstname, lastname, `role`, member_img FROM member ORDER BY member_id ASC";
$req = $pdo->query($sql);
$members = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/theme.css">
    <link rel="stylesheet" href="./style/nav.css">
    <link rel="stylesheet" href="./style/about.css">
    <link rel="stylesheet" href="./style/footer.css">
    <script src="./script/map.js" defer></script>
</head>
<body>
    <?php require_once 'nav.php' ?>
    
    <main>
        <h2 id="company">La compagnie</h2>
        <section>
            <figure>
                <img src="./img/La colombe enragée VRAI.webp" alt="La Colombe Enragée logo">
            </figure>
            <p>La Colombe enragée est une compagnie de danse et oralité toulousaine évoluant principalement pour et avec l'espace public et les gens qui l'habitent.</p>
            <p>Créée en 2016 et centrée autour du travail chorégraphique de Maryem D., la compagnie cherche à diffuser la danse dans tous les espaces de vie possibles (rue, bars, hôpitaux, maisons de quartier, ...) dans la double volonté à la fois d'aller à la rencontre de publics souvent marginalisés et de se réapproprier certains espaces souvent moins investis par les personnes minorisées. Ses membres aspirent à transformer des lieux de passage ou d’attente en lieux de rencontre, de découverte et de poésie. Par le mouvement et l'oralité, elles partagent leurs expériences de personnes minorisées - femmes, queers, pour certaines racisées et/ou issues de quartiers populaires - visibilisant des vécus souvent peu ou mal représentés. Leurs créations, révélent et interrogent ainsi nos codes, nos habitudes, nos fonctionnements et les systèmes dans lesquels nous évoluons, tout en créant du lien entre les habitant·es.</p>
            <p>Forte d'un parcours multiculturel et pluridiscilplinaire, Maryem a développé un langage chorégraphique puissant et théâtral dans lequel la danse contemporaine se nourrit du hip-hop et de danses populaires et traditionnelles afrodescendantes et nord-africaines. Elle crée par le biais d'improvisations guidées, d'explorations d'états corporels et émotionnels, de l’entremêlement de différents arts oratoires (poésie, slam, rap, …) et sonores, de l'hybridation des disciplines et de la pratique en espace public, aboutissant à des pièces qui portent toujours en elles les lieux et gens qui les ont traversées. Ses projets contiennent une dimension participative par l’implication d’amateur·es dans le processus créatif, comme avec "CAFEÏNE", créé en collaboration avec des femmes du quartier d’Ivry-Port, "Nos Faourettes" (2024) avec des habitant·es du QPV Grand Mirail ou "Pour la première fois" (2023) et "Je ne suis pas douée pour les discours" (2024), performances nées de projets Culture Santé (DRAC-ARS) en partenariat avec des patientes et soignantes de l’Hôpital psychiatrique de jour Louise Bourgeois.</p>
            <p>Outre les projets de médiation liés aux créations, la compagnie développe par ailleurs des ateliers et des cours sur le territoire notamment avec des publics amateurs n’ayant pas souvent accès à la danse. Les intervenant·es s’adaptent aux besoins des différent·es participant·es en termes de modalités d’expression et d’approches grâce à la pluralité de leurs outils (danse, rap, jeux, cirque, parkour, allers-retours entre espace public et privé, mixité choisie, mixité ouverte, …).</p>
        </section>
        
        <h2 id="team">L'équipe artistique</h2>
        <section>
        <?php foreach ($members as $member): ?>
        <article>
            <figure>
                <img src="<?= htmlspecialchars($member['member_img']) ?>" alt="<?= htmlspecialchars($member['firstname']) ?> <?= htmlspecialchars($member['lastname']) ?>">
            </figure>
            <h3 class="member-name"><?= htmlspecialchars($member['firstname']) ?> <?= htmlspecialchars($member['lastname']) ?></h3>
            <p class="summary"><?= nl2br(htmlspecialchars($member['role'])) ?></p>
        </article>
        <?php endforeach; ?>
        </section>
    </main>
    <?php require_once 'footer.php' ?>
</body>
</html>