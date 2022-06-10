<?php
    require_once 'headers.php';

    $name = filter_input(INPUT_POST,'name');
    $lote = filter_input(INPUT_POST,'lote');
    $function = filter_input(INPUT_POST,'function');
    $reservation = filter_input(INPUT_POST,'reservation');
    $expiration = filter_input(INPUT_POST,'expiration');
    

    $host = "localhost";
    $dbusername = "id19038564_zilio";
    $dbpassword = "@6gEzt0K@4{g8RCi";
    $dbname = "id19038564_stockcontrol";
    
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    
    $query = "INSERT INTO `products` (`name`,`lote`,`function`,`reservation`,`expiration`) VALUES ('$name','$lote','$function','$reservation','$expiration')";
    $insert = mysqli_query($conn,$query);
    if(!$insert){
        echo "ERRO";
    } else {
        echo "DEU BOM";
    }
?>