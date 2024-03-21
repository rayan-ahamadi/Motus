<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <?php
      $pseudo = $_GET['pseudo'];
      if ($pseudo == null) {
        $pseudo = "Joueur";
      }
    ?>
    <title>Motus : <?= $pseudo ?></title>
  </head>
  <body>
    <div class="root">
      <!-- Jeu !-->
      <div class="game">
        <h1>Motus : <?= $pseudo ?></h1>
        <section class="word-container">
          <div class="word">
            
          </div>
        </section>
        <p id="nbCoup">Il vous reste : 6 coups</p>
        <section class="input-container">
          <input type="text" id="text-input" autocomplete="off" required autofocus>
          <input type="submit" value="Confirmer" id="submit-input">
        </section>
        <input type="submit" value="Recommencer" id="retry-input" hidden>
      </div>

      <div class="link-buttons">
        <a href="../index.php"><button>Retour à l'accueil (se déconnecter)</button></a>
        <?php
          require_once '../repository/playerRepository.php';
          $playerRepository = new PlayerRepository();
          $player = $playerRepository->getPlayer($pseudo);

          if ($pseudo != "Joueur" && $player != null){
            echo '<a href="score.php?pseudo='.$pseudo.'"><button>Voir mes mots devinés</button></a>';
          }
        ?>
        <a href="ranking.php"><button>Voir le classement</button></a>
      </div>

    </div>
  </body>
</html>