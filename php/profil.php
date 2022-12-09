<?php
include('conect.php');
try
{
$options =
[
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_EMULATE_PREPARES => false
];
if(!isset($_SESSION['connexion']))
{
    header('location: connexion.php');
    exit();
}
//ici on stocke le contenu de la variable SESSION (le login entré precedemment) dans $loginverify
//pour pouvoir l'utiliser pour fixer la ligne lors de la requete UPDATE
$idverify = $_SESSION['connexion'];

      if(isset($_POST['submit']))
      {
            if(!empty($_POST))
            {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $test= 'salut';

                  if($password==$password2)
                  {
                    
                  $PDO = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
                  $request = $PDO->prepare("SELECT*FROM utilisateurs WHERE login = ? ");         
                  $request->bindValue(1, $login);
                  $request->execute();

                  $row = $request->rowCount();
                            

                         if($row==0)
                         {
                         $request2 = $PDO->prepare("UPDATE utilisateurs SET login = ?, password = ?  WHERE id = ? ");
                        

                         $request2->bindValue(1, $login);
                         $request2->bindValue(2, $password);
                         $request2->bindValue(3, $idverify);
                         $request2->execute();
                         var_dump($request2);
                         }
                  }
            }
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
    <title>Profil</title>
    <link rel="stylesheet" href="/css/test.css">
    <link rel="icon" href="https://cdn.dribbble.com/users/230290/screenshots/15128882/media/4175d17c66f179fea9b969bbf946820f.jpg?compress=1&resize=400x300" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /></html>
</head>

</header>
<?php include('header.php') ?>
</header>

<body id="profil">
<section id="contact">
    <div class="container">
        <div class="titre">
            <h1>Profil</h1>
            <p>Modifié vos informations !</p>
        </div>
        <form action="profil.php" method="post">
            <div>
                <label for="login">Votre Login :</label>
                <input type="text" id="login" name="login" placeholder="Entrer votre login" required>
            </div>

            <div>
                <label for="mdp">Password&nbsp;: </label>
                <input type="password" id="mdp" name="password" placeholder="Entrer votre password" required>
            </div>

            <div>
                <label for="confmdp">Confirmé&nbsp;:</label>
                <input type="password" id="confmdp" name="password2" placeholder="Re rentrer password" required>
            </div>

            <div>
                <br><br><br>
                <button class="clique" type="submit" name="submit">Valider</button>
                <button class="clique" href="deconnexion.php">Deconnexion</button>
            </div>
</section>

<script src="/js/app.js"></script>

<footer>
    <?php include('footer.php') ?>
</footer>
</body>
</html>