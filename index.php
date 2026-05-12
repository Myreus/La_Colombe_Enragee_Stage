<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/theme.css">
    <link rel="stylesheet" href="./style/nav.css">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/footer.css">
    <!-- <link rel="stylesheet" href="./style/index.css"> -->
</head>

<body>

    <?php require_once 'nav.php'; ?>

    <main>
        <article>
            <h1>LA COLOMBE ENRAGÉE</h1>
            <p class="summary">La Colombe enragée est une compagnie de danse et d'oralité toulousaine évoluant principalement pour et avec l'espace public et les gens qui l'habitent. À travers arts du mouvement et de la parole, Maryem D. et son équipe allient création et médiation pour aller à la rencontre de publics souvent marginalisés et les remettre au centre.</p>
            <img src="./img/Lce.webp" alt="La colombe enragée photo équipe">
        </article>
        <article>
            <section>
                <h3 class="activity-name">Le prénom</h3>
                <div class="details-container">
                    <p class="details" id="year">Création 2024</p>
                    <span>-</span>
                    <p class="details" id="status">Tournée en cours</p>
                </div>
                <p class="subtitle">SOLO DE DANSE ET DE PAROLES INTIMES ET POLITIQUES EN ESPACE PUBLIC</p>
                <p class="summary"></p>
                <button>Voir plus</button>
            </section>
            <figure>
                <img src="./img/Le prénom.webp" alt="Le prénom photo d'illustration">
            </figure>
        </article>
        <article>
            <section>
                <h3 class="activity-name">Emboucanement</h3>
                <div class="details-container">
                    <p class="details" id="year">Création 2026-2027</p>
                    <span>-</span>
                    <p class="details" id="status">En cours de création</p>
                </div>
                <p class="subtitle">Danse aux nuisances sonores et olfactives
                    Boucan déambulatoire pour la rue en cours de création (2026-2027)
                    avec 3 à 6 danseur·euses
                    expérimentations en contextes urbains variés
                </p>
                <p class="summary">“Emboucanement” est un projet de création déambulatoire, chorégraphique et orale
                    pour et avec la rue, avec 3 à 6 danseureuses. Il s’inscrit dans un contexte de transformations de
                    l’espace public profondes : les rues, espaces historiquement occupés par les pauvres, les racisé·es
                    et les personnes marginalisées, sont progressivement « nettoyées », aseptisées et transformées en
                    vitrines économiques. Gentrification, normes sécuritaires et dispositifs anti-précaires effacent la
                    mémoire populaire des quartiers et villages et repoussent leurs habitant·es toujours plus loin dans
                    les marges.
                    Face à cet effacement, La Colombe enragée souhaite revendiquer une réappropriation totale de la rue
                    : y reprendre place par le corps, le son, la voix, l’odeur — sans polissage ni compromis.
                    “Emboucanement” veut revendiquer le bruit et le bordel comme force de vie et de résistance,
                    transformant ainsi les nuisances sonores et olfactives en geste artistique et politique, en
                    célébration joyeuse du vivant et des identités indociles.
                </p>
                <button>Voir plus</button>
            </section>
            <figure>
                <img src="./img/Emboucanement.webp" alt="Emboucanement photo d'illustration">
            </figure>
        </article>
        <article>
            <section>
                <h3 class="activity-name">Actions Culturelles</h3>
                <p class="summary">Nos actions culturelles prolongent la démarche artistique de la compagnie : créer avec les personnes, les lieux et les récits souvent invisibilisés. À travers des ateliers, stages, résidences de territoire et projets participatifs, nous tentons d’ouvrir des espaces d’expression accessibles où la danse, l’oralité, le jeu, le rythme et l’improvisation deviennent des outils de rencontre, de confiance et de création collective. Chaque projet s’adapte aux participant·es, à leurs besoins et à leurs imaginaires, pour valoriser les présences de chacun·e et transformer les espaces du quotidien en terrains sensibles, poétiques et partagés.</p>
                <button>Voir plus</button>
            </section>
            <figure>
                <img src="./img/Photo médiation.webp" alt="Photo médiation photo d'illustration">
            </figure>
        </article>
        <article>
            <section>
                <h3 class="activity-name">La Colombe enragée</h3>
                <p class="summary"><?= nl2br(htmlspecialchars($activity['summary'])) ?></p>
                <button>Voir plus</button>
            </section>
            <figure>
                <img src="./img/La colombe enragée VRAI.webp" alt="Le prénom photo d'illustration">
            </figure>
        </article>
    </main>

    <?php require_once 'footer.php'; ?>
    
    <script src="./script/main.js"></script>
</body>

</html>