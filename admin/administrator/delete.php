<?php
include_once '../../includes/classes.php';

$login = new Login();

if(!$login->getSession()){
    header("location:./../index.php");
}

if(filter_has_var(INPUT_GET, 'key')){    
    $admin = new Admin();
    $user = filter_input(INPUT_GET, 'key');
    $admin->deleteData($user);
    header("location:?page=administrator/view");
}
?>