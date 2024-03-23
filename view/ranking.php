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
    $password = $_GET['password'];
    $pseudo = $_GET['pseudo'];
    $playerRepository = new PlayerRepository();
    $players = $playerRepository->getRanking();
    $row = $players->fetch_assoc();
  ?>


  <!-- Classement des joueurs dans la db !-->
  <div class="root-classement">
        <h2>Classement des joueurs</h2>
        <table>
          <thead>
            <tr>
              <th>Position</th>
              <th>Pseudo</th>
              <th>Score</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              while ($row) {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<th>'.$row['username'].'</th>';
                echo '<td>'.$row['score'].'</td>';
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
            echo "<a href='score.php?pseudo={$pseudo}&password={$password}'><button>Voir mes mots devinés</button></a>";
            echo "<a href='game.php?pseudo={$pseudo}&password={$password}'><button>Revenir au jeu</button></a>";
          }else{
            echo "<a href='game.php?pseudo={$pseudo}'><button>Revenir au jeu</button></a>";
          }
          
          ?>
        </div>
        
  </div>

</body>
</html>