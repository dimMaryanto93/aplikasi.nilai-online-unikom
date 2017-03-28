<!--form mahasiswa-->
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
if (filter_has_var(INPUT_POST, 'nim')) {
    $mhs = new mahasiswa();
    $nim = filter_input(INPUT_POST, 'nim');
    $nama = filter_input(INPUT_POST, 'nama');
    $jk = filter_input(INPUT_POST, 'jk');
    $jur = filter_input(INPUT_POST, 'jur');
    $pass = filter_input(INPUT_POST, 'pass');
    $hasil = $mhs->insertData($nim, $nama, $jk, $jur, $pass);
    header("location:?page=mahasiswa/view");
}
?>
<form method="POST" action="?page=mahasiswa/insert" id="frm-input-mahasiswa">
    <table>
        <tr>
            <td>No Induk Mahasiswa</td>
            <td>
                <input type="text" name="nim" value="" size="10" maxlength="8"/>
            </td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td>
                <input type="text" name="nama" value="" size="25" />
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <label>
                    <input type="radio" name="jk" value="Laki-Laki" />
                    Laki-Laki
                </label>
                <label>
                    <input type="radio" name="jk" value="Perempuan" />
                    Perempuan
                </label>
                <span id="errorMessage"></span>

            </td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>
                <select name="jur">
                    <option value="">-Pilih-</option>
                    <option value="IF">Informatic Engineering</option>
                    <option value="MI">Informatic Management</option>
                    <option value="TK">Computer Engineering</option>
                    <option value="ELECTRO">Electrical Engineering</option>
                    <option value="AR">Architecture Engineering</option>
                    <option value="SIPIL">Civil Engineering</option>
                    <option value="TI">Industrial Engineering</option>
                    <option value="PWK">Regional and City Planning</option>
                    <option value="KA">Accountancy Computerization</option>
                </select>                        
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="pass" value="" size="25" />
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
