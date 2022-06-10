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
    
    if($_SERVER['REQUEST_METHOD'] === 'PUT'){
        if (isset($_GET['id'])) {
            $id = $conn->real_escape_string($_GET['id']);
            $data = json_decode(file_get_contents("php://input"));
            $sql = $conn->query("UPDATE products SET name = '".$data->name."', lote = '".$data->lote."', \
            function = '".$data->function."', reservation = '".$data->reservation."', \
            expiration = '".$data->expiration."' WHERE id = '$id'");
            if($sql){
                header("Location: http://localhost:5555/Stock-Control/updateProduct/thankyou.html");
            } else {
                exit(json_encode(array('status' => 'error')));
            }
        }
    }
?>