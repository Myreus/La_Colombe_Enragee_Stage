<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/theme.css">
    <link rel="stylesheet" href="./style/nav.css">
    <link rel="stylesheet" href="./style/admin.css">
    <link rel="stylesheet" href="./style/footer.css">
</head>

<body>
    <nav>
        <ul>
            <li><img src="./img/La colombe enragée logo.webp" alt="Logo de La Colombe Enragée"></li>
            <li class="hamburger-container">
                <input type="checkbox" class="menu-toggle" id="menu-toggle">
                <label for="menu-toggle" id="menu-label" class="hamburger-button" aria-label="Menu">
                    <svg class="hamburger-svg" viewBox="0 0 24 24" width="45" height="45" fill="none"
                        stroke="currentColor" stroke-width="3" stroke-linecap="round">
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                    <svg class="hamburger-svg" viewBox="0 0 24 24" width="45" height="45" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                        <line x1="3" y1="4" x2="21" y2="20" />
                        <line x1="3" y1="20" x2="21" y2="4" />
                    </svg>
                </label>
                <ul class="hamburger-links">
                    <li><a>Actualités</a></li>
                    <li><a>Créations</a></li>
                    <li><a>Actions Culturelles</a></li>
                    <li><a>Cours et Stage</a></li>
                    <li><a>À propos</a></li>
                    <li><a>Contact</a></li>
                </ul>
            </li>
            <li class="nav-links"><a>Actualités</a></li>
            <li class="nav-links sub-menu-container">
                <a>Créations</a>
                <ul class="sub-menu-content">
                    <li><a href="">Le prénom</a></li>
                    <li><a href="#">Pour la première fois</a></li>
                    <li><a href="#">CAFEÏNE</a></li>
                    <li><a href="#">Hétriotopie</a></li>
                    <li><a href="#">Éveil</a></li>
                </ul>
            </li>
            <li class="nav-links sub-menu-container">
                <a>Actions Culturelles</a>
                <ul class="sub-menu-content">
                    <li><a href="#">Culture & Santé</a></li>
                    <li><a href="#">Projets de territoire</a></li>
                    <li><a href="#">Ateliers attenants au spectacle</a></li>
                </ul>
            </li>
            <li class="nav-links"><a>Cours et Stage</a></li>
            <li class="nav-links sub-menu-container">
                <a>À propos</a>
                <ul class="sub-menu-content">
                    <li><a href="#">La compagnie</a></li>
                    <li><a href="#">Trombinoscope</a></li>
                </ul>
            </li>
            <li class="nav-links"><a>Contact</a></li>
        </ul>
    </nav>
    <main>
        <div class="panel">
            <div class="header-panel">
                <button class="tab-button active" data-tab="creations">Créations</button>
                <button class="tab-button" data-tab="dates">Dates</button>
                <button class="tab-button" data-tab="membres">Membres</button>
                <button class="tab-button" data-tab="cours">Cours et Stage</button>
            </div>
            <div class="panel-content">
                <div id="creations" class="tab-content active">
                    <div class="color-square" style="background-color: #e68e94;"></div>
                    <p>Contenu de l'onglet Créations (vide pour l'instant)</p>
                </div>
                <div id="dates" class="tab-content">
                    <div class="color-square" style="background-color: #f29727;"></div>
                    <p>Contenu de l'onglet Dates (vide pour l'instant)</p>
                </div>
                <div id="membres" class="tab-content">
                    <div class="color-square" style="background-color: #6c91b2;"></div>
                    <p>Contenu de l'onglet Membres (vide pour l'instant)</p>
                </div>
                <div id="cours" class="tab-content">
                    <div class="color-square" style="background-color: #5c9e5e;"></div>
                    <p>Contenu de l'onglet Cours et Stage (vide pour l'instant)</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <section>
            <a href="#">Mentions légales</a>
            <p>© 2023 by la Colombe enragée.</p>
        </section>
        <section>
            <a href="#">Nous contacter</a>
        </section>
        <section>
            <p>Retrouvez nous sur nos réseaux :</p>
            <div>
                <img src="./img/instagram.png" alt="Instagram logo">
                <img src="./img/facebook.png" alt="Facebook logo">
                <img src="./img/vimeo.png" alt="Vimeo logo">
                <img src="./img/youtube.png" alt="YouTube logo">
            </div>
        </section>
        <section>
            <a href="#">Retourner en haut ↑</a>
        </section>
        <section>
            <p>Site réalisé par XXXX XXXX</p>
        </section>
    </footer>
    <script src="./script/panel.js"></script>
</body>

</html>