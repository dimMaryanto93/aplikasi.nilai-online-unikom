<?php
include_once '../../includes/classes.php';

$admin_loginUpdate = new Login();

if (!$admin_loginUpdate->getSession()) {
    header("location:../index.php");
}


if (filter_has_var(INPUT_GET, 'key')) {
    $username = filter_input(INPUT_GET, 'key');
    $admin = new Admin();
    ?>
    <html>
        <head>
            <title>Update Data Login</title>
            <script type="text/javascript" src="../js/libs/jquery/jquery.js"></script> 
            <script type="text/javascript" src="../js/libs/jquery-validate/jquery.validate.js"></script>                
        </head>
        <body>
            <form method="POST" action="?page=administrator/update&key=<?php echo "$username"; ?>" id="frm-input-administrator">
                <table>
                    <h3>&raquo; Update Data Login</h3>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $admin->tampilDataWihtID(0, $username); ?>" size="20"/>
                        </td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td>
                            <input type="password" name="passNew" value="" id="id_pass"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Password Confirm</td>
                        <td>
                            <input type="password" name="pass" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Pengguna</td>
                        <td>
                            <input type="text" name="nama" value="<?php echo $admin->tampilDataWihtID(2, $username); ?>" size="25" />
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
        </body>
    </html>
    <?php
    if (filter_has_var(INPUT_POST, 'simpan')) {
        $nama = filter_input(INPUT_POST, 'nama');
        $pass = filter_input(INPUT_POST, 'pass');
        $username = filter_input(INPUT_POST, 'username');
        $admin->updateData($username, $pass, $nama);
        header("location:?page=administrator/view");
    }
}
?>
