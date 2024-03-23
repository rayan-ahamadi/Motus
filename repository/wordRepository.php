<?php
    class wordRepository {
      private $dbHost;
      private $dbName;
      private $dbUser;
      private $dbPassword;
  
      function __construct() {
        $this->dbHost = 'localhost';
        $this->dbName = 'rayan-ahamadi_motus';
        $this->dbUser = 'rayan';
        $this->dbPassword = 'qxd8enkm';
        $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      }

      function getPlayerWords($word,$idUser) {
        $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        $query = 'SELECT word,nbCoups FROM word 
                  INNER JOIN player ON word.idUser = player.id 
                  WHERE username = "RayouLeBoss;"';
        $result = mysqli_query($conn, $query);
        $word = mysqli_fetch_assoc($result);
        $conn->close();
        return $word;
      }

      function addWord($word,$idUser,$nbCoups) {
        $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        $query = "INSERT INTO word (word, idUser,nbCoups) VALUES ('{$word}', '{$idUser}','{$nbCoups}')";
        $result = mysqli_query($conn, $query);
        $conn->close();
        return $result;
      }

    }



?>