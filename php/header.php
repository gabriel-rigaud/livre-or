<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<header>
    <div class="topnav" id="myTopnav">
        <div class="logo"> <img src="https://cdn.dribbble.com/users/230290/screenshots/15128882/media/4175d17c66f179fea9b969bbf946820f.jpg?compress=1&resize=400x300" width="135"></div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
    <?php
    // test si l'utilisateur est connecté
    if (isset($_GET['deconnexion'])){
        if($_GET['deconnexion']==true){
            session_unset();
            session_destroy();
            header('Location: index.php');
        }
    }
    else if(isset($_SESSION['connexion'])){
        $login = $_SESSION['connexion'];
        echo "<div>
<div>
<a href='../php'>Accueil</a>
<a href='../php/profil.php'>Profil</a>
<a href='../php/livre-or.php'>Le Livre D'or</a>
<a href='../php/commentaire.php'>Commentaire</a>
<a href='index.php?deconnexion=true'>Déconnexion</a>
<h3>Bienvenue $login</h3>
</div>";
        if ($login) {}
    }
    else{
        echo "<div>
<a href='../php'>Accueil</a>
<a href='../php/livre-or.php'>Le Livre D'or</a>
<a href='/php/connexion.php'>Connexion</a>
<a href='/php/inscription.php'>Inscription</a>
</div>";
    }
    ?>
    </div>
</header>
</header>