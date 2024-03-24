<?php
  require('../repository/playerRepository.php');
  $playerRepository = new playerRepository();
  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $getPseudo = $playerRepository->getPseudo($pseudo)->fetch_assoc();

  if ($password == $password2) {
    $password2 = password_hash($password2, PASSWORD_DEFAULT);
    // Si le pseudo n'existe pas dans la db, on l'ajoute
    if ($getPseudo['username'] != $pseudo) {
      $playerRepository->addPlayer($pseudo, $password2);
      header('Location: ../index.php');
    } else {
      header('Location: ../view/register.php?error=1');
    }


  } else {
    header('Location: ../view/register.php?error=2');
  }


?>