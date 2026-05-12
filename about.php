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
</head>
<body>
    <?php require_once 'nav.php' ?>
    
    <main>
            <?php foreach ($members as $member): ?>
                <article>
                    <section>
                        <h3 class="member-name"><?= htmlspecialchars($member['firstname']) ?> <?= htmlspecialchars($member['lastname']) ?></h3>
                        <p class="summary"><?= nl2br(htmlspecialchars($member['role'])) ?></p>
                    </section>
                    <figure>
                        <img src="<?= htmlspecialchars($member['member_img']) ?>" alt="<?= htmlspecialchars($member['firstname']) ?> <?= htmlspecialchars($member['lastname']) ?>">
                    </figure>
                </article>
            <?php endforeach; ?>
    </main>

    <?php require_once 'footer.php' ?>
</body>
</html>