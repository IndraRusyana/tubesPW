<?php

class Login extends Database
{

    public function __construct($host, $username, $password, $dbname)
    {
        parent::__construct($host, $username, $password, $dbname);
    }

    //login
    public function login($data)
    {
        $name = $data["name"];
        $password = $data["password"];

        $query = "SELECT * FROM users WHERE username = '$name'";
        $result = mysqli_query($this->getConn(), $query);

        // cek username & npm
        if (mysqli_num_rows($result) === 1) {

            // cek password
            $row = mysqli_fetch_assoc($result);
            if ($password === $row["password"]) {
                // set session
                $_SESSION["login"] = true;
                $_SESSION['name'] = $_POST['name'];
                header("Location: kepalakeluarga.php");
                exit;
            }
        }

        $error = true;
        return $error;
    }
}
