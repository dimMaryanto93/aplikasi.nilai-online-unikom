<?php
include_once '../includes/login.php';
$login = new Login();

if (!$login->getSession()) {
    header("location:../index.php");
}
?>
<div class="nav-container">
    <ul id="nav">
        <li><a href="?page=home">Home</a></li>
        <li><a href="?page=administrator/view">Administrator</a></li>
        <li><a href="?page=dosen/view">Dosen</a></li>
        <li><a href="?page=mahasiswa/view">Mahasiswa</a></li>
        <li><a href="?page=matakuliah/view">Matakuliah</a></li>
        <li><a href="?page=nilai/view">Nilai</a></li>
        <li><a href="?page=logout">Logout</a></li>

    </ul>
</div>
