<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    class wordRepository {
      private $dbHost;
      private $dbName;
      private $dbUser;
      private $dbPassword;
  
      function __construct() {
        // Récupération des variables d'environnement
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $this->dbHost = $_ENV['DB_HOST'];
        $this->dbName = $_ENV['DB_NAME'];
        $this->dbUser = $_ENV['DB_USER'];
        $this->dbPassword = $_ENV['DB_PASSWORD'];
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