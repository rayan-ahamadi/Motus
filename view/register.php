<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Jeu Motus, réalisé par Rayan.A">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="lettre-m.png" />
  <title>Motus</title>
</head>
<body>
  <div class="root-register">
    <h1>Inscrivez vous à Motus</h1>
    <form action="./controller/inscriController.php" method="POST" >

      <div class="input">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" autocomplete="off" required>
      </div>

      <div class="input">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
      </div>

      <div class="input">
        <label for="password2">Confirmez votre mot de passe</label>
        <input type="password" name="password2" id="password2" required>
      </div>
      <div class="input">
        <input type="submit" value="Inscription">
      </div>

      
    </form>
    <p>Déjà inscrit ? <a href="/index.php">Connectez-vous</a></p>

    <?php
      // Après la requête POST vers le controller, on peut afficher un message d'erreur 
      // grâce à la variable $_GET['error'] qui est passée en paramètre de l'url
      if ($_GET['error'] && $_GET['error'] == 1) {
        echo '<p style="color:red">Erreur d\'inscription : Pseudo déjà utilisé</p>';
      }
      if ($_GET['error'] && $_GET['error'] == 2) {
        echo '<p style="color:red">Erreur d\'inscription : Les mots de passe ne correspondent pas</p>';
      }
    ?>
    </div>
</body>
</html>