<?php

function directLink($akses) {
    if ($akses == "admin") {
        header("location:admin/index.php");
    } else if ($akses == "mahasiswa") {
        header("location:mahasiswa/index.php");
    } else if ($akses == "dosen") {
        header("location:dosen/index.php");
    }
}

session_start();

//includes file
include_once './includes/classes.php';

//intance object
$log = new Login();
$db = new Database();

//connection database
$db->getDriverConnection();

if ($log->getSession()) {
    directLink($log->getSessionType());
}

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
    $username = filter_input(INPUT_POST, 'user');
    $password = filter_input(INPUT_POST, 'pass');
    $akses = filter_input(INPUT_POST, 'type');
    $login = $log->cekLogin($username, $password, $akses);
    if ($login) {
        directLink($akses);
    } else {
        ?>
        <script type="text/javascript">
            alert("Maaf, User Atau Password Anda Salah");
            window.location = "index.php";
        </script>
        <?php
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>HOME APLIKASI NILAI ONLINE</title>    
        <style>
            @import "css/style-index.css";
            @import "css/jquery-ui-1.10.4.custom.css";
            @import "css/validate.css";
        </style>
        <script type="text/javascript" src="javascript/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="javascript/jquery-ui-1.10.4.custom.js"></script>
        <script type="text/javascript" src="javascript/jquery.validate.js"></script>
        <script type="text/javascript">
    $(function() {
        $("#radioType").buttonset();
    });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#frm-login").validate({
                    rules: {
                        type: {
                            required: true
                        },
                        user: {
                            required: true
                        },
                        pass: {
                            required: true
                        }
                    },
                    errorPlacement: function(error, element) {
                        if (element.is(":radio[name = type]")) {
                            error.appendTo('#radioButton');
                        } else if (element.is(":input[name = user]")) {
                            error.appendTo('#username');
                        } else if (element.is(":input[name = pass]")) {
                            error.appendTo('#password');
                        }
                    },
                    messages: {
                        type: {
                            required: ""
                        },
                        user: {
                            required: ""
                        },
                        pass: {
                            required: ""
                        }
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="judul" align="center">
            <img src="img/logo.png" width="146" height="147" alt="logo"/>
            <h3>APLIKASI NILAI ONLINE</h3>
            <H1>UNIVERSITAS KOMPUTER INDONESIA</H1>
            <address>jl.Dipatiukur no 112 sd 114 - Bandung</address>
        </div>
        <form method="POST" class="login" id="frm-login">
            <label for="login">Hak Akses:</label>
            <p class="forgot-password" id="radioType"> 

                <input type="radio" name="type" value="admin" id="adm"/>
                <label for="adm">Admin</label>            
                <input type="radio" name="type" value="dosen" id="dsn"/>
                <label for="dsn">Dosen</label>
                <input type="radio" name="type" value="mahasiswa" id="mhs" />
                <label for="mhs">Siswa</label>
            </p>
            <br><br>
            <p>
                <label for="login">Username:</label>
                <input type="text" name="user" id="login" value="" placeHolder="Your Username here">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="pass" id="password" value="" placeholder="Your Password Here">
            </p>
            <p class="login-submit">
                <button type="submit" class="login-button">Login</button>
            </p>
            <br><br>


        </form>
    </body>
</html>
