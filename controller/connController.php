<?php

  require('../repository/playerRepository.php');
  $playerRepository = new playerRepository();
  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];
  $player = $playerRepository->getPlayer($pseudo);

  if (password_verify($password, $player['password']) && $player['username'] == $pseudo) {
    header('Location: ../view/game.php?pseudo='.$pseudo);
  } else {
    header('Location: ../index.php?error=1');
  }


?>