<?php
include_once 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `products` WHERE `id`='$id'");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@100;300;400;900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>View Stock</title>
</head>

<body>
    <header>
        <div class="back-button">
            <button type="submit" onclick="window.location.href='../home/home.html'">Página Inicial</button>
        </div>
        <h1>Stock Control</h1>
        <h2></h2>
    </header>
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    $sql = "SELECT * FROM products;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $colums .= "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['lote']}</td>
                        <td>{$row['function']}</td>
                        <td>{$row['reservation']}</td>
                        <td>{$row['expiration']}</td>
                        <td><img src=\"./img/pencil.png\" width=\"20px\" onclick=\"window.location.href='../updateProduct/update.php?id={$row['id']}'\"></td>
                        <td><img src=\"./img/exclude.png\" width=\"20px\" onclick=\"window.location.href='view.php?id={$row['id']}'\"></td>
                    </tr>
                    ";
        }
        echo "
            <!--Criar lógica em JS para vizualizar os produtos do banco de dados-->
            <table id=\"prod-table\">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Lote</th>
                    <th>Função</th>
                    <th>Alocado</th>
                    <th>Data de validade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                {$colums}
            </table>
            ";
    } else {
        echo "
            <div id=\"noProd\">
                <h2>Nenhum produto registrado</h2>
            </div>
            ";
    }
    ?>
</body>

</html>