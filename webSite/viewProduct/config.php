<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    
    $host = "localhost";
    $dbusername = "id19038564_zilio";
    $dbpassword = /* senha do usuario */"";
    $dbname = "id19038564_stockcontrol";
    
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
?>