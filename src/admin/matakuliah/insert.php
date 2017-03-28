<!--matakuliah-->
<?php
session_start();
include_once '../../includes/classes.php';

$admin_loginInsert = new Login();

if (!$admin_loginInsert->getSession()) {
    header("location:./../index.php");
}
?>

<div class="header">
    <div class="header-navigation">        
        <div id="left-header">&emsp;</div>
        <div id="center-header"> &emsp; <a href="?page=matakuliah/view"><b>DATA</b></a> &raquo; TAMBAH MATAKULIAH</div>
        <div id="right-header">&emsp;</div>        
    </div>    
</div>
<br><br>
<?php
if (filter_has_var(INPUT_POST, 'kd_mtkul')) {
    $mtk = new Matakuliah();
    $kd_mtkul = filter_input(INPUT_POST, 'kd_mtkul');
    $nama_mtkul = filter_input(INPUT_POST, 'nama_mtkul');
    $mtk->insertData($kd_mtkul, $nama_mtkul);
    header("location:?page=matakuliah/view");
}
?>
<form method="POST" action="?page=matakuliah/insert" id="frm-input-matakuliah">
    <table>
        <h3>&raquo; Input Data Matakuliah</h3>
        <tr>
            <td>Kode Matakuliah</td>
            <td>
                <input type="text" name="kd_mtkul" value="" size="20"/>
            </td>
        </tr>                
        <tr>
            <td>Nama Matakuliah</td>
            <td>
                <input type="text" name="nama_mtkul" value="" size="30"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="SAVE" /> <input type="reset" value="RESET" />
            </td>
        </tr>
    </table>
</form>
