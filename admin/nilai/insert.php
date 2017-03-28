<!--Form Nilai-->
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
        <div id="center-header"> &emsp; <a href="?page=nilai/view"><b>DATA</b></a> &raquo; TAMBAH NILAI</div>
        <div id="right-header">&emsp;</div>        
    </div>    
</div>
<br><br>
<?php
if (filter_has_var(INPUT_POST, 'nama_mhs')&&  filter_input(INPUT_POST, 'nama_mhs')) {
    $nilai = new Nilai();
    $nama_mhs = filter_input(INPUT_POST, 'nama_mhs');
    $nama_dosen = filter_input(INPUT_POST, 'nama_dosen');
    $tugas = filter_input(INPUT_POST, 'ni_tugas');
    $uts = filter_input(INPUT_POST, 'ni_uts');
    $uas = filter_input(INPUT_POST, 'ni_uas');
    $hasil = $nilai->insertData($tugas, $uts, $uas, $nama_mhs, $nama_dosen);
    header("location:?page=nilai/view");
}
?>
<form method="POST" action="?page=nilai/insert" id="frm-input-nilai">
    <table>
        <tr>
            <td>NAMA MAHASISWA</td>
            <td>
                <select name="nama_mhs">
                    <option value="">-Pilih-</option>
                    <?php
                    $mhs = new Mahasiswa();
                    foreach ($mhs->tampilSemuaData() as $key) {
                        echo "<option value='" . $key[0] . "'>" . $key[0] . " : " . $key[1] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>NAMA DOSEN</td>
            <td>
                <select name="nama_dosen">
                    <option value="">-Pilih-</option>
                    <?php
                    $dosen = new Dosen();
                    foreach ($dosen->tampilSemuaData() as $key) {
                        echo "<option value='" . $key[0] . "'>" . $key[0] . " : " . $key[1] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nilai TUGAS</td>
            <td>
                <input type="number" name="ni_tugas" value="" size="10"/>
            </td>
        </tr>
        <tr>
            <td>Nilai UTS</td>
            <td>
                <input type="number" name="ni_uts" value="" size="10"/>
            </td>
        </tr>
        <tr>
            <td>Nilai UAS</td>
            <td>
                <input type="number" name="ni_uas" value="" size="10"/>
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
