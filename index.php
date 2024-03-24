<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="view/style.css">
  <link rel="icon" href="./view/lettre-m.png" />
  <title>Motus</title>
</head>
<body>
  <h1>Bienvenue dans le jeu <span id="motus-h1">Motus</span> !</h1>
  <div class="root-connexion">
    <h2>Connectez vous pour jouer</h2>
    <form action="./controller/connController.php" method="post" id="connexion">
        <div class="input">
          <label for="pseudo">Pseudo</label>
          <input type="text" name="pseudo" id="pseudo" autocomplete="off" required>
        </div>
        <div class="input">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" required>
        </div>
        <div class="input">
          <input type="submit" value="Connexion" id="submit-connexion">
        </div>
    </form>
    <p>Pas encore inscrit ? <a href="./view/register.php">Inscrivez-vous !</a></p>
    <a href="./view/game.php?pseudo=Joueur"><button>Jouer sans me connecter</button></a>
    <?php
      if ($_GET['error'] && $_GET['error'] == 1) {
        echo '<p style="color:red">Erreur de connexion : Pseudo ou mot de passe incorrect</p>';
      }
    ?>
  </div>
</body>
</html>