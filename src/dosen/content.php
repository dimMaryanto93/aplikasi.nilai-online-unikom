<?php
include_once '../includes/login.php';
$login = new Login();

if(!$login->getSession()){
    header("location:../index.php");
}

$page = htmlentities(filter_input(INPUT_GET, 'page'));
$halaman = "$page.php";

if(!file_exists($halaman) || empty($page)){
    include './home.html';
}else{
    include $halaman;
}
?>