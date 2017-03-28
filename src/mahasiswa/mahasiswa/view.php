<?php
session_start();
include_once '../../includes/classes.php';

$admin_loginView = new Login();

if (!$admin_loginView->getSession()) {
    header("location:./../index.php");
}
?>

<div class="header">    
    <div class="header-navigation">        
        <div id="left-header">&emsp;</div>
        <div id="center-header"> &emsp; <b>DATA MAHASISWA</b> &raquo; <strong>My Profile</strong></div>
        <div id="right-header">&emsp;</div>        
    </div>    
</div>
<br><br>
<div class="menu-content">
    <table border="1" width="100%">
        <?php
        $mhs = new Mahasiswa();
        ?>
        <tr>
            <td>No Induk Mahasiswa</td>
            <td align = "center">:</td>
            <td><?php echo $mhs->tampilDataWihtID(0, $_SESSION['id']);?></td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td align="center">:</td>
            <td><?php echo $mhs->tampilDataWihtID(1, $_SESSION['id']);?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td align="center">:</td>
            <td><?php echo $mhs->tampilDataWihtID(2, $_SESSION['id']);?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td align="center">:</td>
            <td><?php echo $mhs->tampilDataWihtID(3, $_SESSION['id']);?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td align="center">:</td>
            <td><?php echo $mhs->tampilDataWihtID(4, $_SESSION['id']);?></td>
        </tr>
    </table>
</div>





