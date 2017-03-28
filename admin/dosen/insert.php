<!--from Dosen-->
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
        <div id="center-header"> &emsp; <a href="?page=mahasiswa/view"><b>DATA</b></a> &raquo; TAMBAH MAHASISWA</div>
        <div id="right-header">&emsp;</div>        
    </div>    
</div>
<br><br>
<?php
if (filter_has_var(INPUT_POST, 'nip')) {
    $dsn = new Dosen();
    $nip = filter_input(INPUT_POST, 'nip');
    $nama = filter_input(INPUT_POST, 'nama');
    $kd_mtkul = filter_input(INPUT_POST, 'kode_mtkul');
    $pass = filter_input(INPUT_POST, 'passDosen');
    $dsn->insertData($nip, $nama, $kd_mtkul, $pass);
    header("location:?page=dosen/view");
}
?>
<form method="POST" action="?page=dosen/insert" id="frm-input-dosen">
    <table>
        <tr>
            <td>No Induk Pegawai</td>
            <td>
                <input type="text" name="nip" value="" size="10" maxlength="8"/>
            </td>
        </tr>
        <tr>
            <td>Nama Pegawai</td>
            <td>
                <input type="text" name="nama" value="" size="25" />
            </td>
        </tr>
        <tr>
            <td>Kode Matakuliah</td>
            <td>
                <select name="kode_mtkul">
                    <option value="">-Pilih-</option>
                    <?php
                    $mtk = new Matakuliah();
                    foreach ($mtk->tampilSemuaData() as $value) {
                        echo "<option value='" . $value[0] . "'>" . $value[1] . "</option>";
                    }
                    ?>                  
                </select>
            </td>

        </tr>
        <tr>
            <td>Password NEW</td>
            <td>
                <input type="password" name="passNew" value="" size="25" id="newPass"/>
            </td>
        </tr>
        <tr>
            <td>Password Confirm</td>
            <td>
                <input type="password" name="passDosen" value="" size="25" id="confPass"/>
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