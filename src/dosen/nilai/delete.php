<!--Form Nilai-->
<?php
include_once '../../includes/classes.php';
$login = new Login();

if(!$login->getSession()){
    header("location:./../index.php");
}

if(filter_has_var(INPUT_GET, 'key1') && filter_has_var(INPUT_GET, 'key2')){    
    $nilai = new Nilai();
    $nim = filter_input(INPUT_GET, 'key1');
    $nip = filter_input(INPUT_GET,'key2');
    $nilai->deleteData($nim, $nip);
    header("location:?page=nilai/view");
}
?>