<?php
    require_once 'headers.php';

    $name = filter_input(INPUT_POST,'name');
    $lote = filter_input(INPUT_POST,'lote');
    $function = filter_input(INPUT_POST,'function');
    $reservation = filter_input(INPUT_POST,'reservation');
    $expiration = filter_input(INPUT_POST,'expiration');
    

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "produtos";
    
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $data = array();
        $sql = $conn->query("SELECT * FROM products");
        while ($d = $sql->fetch_assoc()){
            $data[] = $d;
        }

        exit(json_encode($data));
    }
?>