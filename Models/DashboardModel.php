<?php

class dashboardModel
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

    public function addData($nama, $deskripsi, $lokasi, $jenis, $pelapor)
    {
        $conn = $this->conn();
        $query = "INSERT INTO barang VALUES(NULL, '$nama', '$deskripsi', '$lokasi', '$jenis', 'pending', '$pelapor')";
        $data = mysqli_query($conn, $query);

    }

        public function hapusData($id)
    {
        $conn = $this->conn();
        $query = "DELETE FROM barang WHERE id_barang=$id";
        $data = mysqli_query($conn, $query);

    }

    public function ubahStatus($id, $status)
    {
        $conn = $this->conn();
        $query = "UPDATE barang SET status='$status' WHERE id_barang=$id";
        $data = mysqli_query($conn, $query);

    }

    public function getKlaim()
    {
        $conn = $this->conn();

        $query = "SELECT * FROM klaim";

        $data = mysqli_query($conn, $query);
        return $data;
    }

    public function addKlaim($id_barang, $pengklaim, $alasan)
    {
        $conn = $this->conn();
        $query = "INSERT INTO klaim VALUES(NULL, $id_barang, '$pengklaim', '$alasan', 'pending')";
        $data = mysqli_query($conn, $query);

    }

    public function ubahKlaim($id, $status)
    {
        $conn = $this->conn();
        $query = "UPDATE klaim SET status='$status' WHERE id_klaim=$id";
        $data = mysqli_query($conn, $query);

    }

    public function getKlaimById($id)
    {
        $conn = $this->conn();
        $query = "SELECT * FROM klaim WHERE id_klaim=$id";
        $data = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($data);
    }

    public function getStat()
    {
        $conn = $this->conn();

        $jumlah_barang = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM barang"));
        $jumlah_pending = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM barang WHERE status='pending'"));
        $jumlah_approved = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM barang WHERE status='approved'"));
        $jumlah_klaim = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM klaim"));

        return array($jumlah_barang[0], $jumlah_pending[0], $jumlah_approved[0], $jumlah_klaim[0]);
    }
}