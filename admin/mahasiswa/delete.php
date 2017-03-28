<?php
include_once '../../includes/classes.php';
$login = new Login();

if(!$login->getSession()){
    header("location:./../index.php");
}

if(filter_has_var(INPUT_GET, 'key')){    
    $admin_mhs_del = new Mahasiswa();
    $nim = filter_input(INPUT_GET, 'key');
    $admin_mhs_del->deleteData($nim);
    header("location:?page=mahasiswa/view");
}
?>