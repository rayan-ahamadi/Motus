<?php
  require_once '../repository/wordRepository.php';
  $conn = new wordRepository();
  $word = $_POST['mot'];
  $idUser = $_POST['idUser'];
  $nbCoups = $_POST['nbCoups'];

  $response = $conn->addWord($word,$idUser,$nbCoups);
  echo ($response);
?>