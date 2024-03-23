<?php
  require_once __DIR__ . '/../vendor/autoload.php';
  class playerRepository {
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

    function getRanking() {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "SELECT `username`,`score` FROM `player` ORDER BY `player`.`score` DESC";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }

    function getPlayer($pseudo) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "SELECT * FROM player WHERE username = '$pseudo'";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }

    function updatePlayerScore($pseudo, $score) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "UPDATE player SET score = score + '$score' WHERE username = '$pseudo'";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }

    function getIdPlayer($pseudo) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "SELECT id FROM player WHERE username = '$pseudo'";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }

    function getPlayerScore($pseudo) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "SELECT score FROM player WHERE username = '$pseudo'";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }

    function addPlayer($pseudo, $password) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "INSERT INTO player (username, password) VALUES ('$pseudo', '$password')";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }

    function saveNewPlayer($pseudo, $password) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "INSERT INTO player (username, password) VALUES ('$pseudo', '$password')";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }

    function getPseudo($pseudo) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "SELECT username FROM player WHERE username = '$pseudo'";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }

    function getPlayerWords($pseudo) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "SELECT word,nbCoups FROM word INNER JOIN player ON word.idUser = player.id WHERE username = '$pseudo'";
      $result = mysqli_query($conn, $query);
      $conn->close();
      return $result;
    }


  }



?>