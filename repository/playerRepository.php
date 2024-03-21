<?php
  class playerRepository {
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

    function getAllPlayers() {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "SELECT * FROM player";
      $result = mysqli_query($conn, $query);
      $player = mysqli_fetch_assoc($result);
      $conn->close();
      return $player;
    }

    function getPlayer($pseudo) {
      $conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
      $query = "SELECT * FROM player WHERE username = '$pseudo'";
      $result = mysqli_query($conn, $query);
      $player = mysqli_fetch_assoc($result);
      $conn->close();
      return $player;
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


  }



?>