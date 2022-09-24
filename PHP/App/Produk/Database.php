<?php
session_start();

// class yg menghubungkan ke database
class Database {
    private $host,
            $username,
            $password,
            $dbname,
            $conn,
            $name;

    // koneksi database
    public function __construct($host,$username,$password,$dbname){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);

        if(isset($_SESSION['name'])){
            $this->name = $_SESSION['name'];
        }

    }

    // getter koneksi($conn)
    public function getConn(){
       return $this->conn;
    }

    // getter host
    public function getHost(){
        return $this->host;
    }

    // getter username
    public function getUsername(){
        return $this->username;
    }

    // getter password
    public function getPassword(){
        return $this->password;
    }

    // getter dbname
    public function getDBname(){
        return $this->dbname;
     }

    // getter session name
    public function getSession(){
        return $this->name;
    }

    // baca table
    public function read($query){
        $result = mysqli_query($this->conn,$query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

}