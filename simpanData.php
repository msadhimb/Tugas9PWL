<?php
        include "Database.php";

        $uname = $_POST['username'];
        $pass = $_POST['password'];

        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $d = new Database();
        $data = ['username'=>$uname, 'password'=>$passHash, 'active'=>1];
        $d->insertData($data);
        header("Location:viewDAta.php");
