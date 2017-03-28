<!--from Dosen-->
<?php
include_once '../../includes/classes.php';
$login = new Login();

if(!$login->getSession()){
    header("location:./../index.php");
}

if(filter_has_var(INPUT_GET, 'key')){    
    $dosen = new Dosen();
    $nip = filter_input(INPUT_GET, 'key');
    $dosen->deleteData($nip);
    header("location:?page=dosen/view");
}
?>