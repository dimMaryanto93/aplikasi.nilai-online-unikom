<!--from administrator-->
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
        <div id="center-header"> &emsp; <a href="?page=administrator/view"><b>DATA</b></a> &raquo; TAMBAH ADMINISTRATOR</div>
        <div id="right-header">&emsp;</div>        
    </div>    
</div>
<br><br>
<?php
if (filter_has_var(INPUT_POST, 'username')) {
    $admin = new Admin();
    $username = filter_input(INPUT_POST, 'username');
    $nama = filter_input(INPUT_POST, 'nama');
    $pass = filter_input(INPUT_POST, 'pass');
    $hasil = $admin->insertData($username, $pass, $nama);
    header("location:?page=administrator/view");
}
?>
<form method="POST" id="frm-input-administrator">
    <table>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username" value="" size="20"/>
            </td>
        </tr>                
        <tr>
            <td>Password NEW</td>
            <td>
                <input type="password" name="passNew" value="" size="25" id="id_pass"/>
            </td>
        </tr>
        <tr>
            <td>Password CONFIRM</td>
            <td>
                <input type="password" name="pass" value="" size="25" />
            </td>
        </tr>
        <tr>
            <td>Nama Pengguna</td>
            <td>
                <input type="text" name="nama" value="" size="30"/>
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