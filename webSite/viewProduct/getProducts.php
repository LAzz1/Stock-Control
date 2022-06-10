<?php
    include_once 'config.php';
    $data = array();
    $q = mysqli_query($conn, "SELECT *, Count(*) AS prodCount FROM products GROUP BY lote");
    
    while($row = mysqli_fetch_object($q)){
        $data[] = $row;
    }
    
    echo json_encode($data);
    echo mysqli_error($conn);
?>