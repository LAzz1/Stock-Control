<?php
    $name = filter_input(INPUT_POST,'name');
    $lote = filter_input(INPUT_POST,'lote');
    $function = filter_input(INPUT_POST,'function');
    $reservation = filter_input(INPUT_POST,'reservation');
    $expiration = filter_input(INPUT_POST,'expiration');
    

    $host = "localhost";
    $dbusername = "id19038564_zilio";
    $dbpassword = /* senha do usuario */"";
    $dbname = "id19038564_stockcontrol";
    
    $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    
    if(mysqli_connect_error()){
        die('connect Error('. mysqli_connect_errno() .')'.mysqli_connect_error());
    }
?>