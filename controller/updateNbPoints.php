<?php

  require_once '../repository/playerRepository.php';
  $playerRepository = new PlayerRepository();
  $pseudo = $_POST['username'];
  $score = $_POST['score'];
  $response = $playerRepository->updatePlayerScore($pseudo, $score);
  echo $response;


?>