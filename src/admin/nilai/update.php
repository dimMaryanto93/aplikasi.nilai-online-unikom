<!--Form Nilai-->
<?php
include_once '../../includes/classes.php';

$admin_loginUpdate = new Login();

if (!$admin_loginUpdate->getSession()) {
    header("location:../index.php");
}

if (filter_has_var(INPUT_GET, 'key1') && filter_has_var(INPUT_GET, 'key2')) {
    $nim = filter_input(INPUT_GET, 'key1');
    $nip = filter_input(INPUT_GET, 'key2');
    $nilai = new Nilai();
    ?>
    <div class="header">
        <div class="header-navigation">        
            <div id="left-header">&emsp;</div>
            <div id="center-header"> &emsp; <a href="?page=nilai/view"><b>DATA</b></a> &raquo; UPDATE NILAI</div>
            <div id="right-header">&emsp;</div>        
        </div>    
    </div>
    <br><br>
    <form method="POST" action="?page=nilai/update&key1=<?php echo "$nim"; ?>&key2=<?php echo "$nip"; ?>" id="frm-input-nilai">
        <table>
            <tr>
                <td>NIM Dan Nama Mahasiswa</td>
                <td>
                    <label>
                        <input type="text" name="nim" value="<?php echo $nim; ?>" size="20" readonly/>
                        <?php
                        $mhs = new Mahasiswa();
                        echo $mhs->tampilDataWihtID(1, $nim);
                        ?>
                    </label>                                
                </td>
            </tr>                        
            <tr>
                <td>NIP dan Nama Dosen</td>
                <td>
                    <label>
                        <input type="text" name="nip" value="<?php echo $nip; ?>" size="15" readonly/>
                        <?php
                        $dosen = new Dosen();
                        echo $dosen->tampilDataWihtID(1, $nip);
                        ?>
                    </label>

                </td>
            </tr>
            <tr>
                <td>Nilai TUGAS</td>
                <td>
                    <input type="number" name="ni_tugas" value="<?php echo $nilai->tampilDataWihtID(0, $nim, $nip); ?>" size="10"/>
                </td>
            </tr>
            <tr>
                <td>Nilai UTS</td>
                <td>
                    <input type="number" name="ni_uts" value="<?php echo $nilai->tampilDataWihtID(1, $nim, $nip); ?>" size="10"/>
                </td>
            </tr>
            <tr>
                <td>Nilai UAS</td>
                <td>
                    <input type="number" name="ni_uas" value="<?php echo $nilai->tampilDataWihtID(2, $nim, $nip); ?>" size="10"/>
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
        $mhsNim = filter_input(INPUT_POST, 'nim');
        $dosenNip = filter_input(INPUT_POST, 'nip');
        $ni_tugas = filter_input(INPUT_POST, 'ni_tugas');
        $ni_uts = filter_input(INPUT_POST, 'ni_uts');
        $ni_uas = filter_input(INPUT_POST, 'ni_uas');
        $nilai->updateData($ni_tugas, $ni_uts, $ni_uas, $mhsNim, $dosenNip);
        header("location:?page=nilai/view");
    }
}
?>
