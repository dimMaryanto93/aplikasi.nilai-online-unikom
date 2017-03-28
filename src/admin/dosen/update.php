<!--from Dosen-->
<?php
include_once '../../includes/classes.php';

$admin_loginUpdate = new Login();

if (!$admin_loginUpdate->getSession()) {
    header("location:../index.php");
}

if (filter_has_var(INPUT_GET, 'key')) {
    $nip = filter_input(INPUT_GET, 'key');
    $dosen = new Dosen();
    ?>

    <div class="header">
        <div class="header-navigation">        
            <div id="left-header">&emsp;</div>
            <div id="center-header"> &emsp; <a href="?page=dosen/view"><b>DATA</b></a> &raquo; UPDATE DOSEN</div>
            <div id="right-header">&emsp;</div>        
        </div>    
    </div>
    <br>
    <form method="POST" action="?page=dosen/update&key=<?php echo "$nip"; ?>" id="frm-input-dosen">
        <table>            
            <tr>
                <td>No Induk Pegawai</td>
                <td>
                    <input type="text" name="nip" value="<?php echo $dosen->tampilDataWihtID(0, $nip); ?>" size="10" maxlength="8"/>
                </td>
            </tr>
            <tr>
                <td>Nama Pegawai</td>
                <td>
                    <input type="text" name="nama" value="<?php echo $dosen->tampilDataWihtID(1, $nip); ?>" size="25" />
                </td>
            </tr>                        
            <tr>
                <td>Jurusan</td>
                <td>

                    <select name="kode_mtkul">
                        <option value="">-Pilih-</option>
                        <?php
                        $mtk = new Matakuliah();
                        foreach ($mtk->tampilSemuaData() as $value) {
                            if ($dosen->tampilDataWihtID(2, $nip) == "$value[0]") {
                                echo "<option value='" . $value[0] . "' selected>" . $value[1] . "</option>";
                            } else {
                                echo "<option value='" . $value[0] . "'>" . $value[1] . "</option>";
                            }
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
                    <input type="submit" value="SAVE" name="simpan"/> <input type="reset" value="RESET" />
                </td>
            </tr> 
        </table>
    </form>
    <?php
    if (filter_has_var(INPUT_POST, 'simpan')) {
        $nip = filter_input(INPUT_POST, 'nip');
        $nama = filter_input(INPUT_POST, 'nama');
        $kd_mtkul = filter_input(INPUT_POST, 'kode_mtkul');
        $pass = filter_input(INPUT_POST, 'passDosen');
        $dosen->updateData($nip, $nama, $kd_mtkul, $pass);
        header("location:?page=dosen/view");
    }
}
?>
