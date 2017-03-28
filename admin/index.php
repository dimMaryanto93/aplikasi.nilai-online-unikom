<script type="text/javascript" src="../javascript/jquery.js"></script> 
<script type="text/javascript" src="../javascript/jquery.validate.js"></script>
<script type="text/javascript" src="../javascript/mahasiswa.js"></script>
<script type="text/javascript" src="../javascript/nilai.js"></script>
<script type="text/javascript" src="../javascript/matakuliah.js"></script>
<script type="text/javascript" src="../javascript/dosen.js"></script>
<script type="text/javascript" src="../javascript/administrator.js"></script>
<style>
    @import "../css/validate.css";
    @import "../css/style-view.css";
</style>
<?php
session_start();

include_once '../includes/classes.php';

session_start();

$log = new Login();

if (!$log->getSession()) {
    header("location:../index.php");
}

if ($log->getSession()) {
    //echo $log->getSessionType();
    if ($log->getSessionType() == 'admin') {
        header("./index.php");
    } else {
        $log->directLink($log->getSessionType());
    }
}

if (filter_input(INPUT_GET, 'page') == 'logout') {
    $log->logout();
    header("location:../index.php");
}
?>
<html>
    <head>
        <title>Home Of Administrator</title>
    </head>
    <body>
        <div class="header">
            <div id="">

            </div>
            <div id="navigasi">
                <?php include './navigasi.php'; ?>
            </div>
        </div>
        <div>
            &emsp;
        </div>
        <div class="content">
            <?php include './content.php'; ?>
        </div>
        <div class="footer">

        </div>
    </body>
</html>
