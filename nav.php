<?php

require_once 'connexionBDD.php';

$sqlCreations = "SELECT activity_id, activity_name FROM activity WHERE id_category = 1";
$reqCreations = $pdo->prepare($sqlCreations);
$reqCreations->execute();
$creations = $reqCreations->fetchAll(PDO::FETCH_ASSOC);

?>

<nav>
    <ul>
        <li><img src="./img/La colombe enragée logo.webp" alt="Logo de La Colombe Enragée"></li>
        <li class="hamburger-container" aria-label="Menu de navigation">
            <input type="checkbox" class="menu-toggle" id="menu-toggle">
            <label for="menu-toggle" id="menu-label" class="hamburger-button" aria-label="Menu">
                <svg class="hamburger-svg" viewBox="0 0 24 24" width="45" height="45" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round">
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
                <svg class="hamburger-svg" viewBox="0 0 24 24" width="45" height="45" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round">
                    <line x1="3" y1="4" x2="21" y2="20" />
                    <line x1="3" y1="20" x2="21" y2="4" />
                </svg>
            </label>
            <ul class="hamburger-links">
                <li><a href="frontpage.php">Actualités</a></li>
                <li><a>Créations</a></li>
                <li><a>Actions Culturelles</a></li>
                <li><a>Cours et Stages</a></li>
                <li><a href="about.php">À propos</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </li>
        <li class="nav-links"><a href="frontpage.php">Actualités</a></li>
        <li class="nav-links sub-menu-container">
            <a>Créations</a>
            <ul class="sub-menu-content">
                <?php foreach ($creations as $creation): ?>
                <li>
                    <a href="creation_page.php?id=<?= (int)$creation['activity_id'] ?>">
                        <?= htmlspecialchars($creation['activity_name']) ?>
                    </a>
                </li>
                <?php endforeach ?>
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
        <li class="nav-links"><a>Cours et Stages</a></li>
        <li class="nav-links sub-menu-container">
            <a href="about.php">À propos</a>
            <ul class="sub-menu-content">
                <li><a href="about.php#company">La compagnie</a></li>
                <li><a href="about.php#team">Trombinoscope</a></li>
            </ul>
        </li>
        <li class="nav-links"><a href="contact.php">Contact</a></li>
    </ul>
</nav>