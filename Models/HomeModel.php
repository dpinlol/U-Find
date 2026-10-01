<?php

class homeModel
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

    public function getData()
    {
        $conn = $this->conn();

        $query = "SELECT * FROM barang";

        $data = mysqli_query($conn, $query);
        return $data;
    }

    public function getStat()
    {
        $conn = $this->conn();

        $query = "SELECT COUNT(*) AS total FROM barang";
        $total = mysqli_fetch_assoc(mysqli_query($conn, $query));

        $query = "SELECT COUNT(*) AS total FROM barang WHERE status='approved'";
        $approved = mysqli_fetch_assoc(mysqli_query($conn, $query));

        $query = "SELECT COUNT(*) AS total FROM barang WHERE status='claimed'";
        $claimed = mysqli_fetch_assoc(mysqli_query($conn, $query));

        return array($total["total"], $approved["total"], $claimed["total"]);
    }
}
