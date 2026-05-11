<?php
require_once 'connexionBDD.php';

// Récupération de toutes les catégories
$sql = "SELECT category_id, category_name FROM category ORDER BY category_name ASC";
$req = $pdo->prepare($sql);
$req->execute();
$categories = $req->fetchAll(PDO::FETCH_ASSOC);

// Récupération de toutes les activités (pour affichage dans la liste)
$sqlActivities = "SELECT activity_id, activity_name FROM activity ORDER BY activity_name ASC";
$reqActivities = $pdo->prepare($sqlActivities);
$reqActivities->execute();
$activities = $reqActivities->fetchAll(PDO::FETCH_ASSOC);

// Récupération de l'activité à modifier (si id passé dans l'URL)
$activity = null;
$id_activity = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id_activity > 0) {
    $req = $pdo->prepare("SELECT * FROM activity WHERE activity_id = ?");
    $req->execute([$id_activity]);
    $activity = $req->fetch(PDO::FETCH_ASSOC);
}

?>

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

    <?php require_once 'nav.php'; ?>

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
                    <p>Contenu de l'onglet Créations :</p>
                    <form action="./traitement.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="activity_id" value="<?= $activity ? $activity['activity_id'] : '' ?>">

                        <label>Nom de l'activité *</label>
                        <input class="text" type="text" name="activity_name" required value="<?= htmlspecialchars($activity['activity_name'] ?? '') ?>">

                        <label>Année de création</label>
                        <input class="text" type="text" name="activity_year" value="<?= htmlspecialchars($activity['activity_year'] ?? '') ?>">

                        <label>Statut</label>
                        <input class="text" type="text" name="status" value="<?= htmlspecialchars($activity['status'] ?? '') ?>">

                        <label>Sous-titre</label>
                        <input class="text" type="text" name="subtitle" value="<?= htmlspecialchars($activity['subtitle'] ?? '') ?>">

                        <label>Résumé (summary)</label>
                        <textarea name="summary" rows="3"><?= htmlspecialchars($activity['summary'] ?? '') ?></textarea>

                        <label>Description *</label>
                        <textarea name="description" rows="5" required><?= htmlspecialchars($activity['description'] ?? '') ?></textarea>

                        <label>Crédits premier paragraphe</label>
                        <textarea name="credits1" rows="3"><?= htmlspecialchars($activity['credits1'] ?? '') ?></textarea>

                        <label>Crédits 2éme paragraphe</label>
                        <textarea name="credits2" rows="3"><?= htmlspecialchars($activity['credits2'] ?? '') ?></textarea>

                        <label>URL vidéo (iframe ou lien embed)</label>
                        <input class="text" type="text" name="video_url" value="<?= htmlspecialchars($activity['video_url'] ?? '') ?>">

                        <label>Image de l'activité *</label>
                        <input type="file" name="activity_img" accept="image/*" <?= $activity ? '' : 'required' ?>>
                        <?php if ($activity && !empty($activity['activity_img'])): ?>
                            <img src="<?= htmlspecialchars($activity['activity_img']) ?>" width="100">
                            <input type="hidden" name="old_img" value="<?= htmlspecialchars($activity['activity_img']) ?>">
                        <?php endif; ?>

                        <label>Catégorie *</label>
                        <select name="category_id" required>
                            <option value="">-- Sélectionner --</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['category_id'] ?>" <?= ($activity && $activity['id_category'] == $cat['category_id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['category_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit">Enregistrer</button>
                    </form>
                    <?php if (isset($_GET['success'])): ?>
                         <p class="alert"><?= htmlspecialchars($_GET['success']) ?></p>
                    <?php endif; ?>
                    <?php foreach ($activities as $activity): ?>
                        <div>
                            <h4><?= htmlspecialchars($activity['activity_name']) ?></h4>
                            <a href="creation_page.php?id=<?= $activity['activity_id'] ?>">Modifier</a>
                        </div>
                    <?php endforeach; ?>
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

    <?php require_once 'footer.php'; ?>
    
    <script src="./script/panel.js"></script>
</body>

</html>