<?php
include_once '../../includes/classes.php';

$admin_loginUpdate = new Login();

if(!$admin_loginUpdate->getSession()){
    header("location:../index.php");
}

if (filter_has_var(INPUT_GET, 'key')) {
    $nim = filter_input(INPUT_GET, 'key');
    $mhs = new Mahasiswa();
    
    ?>

    <div class="header">
        <div class="header-navigation">        
            <div id="left-header">&emsp;</div>
            <div id="center-header"> &emsp; <a href="?page=mahasiswa/view"><b>DATA</b></a> &raquo; UPDATE MAHASISWA</div>
            <div id="right-header">&emsp;</div>        
        </div>    
    </div>
    <br>
    <form method="POST" action="?page=mahasiswa/update&key=<?php echo "$nim"; ?>" id="frm-input-mahasiswa">
        <table>            
            <tr>
                <td>No Induk Mahasiswa</td>
                <td>
                    <input type="text" name="nim" value="<?php echo $mhs->tampilDataWihtID(0, $nim); ?>" size="10" maxlength="8"/>
                </td>
            </tr>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>
                    <input type="text" name="nama" value="<?php echo $mhs->tampilDataWihtID(1, $nim); ?>" size="25" />
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <?php
                    if ($mhs->tampilDataWihtID(2, $nim) == 'Laki-Laki') {
                        ?>
                        <label>
                            <input type="radio" name="jk" value="Laki-Laki" checked/>
                            Laki-Laki
                        </label>
                        <label>
                            <input type="radio" name="jk" value="Perempuan"/>
                            Perempuan
                        </label>
                        <?php
                    } else if ($mhs->tampilDataWihtID(2, $nim) == 'Perempuan') {
                        ?>
                        <label>
                            <input type="radio" name="jk" value="Laki-Laki"/>
                            Laki-Laki
                        </label>
                        <label>
                            <input type="radio" name="jk" value="Perempuan" checked/>
                            Perempuan
                        </label>
                        <?php
                    } else {
                        ?>
                        <label>
                            <input type="radio" name="jk" value="Laki-Laki"/>
                            Laki-Laki
                        </label>
                        <label>
                            <input type="radio" name="jk" value="Perempuan" checked/>
                            Perempuan
                        </label>
                    <?php }
                    ?>
                    <span id="errorMessage"></span>
                </td>

            </tr>
            <tr>
                <td>Jurusan</td>
                <td>
                    <?php
                    $option = array(
                        "IF" => "Informatic Engineering",
                        "MI" => "Informatic Management",
                        "TK" => "Computer Engineering",
                        "ELECTRO" => "Electrical Engineering",
                        "AR" => "Architecture Engineering",
                        "SIPIL" => "Civil Engineering",
                        "TI" => "Industrial Engineering",
                        "PWK" => "Regional and City Planning",
                        "KA" => "Accountancy Computerization");
                    ?>
                    <select name="jur">
                        <option value="" selected>-Pilih-</option>
                        <?php
                        foreach ($option as $key => $value) {
                            if ($mhs->tampilDataWihtID(3, $nim) == $key) {
                                echo "<option value='" . $key . "' selected>$value</option>";
                            } else {
                                echo "<option value='" . $key . "'>$value</option>";
                            }
                        }
                        ?>
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
                    <input type="submit" value="SAVE" name="simpan"/> <input type="reset" value="RESET" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    if (filter_has_var(INPUT_POST, 'simpan')) {
        $nim = filter_input(INPUT_POST, 'nim');
        $nama = filter_input(INPUT_POST, 'nama');
        $jk = filter_input(INPUT_POST, 'jk');
        $jur = filter_input(INPUT_POST, 'jur');
        $pass = filter_input(INPUT_POST, 'pass');
        $mhs->updateData($nim, $nama, $jk, $jur, $pass);
        header("location:?page=mahasiswa/view");
    }
}
?>
