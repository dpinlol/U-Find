<?php
require_once 'Models/HomeModel.php';
class homeController {

    function cek_data_get($jenis){ 
        if (isset($_GET[$jenis])){
            return $_GET[$jenis];
        }else{
            return 0;
        }
    }

    public function index (){
        //instansiasi atau jembatan ke home model
        $model = new homeModel;
        $data = $model->getData();
        list($total, $approved, $claimed) = $model->getStat();

        require 'Views/HomeView.php';

    }
}

?>
