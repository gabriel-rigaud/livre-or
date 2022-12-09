<?php
include('conect.php');
try
{
//configuration des erreurs et enlever l'emulation des requetes préparées
$options =
[
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_EMULATE_PREPARES => false
];
      //ici on verifie que le boutton submit est utilisé
      if(isset($_POST['submit']))
      {
      $login = $_POST['login'];
      $password = $_POST['password'];
      $password2 = $_POST['password2'];

          //ici on verifie que tous les champs sont remplis
          if($login && $password && $password2)
          {
              //ici on verifie si les mots de passe sont similaires
              if($password==$password2)
              {
        
              //on connecte la base de donnée et on lance la requete préparée pour verifier que le pseudo est disponible
              $PDO = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
              $request = $PDO->prepare("SELECT*FROM utilisateurs WHERE login = ? ");         
              $request->bindValue(1, $login);
              $request->execute();
                  
              $row = $request->rowCount();
              // var_dump($row);
              // $request->close();
              // $request->closeCursor();
              // $PDO->close();

                     if($row==0)
                     {
                       $request2 = $PDO->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
                       $request2->bindValue(1, $login);
                       $request2->bindValue(2, $password);
                       $request2->execute();
                      
                       $request2->closeCursor();
                       // $PDO->close();
                       header('location: connexion.php');
                       exit();

                     }
                     else $erreur= "<p class='erreur_ins'>Ce login est deja utilisé</p>";
                     // else $PDO->close();
              }
              else $erreur= "<p class='erreur_ins'>Les mots de passes ne sont pas similaires</p>";
          }
          else $erreur= "<p class='erreur_ins'> Veuillez renseignez tous les champs</p>";
      } 
}
catch(PDOException $pe)
{
   echo 'ERREUR : '.$pe->getMessage();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Insciption</title>
    <link rel="stylesheet" href="/css/test.css">
    <link rel="icon" href="https://cdn.dribbble.com/users/230290/screenshots/15128882/media/4175d17c66f179fea9b969bbf946820f.jpg?compress=1&resize=400x300" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /></html>
</head>
<header>
    <?php include('header.php') ?>
</header>
<body id="inscription">
<section id="contact">
    <div class="container">
        <div class="titre">
            <h1>Inscription</h1>
            <p>Crée vous un nouveau compte c'est gratuit !</p>
        </div>
        <form action="inscription.php" method="post">

            <div>
                <label for="log">Votre Login&nbsp;:</label>
                <input type="text" id="log" name="login" placeholder="Entrer un login">
            </div>

            <div>
                <label for="mdp">Password&nbsp;: </label>
                <input type="password" id="mdp" name="password" placeholder="Entrer un password">
            </div>

            <div>
                <label for="confmdp">Confirmé&nbsp;:</label>
                <input type="password" id="confmdp" name="password2" placeholder="Retapé votre password">
            </div>

            <div>
                <br>
                <br>
                <br>
                <button type="submit" value="Submit"  name="submit">Valider</button>
                <?php if(isset($erreur)){echo $erreur;}?>
            </div>
</section>
<script src="/js/app.js"></script>
</body>
<footer>
    <?php include('footer.php') ?>
</footer>
</html>