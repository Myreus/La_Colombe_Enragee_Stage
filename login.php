<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/admin.
    css">
</head>

<body>

    <?php require_once 'nav.php'; ?>

    <main>
        <div class="panel login-panel">
            <div class="header-panel login-header">
                <p>Connectez-vous à votre compte admin</p>
            </div>
            <div class="panel-content">
                <form action="traitement.php" method="post">
                    <div>
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>
    
    <script src="./script/panel.js"></script>
</body>

</html>