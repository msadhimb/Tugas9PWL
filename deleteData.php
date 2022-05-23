<?php
    include "Database.php";

    $d = new Database();
    $d->deleteData(); 
    
    header("Location:viewData.php");