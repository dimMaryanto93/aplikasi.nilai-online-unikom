<!--Form Nilai-->
<?php
session_start();
include_once '../../includes/classes.php';

$admin_loginView = new Login();

if (!$admin_loginView->getSession()) {
    header("location:./../index.php");
}

$mhs = new Mahasiswa();
?>

<div class="header">    
    <div class="header-navigation">        
        <div id="left-header">&emsp;</div>
        <div id="center-header"> &emsp; <b>DATA NILAI</b> &raquo; 
            <?php echo strtoupper($mhs->tampilDataWihtID(1, $_SESSION['id']))." "
                    . "(".$_SESSION['id'].")"; ?></div>
        <div id="right-header">&emsp;</div>        
    </div>    
</div>
<br><br>
<div id="navigation-search">
    <form method="POST" enctype="multipart/form-data">
        <table border="0" width="100%">
            <thead>
                <tr>
                    <th align="left">
                        <input type="hidden" name="do" value="lihat">
                        <input type="submit" value="Tampilkan Semua Data" name="sb" />
                    </th>
                    <th align="right">
                        <input type="hidden" name="do" value="find">
                        <input type="text" name="txtCari" value="" size="25" 
                               placeholder="NIP , Nama Dosen ,Nama Matakuliah"/>
                        <input type="submit" value="Cari" name="sb" />
                    </th>
                </tr>
            </thead>
        </table>
    </form>
</div>
<div class="menu-content">
    <table border="1" width="100%">
        <thead>
            <tr>
                <th align="center">NO</th>
                <td>NO INDUK PEGAWAI</td>
                <th>NAMA DOSEN</th>
                <th>NAMA MATAKULIAH</th>
                <th>TUGAS</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>AKHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nilai = new Nilai();
            $arrayNilai = $nilai->tampilSemuaDataNilaiIdMahasiswa($_SESSION['id']);

            if (filter_input(INPUT_POST, 'do') == 'lihat') {
                $arrayNilai = $nilai->tampilSemuaDataNilaiIdMahasiswa($_SESSION['id']);
            } else if (filter_input(INPUT_POST, 'do') == 'find') {
                $arrayNilai = $nilai->tampilSearchDataNilaiWithIDMahasiswa
                        ($_SESSION['id'], filter_input(INPUT_POST, 'txtCari'));
            }

            if (count($arrayNilai)) {
                $i = 1;
                foreach ($arrayNilai as $value) {
                    ?>
                    <tr>
                        <td align="center"><?php echo "$i"; ?></td>
                        <td><?php echo "$value[8]"; ?></td>
                        <td><?php echo "$value[7]"; ?></td>
                        <td><?php echo "$value[6]"; ?></td>
                        <td align="center" width="50"><?php echo "$value[2]"; ?></td>
                        <td align="center" width="50"><?php echo "$value[3]"; ?></td>
                        <td align="center" width="50"><?php echo "$value[4]"; ?></td>
                        <td align="center" width="50"><?php echo "$value[5]"; ?></td>

                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>

</div>





