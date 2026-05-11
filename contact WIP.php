<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>

<?php require_once 'nav.php' ?>

<main>
    <form method="POST" action="#monFakeProgramme.php">
        <fieldset>
            <legend>Envoyer un message</legend>
            <div>
                <label for="nom">Votre nom<span class="astérisque" aria-label="obligatoire">*</span> :</label>
                <input type="text" required placeholder="Ex : Moo Deng" name="nom" id="nom" maxlength="20" minlength="2">
            </div>
            <div>
                <label for="email">Votre email<span class="astérisque" aria-label="obligatoire">*</span> :</label>
                <input type="email" required placeholder="Ex : fake@placeholder.com" name="email" id="email">
            </div>
            <div>
                <label for="textarea">Laisser un commentaire :</label>
                <br>
                <textarea placeholder="Ex : Je laisse un commentaire..." name="textarea" id="textarea" cols="70" rows="10"> </textarea>
            </div>
            <div>
                <label for="checkbox">Envoyer une copie</label>
                <input type="checkbox" name="checkbox" id="checkbox" checked>
            </div>
            <div>
                <button type="submit">Envoyer le formulaire</button>
                <button type="reset">Reset</button>
            </div>
        </fieldset>
    </form>
</main>

<?php require_once 'footer.php' ?>

</body>
</html>