<!--matakuliah-->
<?php
include_once '../../includes/classes.php';

$admin_loginUpdate = new Login();

if (!$admin_loginUpdate->getSession()) {
    header("location:../index.php");
}

if (filter_has_var(INPUT_GET, 'key')) {
    $kode_mtkul = filter_input(INPUT_GET, 'key');
    $mtkul = new Matakuliah();
    ?>

    <div class="header">
        <div class="header-navigation">        
            <div id="left-header">&emsp;</div>
            <div id="center-header"> &emsp; <a href="?page=matakuliah/view"><b>DATA</b></a> &raquo; UPDATE MATAKULIAH</div>
            <div id="right-header">&emsp;</div>        
        </div>    
    </div>
    <br><br>
    <form method="POST" action="?page=matakuliah/update&key=<?php echo "$kode_mtkul"; ?>" id="frm-input-matakuliah">
        <table>
            <tr>
                <td>Kode Matakuliah</td>
                <td>
                    <input type="text" name="kd_mtkul" value="<?php echo $mtkul->tampilDataWihtID(0, $kode_mtkul); ?>" size="20" readonly/>
                </td>
            </tr>                        
            <tr>
                <td>Nama Matakuliah</td>
                <td>
                    <input type="text" name="nama_mtkul" value="<?php echo $mtkul->tampilDataWihtID(1, $kode_mtkul); ?>" size="25" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="SAVE" name="simpan"/> <input type="reset" value="RESET" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    if (filter_has_var(INPUT_POST, 'simpan')) {
        $kode = filter_input(INPUT_POST, 'kd_mtkul');
        $name = filter_input(INPUT_POST, 'nama_mtkul');
        $mtkul->updateData($kode, $name);
        header("location:?page=matakuliah/view");
    }
}
?>
