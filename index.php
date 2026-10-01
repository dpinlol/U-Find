<?php
require_once 'Models/HomeModel.php';
require_once 'Models/AuthModel.php';
require_once 'Models/DashboardModel.php';
require_once 'Controllers/HomeControl.php';
require_once 'Controllers/AuthControl.php';
require_once 'Controllers/DashboardControl.php';

//panggil instasiasi atau jembatannya
$home = new homeController;
$auth = new authControl;
$dash = new dashboardControl;

$pages = array("login", "register", "logout", "user", "admin");
$page = isset($_GET["page"]) ? $_GET["page"] : "landing";

if ($page == "login"){
    $auth->login();
}elseif ($page == "register"){
    $auth->register();
}elseif ($page == "logout"){
    $auth->logout();
}elseif ($page == "user"){
    $dash->user();
}elseif ($page == "admin"){
    $dash->admin();
}else{
    $home->index();
}
?>
