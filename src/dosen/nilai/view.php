<!--Form Nilai-->
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
        <div id="center-header"> &emsp; <b>DATA NILAI</b> &raquo; <a href="?page=nilai/insert">TAMBAH</a></div>
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
                               placeholder="Nim Dan Nama Mahasiswa"/>
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
                <th>NIM</th>
                <th>NAMA</th>
                <th>TUGAS</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>AKHIR</th>
                <th>MATAKULIAH</th>
                <th>NAMA DOSEN</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nilai = new Nilai();
            $arrayNilai = $nilai->tampilSemuaDataNilai($_SESSION['id']);

            if (filter_input(INPUT_POST, 'do') == 'lihat') {
                $arrayNilai = $nilai->tampilSemuaDataNilai($_SESSION['id']);
            } else if (filter_input(INPUT_POST, 'do') == 'find') {
                $arrayNilai = $nilai->tampilSearchDataNilaiWithID($_SESSION['id'], 
                        filter_input(INPUT_POST, 'txtCari'));
            }

            if (count($arrayNilai)) {
                $i = 1;
                foreach ($arrayNilai as $value) {
                    ?>
                    <tr>
                        <td align="center"><?php echo "$i"; ?></td>
                        <td align="center"><?php echo "$value[0]"; ?></td>
                        <td><?php echo "$value[1]"; ?></td>
                        <td align="center" width="50"><?php echo "$value[2]"; ?></td>
                        <td align="center" width="50"><?php echo "$value[3]"; ?></td>
                        <td align="center" width="50"><?php echo "$value[4]"; ?></td>
                        <td align="center" width="50"><?php echo "$value[5]"; ?></td>
                        <td><?php echo "$value[6]"; ?></td>
                        <td><?php echo "$value[7]"; ?></td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>

</div>





