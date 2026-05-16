<?php
require_once 'connexionBDD.php';   // ta connexion

$pages = [
    'accueil' => 'frontpage.php',
    // 'creations' => 'pages/creation-liste.php',
    'creation' => 'creation_page.php',
    //! à rajouter : Actions Culturelles
    //! à rajouter : Cours et Stages
    'a-propos' => 'about.php',
    'contact' => 'contact.php',
    'login' => 'login.php',
    'admin' => 'admin.php',
    '404' => '404.php'
];

$page = $_GET['page'] ?? 'accueil';

// Si la page n'existe pas dans la liste, on renvoie vers 404
if (!isset($pages[$page])) {
    $page = '404';
}

// Inclusion du fichier correspondant
require_once $pages[$page];