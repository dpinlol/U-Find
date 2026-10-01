<?php
require_once 'Models/DashboardModel.php';
class dashboardControl {

    function cek_data_get($jenis){ 
        if (isset($_GET[$jenis])){
            return $_GET[$jenis];
        }else{
            return 0;
        }
    }

    public function user (){
        //instansiasi atau jembatan ke dashboard model
        $model = new dashboardModel;
        $data = $model->getData();
        $klaim = $model->getKlaim();
        
        if ($this->cek_data_get("dor") == "Laporkan"){
            $model->addData($this->cek_data_get("tambah_barang"), $this->cek_data_get("deskripsi"), $this->cek_data_get("lokasi"), $this->cek_data_get("jenis"), "user");
            ?>
            <script>
            alert("Laporan dikirim, status PENDING")
            window.location.href = "index.php?page=user";
            </script>
            <?php
        }

        if ($this->cek_data_get("hapus")){
            $model->hapusData($this->cek_data_get("hapus"));
            ?>
            <script>
            alert("Data telah dihapus")
            window.location.href = "index.php?page=user";
            </script>
            <?php
        }

        if ($this->cek_data_get("klaim")){
            $model->addKlaim($this->cek_data_get("klaim"), "user", $this->cek_data_get("alasan"));
            ?>
            <script>
            alert("Klaim dikirim, status PENDING")
            window.location.href = "index.php?page=user";
            </script>
            <?php
        }

        require 'Views/UserView.php';

    }

    public function admin (){
        //instansiasi atau jembatan ke dashboard model
        $model = new dashboardModel;
        $data = $model->getData();
        $klaim = $model->getKlaim();
        list($jumlah_barang, $jumlah_pending, $jumlah_approved, $jumlah_klaim) = $model->getStat();

        if ($this->cek_data_get("dor") == "Laporkan"){
            $model->addData($this->cek_data_get("tambah_barang"), $this->cek_data_get("deskripsi"), $this->cek_data_get("lokasi"), $this->cek_data_get("jenis"), "admin");
            ?>
            <script>
            alert("Laporan dikirim, status PENDING")
            window.location.href = "index.php?page=admin";
            </script>
            <?php
        }

        if ($this->cek_data_get("hapus")){
            $model->hapusData($this->cek_data_get("hapus"));
            ?>
            <script>
            alert("Data telah dihapus")
            window.location.href = "index.php?page=admin";
            </script>
            <?php
        }

        if ($this->cek_data_get("setuju")){
            $model->ubahStatus($this->cek_data_get("setuju"), "approved");
            ?>
            <script>
            alert("Laporan APPROVED")
            window.location.href = "index.php?page=admin";
            </script>
            <?php
        }

        if ($this->cek_data_get("tolak")){
            $model->ubahStatus($this->cek_data_get("tolak"), "rejected");
            ?>
            <script>
            alert("Laporan REJECTED")
            window.location.href = "index.php?page=admin";
            </script>
            <?php
        }

        if ($this->cek_data_get("klaim_ok")){
            $isi = $model->getKlaimById($this->cek_data_get("klaim_ok"));
            $model->ubahKlaim($this->cek_data_get("klaim_ok"), "approved");
            $model->ubahStatus($isi["id_barang"], "claimed");
            ?>
            <script>
            alert("Klaim APPROVED, status CLAIMED")
            window.location.href = "index.php?page=admin";
            </script>
            <?php
        }

        if ($this->cek_data_get("klaim_no")){
            $model->ubahKlaim($this->cek_data_get("klaim_no"), "rejected");
            ?>
            <script>
            alert("Klaim REJECTED")
            window.location.href = "index.php?page=admin";
            </script>
            <?php
        }

        require 'Views/AdminView.php';

    }
}

?>
