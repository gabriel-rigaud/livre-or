<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="/css/test.css">
    <link rel="icon" href="https://cdn.dribbble.com/users/230290/screenshots/15128882/media/4175d17c66f179fea9b969bbf946820f.jpg?compress=1&resize=400x300" type="image/x-icon">
</head>
<header>
    <?php include('header.php') ?>
</header>
<body>
<h1 class="titree">Bienvenue Sur Le Livre D'or</h1>
<p>Ce site et un forum pour pouvoir commenté et parlé librement veuillez vous <button class="clique"><a class="clique" href="../php/inscription.php">Inscrire</a></button> ou <button class="clique"><a class="clique" href="../php/connexion.php">Connectez Vous</a></button></p>
<p>Pour accédez au Livre D'or <button class="clique"><a class="clique" href="../php/livre-or.php">Clique Ici !</a></button></p>
<script src="/js/app.js"></script>
</body>

<footer>
    <?php include('footer.php') ?>
</footer>
</html>