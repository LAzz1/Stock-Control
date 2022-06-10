<?php
    $name = filter_input(INPUT_POST,'name');
    $lote = filter_input(INPUT_POST,'lote');
    $function = filter_input(INPUT_POST,'function');
    $reservation = filter_input(INPUT_POST,'reservation');
    $expiration = filter_input(INPUT_POST,'expiration');
    

    $host = "localhost";
    $dbusername = "";
    $dbpassword = "";
    $dbname = "";
    
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    
    if(mysqli_connect_error()){
        die('connect Error('. mysqli_connect_errno() .')'.mysqli_connect_error());
    }
    else{
        $sql = "INSERT INTO products(name,lote,function,reservation,expiration) 
        values('$name','$lote','$function','$reservation','$expiration')";
        if($conn->query($sql)){
            header("Location: https://uamstockproject.000webhostapp.com/registerProduct/thankyou.html");
        }
        else{
            echo "Error ".$sql."<br>".$conn->error;
        }
        $conn->close();
    }
?>