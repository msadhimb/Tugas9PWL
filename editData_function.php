<?php 

    include "Database.php";

    $uname = $_POST['username'];
    $passwd = $_POST['password'];
    $id_dari_form = $_POST['id'];

    $psw = password_hash($passwd,PASSWORD_DEFAULT);
    $id = explode("|",base64_decode($id_dari_form));
    $d = new Database();
    $data = ['username'=>$uname, 'password'=>$passwd, 'id'=>$id[1]];
    $d->editData($data);
    
    header("Location:viewData.php");
    