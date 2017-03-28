<!--from Dosen-->
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
        <div id="center-header"> &emsp;DATA DOSEN &raquo; <b>My Profile</b></div>
        <div id="right-header">&emsp;</div>        
    </div>    
</div>
<br><br>
<div class="menu-content">
    <table width="100%">
            <?php
            $dosen = new Dosen();
            $arrayDosen = $dosen->tampilSemuaDataWithID($_SESSION['id']);
            $matakul = new Matakuliah();

            if (count($arrayDosen)) {
                foreach ($arrayDosen as $value) {
                    ?>
                    <tr>
                        <td>No Induk Pegawai</td>
                        <td align="center">:</td>
                        <td><?php echo "$value[0]"; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Dosen</td>
                        <td align="center">:</td>
                        <td><?php echo "$value[1]"; ?></td>
                    </tr>
                    <tr>
                        <td>Kode Matakuliah</td>
                        <td align="center">:</td>
                        <td><?php echo "$value[2]"; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Matakuliah</td>
                        <td align="center">:</td>
                        <td><?php echo $matakul->tampilDataWihtID(1, $value[2]);?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td align="center">:</td>
                        <td><?php echo "$value[3]"; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
    </table>

</div>





