<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Motus</title>
  </head>
  <body>
    <?php
      require_once '../repository/playerRepository.php';
      $pseudo = $_GET['pseudo'];
      $playerRepository = new PlayerRepository();
      $players = $playerRepository->getPlayerWords($pseudo);
      $row = $players->fetch_assoc();
    ?>

    <!-- Liste des mots devinés !-->
    <div class="root-words">
          <h2>Hall of Fame (vos mots devinés) : <?= $pseudo ?></h2>
          <table>
            <thead>
              <tr>
                <th>Mot</th>
                <th>Nombre de coups</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while ($row) {
                  echo '<tr>';
                  echo '<th>'.$row['word'].'</th>';
                  if ($row['nbCoups'] == 1){
                    echo '<td>En '.$row['nbCoups'].' coup</td>';
                  }
                  else{
                  echo '<td>En '.$row['nbCoups'].' coups</td>';
                  }
                  echo '</tr>';
                  $row = $players->fetch_assoc();
                  $i++;
                }
              ?>
            </tbody>
          </table>
          <br>
          <div class="link-buttons">
            <?php
            if ($pseudo != "Joueur"){
                echo "<a href='ranking.php?pseudo={$pseudo}'><button>Voir le classement</button></a>";
              }
            echo "<a href='game.php?pseudo={$pseudo}'><button>Revenir au jeu</button></a>";
            ?>
          </div>
    </div>

    
  </body>
</html>