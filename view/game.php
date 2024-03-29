<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jeu Motus, réalisé par Rayan.A">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <link rel="icon" href="lettre-m.png" />
    <?php

      $pseudo = $_GET['pseudo'];
      $password= $_GET['password'];
      if ($pseudo != 'Joueur') {
        require '../repository/playerRepository.php';
        $playerRepository = new PlayerRepository();
        $rowPlayer = $playerRepository->getPlayer($pseudo)->fetch_assoc();
      }

    ?>
    <title>Motus : <?= $pseudo ?></title>
  </head>
  <body>
    <div class="root">
      <!-- Jeu !-->
      <div class="game">
        <h1 data-username=<?= $pseudo ?> data-id=<?= $pseudo != 'Joueur' ? $rowPlayer['id'] : 'NULL'; ?>  id="h1-name"><span id="motus-h1">Motus</span> : <?= $pseudo ?></h1>
        <section class="word-container">
          <div class="word">
            
          </div>
        </section>
        <p id="nbCoup">Il vous reste : 6 coups - Vous êtes à 12 points</p>
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

          //Ici on récupère le pseudo et le mot de passe pour les passer en paramètre dans les liens
          if ($pseudo != "Joueur" && $player != null){
            echo '<a href="score.php?pseudo='.$pseudo.'&password='.$password.'"><button>Voir mes mots devinés</button></a>';
            echo '<a href="ranking.php?pseudo='.$pseudo.'&password='.$password.'"><button>Voir le classement</button></a>';
          }else{
            //pour que même sans se connecter on puisse voir le classement
            echo '<a href="ranking.php?pseudo='.$pseudo.'"><button>Voir le classement</button></a>';
          }
          
          
        ?>
      </div>

    </div>
  </body>
</html>