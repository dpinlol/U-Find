<?php

class authModel
{

    public function conn()
    {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "lostfound";
        $port = 3306;

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $conn = mysqli_connect(
                $server,
                $user,
                $pass,
                $db,
                $port
            );

            mysqli_set_charset($conn, "utf8mb4");

            return $conn;

        } catch (mysqli_sql_exception $e) {
            die("Database error: " . $e->getMessage());
        }
    }

    public function userExists($user)
    {
        $conn = $this->conn();
        $query = "SELECT id FROM pengguna WHERE username = '$user'";
        $data = mysqli_query($conn, $query);
        return mysqli_num_rows($data) > 0;
    }

    public function verifyLogin($user, $pass)
    {
        $conn = $this->conn();
        $query = "SELECT id, role FROM pengguna WHERE username = '$user' AND password = '$pass'";
        $data = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($data);
        return $row ? $row : false;
    }

    public function tambahPengguna($name, $email, $username, $password, $role)
    {
        $conn = $this->conn();
        $query = "INSERT INTO pengguna(name,email,username,password,role) VALUES('$name','$email','$username','$password','$role')";
        mysqli_query($conn, $query);
    }
}
?>
