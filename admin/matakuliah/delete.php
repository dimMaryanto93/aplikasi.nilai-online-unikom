<!--matakuliah-->
<?php
include_once '../../includes/classes.php';
$login = new Login();

if(!$login->getSession()){
    header("location:./../index.php");
}

if(filter_has_var(INPUT_GET, 'key')){    
    $matakul= new Matakuliah();
    $kd_mtkul = filter_input(INPUT_GET, 'key');
    $matakul->deleteData($kd_mtkul);
    header("location:?page=matakuliah/view");
}
?>