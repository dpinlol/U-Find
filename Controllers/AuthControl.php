<?php
class authControl {

    function cek_data_get($jenis){
        if (isset($_GET[$jenis])){
            return $_GET[$jenis];
        }else{
            return 0;
        }
    }

    public function login(){
        $model = new authModel;
        $status = $this->cek_data_get("status");

        if ($this->cek_data_get("dor") == "Log In"){
            $user = $this->cek_data_get("username");
            $pass = $this->cek_data_get("password");

            if (!$model->userExists($user)){
                $status = "no_user";
            }elseif ($data = $model->verifyLogin($user, $pass)){
                session_start();
                $_SESSION["sesi"] = $data["id"];
                $tujuan = $data["role"] == "user"
                    ? "index.php?page=user&status=login"
                    : "index.php?page=admin&status=login";
                header("Location: $tujuan");
                exit;
            }else{
                $status = "salah";
            }
        }

        require 'Views/LoginView.php';
    }

    public function register(){
        $model = new authModel;

        if ($this->cek_data_get("dor") == "Daftar"){
            $nama  = $this->cek_data_get("nama");
            $user  = $this->cek_data_get("user");
            $email = $this->cek_data_get("email");
            $pass  = $this->cek_data_get("pass");
            $role  = $this->cek_data_get("role");
            if ($role != "admin" && $role != "user"){
                $role = "user";
            }
            $model->tambahPengguna($nama, $email, $user, $pass, $role);
            ?>
            <script>
            alert("Akun telah ditambah!")
            window.location.href = "index.php?page=login&status=daftar";
            </script>
            <?php
            exit;
        }

        require 'Views/RegisterView.php';
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: index.php?page=login&status=keluar");
        exit;
    }
}
?>
