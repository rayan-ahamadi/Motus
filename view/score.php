<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="lettre-m.png" />
    <title>Motus</title>
  </head>
  <body>
    <?php
      require_once '../repository/playerRepository.php';
      $pseudo = $_GET['pseudo'];
      $password = $_GET['password'];
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
                echo "<a href='ranking.php?pseudo={$pseudo}&password={$password}'><button>Voir le classement</button></a>";
                echo "<a href='game.php?pseudo={$pseudo}&password={$password}'><button>Revenir au jeu</button></a>";
              }else{
                header('Location: ../game.php?pseudo=Joueur');
              }
            ?>
          </div>
    </div>

    
  </body>
</html>