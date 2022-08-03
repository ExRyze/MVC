<?php

class Database {
  private $dbhost = DBHOST;
  private $dbuser = DBUSER;
  private $dbpass = DBPASS;
  private $dbname = DBNAME;

  public function get_Database() {
    $conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
    $this->checking($conn);
    return $conn;
  }

  public function get_Table($syntax) {
    $conn = $this->get_Database();
    $query = mysqli_query($conn, $syntax);
    $result = [];
    while ($row = mysqli_fetch_assoc($query)) {
      array_push($result, $row);
    }
    $this->checking($result);
    return $result;
  }

  public function checking($data) {
    if(!$data) {
      echo "Something Error!";
      exit();
    }
  }
}