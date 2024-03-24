<?php

  require('../repository/playerRepository.php');
  $playerRepository = new playerRepository();
  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];
  $player = $playerRepository->getPlayer($pseudo)->fetch_assoc();

  if (password_verify($password, $player['password']) && $player['username'] == $pseudo) {
    // Pour pas qu'une personne tiers puisse accéder à la page de jeu sans être connecté avec l'url
    header('Location: ../view/game.php?pseudo='.$pseudo.'&password='.$player['password']);
  } else {
    header('Location: ../index.php?error=1');
  }


?>