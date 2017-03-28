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
        <div id="center-header"> &emsp; <b>DATA DOSEN</b> &raquo; <a href="?page=dosen/insert">TAMBAH</a></div>
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
                               placeholder="Nim Dan Nama"/>
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
                <th align="center">No</th>
                <th>NIP</th>
                <th>NAMA</th>
                <th>KODE MATAKULIAH</th>
                <th>PASSWORD</th>
                <th align="center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dosen = new Dosen();
            $arrayDosen = $dosen->tampilSemuaData();

            if (filter_input(INPUT_POST, 'do') == 'lihat') {
                $arrayDosen = $dosen->tampilSemuaData();
            } else if (filter_input(INPUT_POST, 'do') == 'find') {
                $arrayDosen = $dosen->searchData(filter_input(INPUT_POST, 'txtCari'));
            }

            if (count($arrayDosen)) {
                $i = 1;
                foreach ($arrayDosen as $value) {
                    ?>
                    <tr>
                        <td align="center"><?php echo "$i"; ?></td>
                        <td><?php echo "$value[0]"; ?></td>
                        <td><?php echo "$value[1]"; ?></td>
                        <td><?php echo "$value[2]"; ?></td>
                        <td><?php echo "$value[3]"; ?></td>
                        <td align="center">
                            <a href="?page=dosen/update&key=<?php echo "$value[0]"; ?>">
                                <img src="../img/ico_edit.gif" class="icon" border="0"/>
                            </a>
                            <a href="?page=dosen/delete&key=<?php echo "$value[0]"; ?>"
                               onclick="return confirm('Hapus Nip : <?php echo $value[0];?>')">
                                <img src="../img/ico_del.gif" class="icon" border="0"/>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>

</div>





