<?php
    include_once 'connect.php';
    if(count($_POST)>0){
        mysqli_query($conn,"UPDATE products set name='{$_POST['name']}',lote='{$_POST['lote']}',function='{$_POST['function']}',reservation='{$_POST['reservation']}',expiration='{$_POST['expiration']}' WHERE id='{$_GET['id']}'");
         header("Location: http://localhost:5555/Stock-Control/updateProduct/thankyou.html");
    }
        $sql= "SELECT * FROM products WHERE id='{$_GET['id']}'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@100;300;400;900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <title>Registration Page</title>
</head>

<body>
    <header>
        <div class="back-button">
            <button src="../zimages/back-arrow.png" type="submit"
                onclick="window.location.href='../home/home.html'">Página Inicial</button>
        </div>
        <h1>Stock Control</h1>
    </header>
    <div class="form-box">
        <form id="userRegistration" method="post" action="" class="registerUser">
            <fieldset>
                <legend><b>Atualização de Produtos</b></legend>
                <br>
                <div id="product-information">
                    <div class="product-name">
                        <label class="labelInput" for="prodname">Nome do produto</label>
                        <input type="text" class="inputSpace" id="prodname" value="<?php echo $row['name'];?>" name="name" placeholder="Digite aqui"
                            required>
                    </div>
                    <br>
                    <div id="lote-number">
                        <label class="labelInput" for="lotenumber">Número do lote</label>
                        <input type="text" class="inputSpace" id="lotenumber" value="<?php echo $row['lote'];?>" name="lote" placeholder="Digite aqui"
                            required>
                    </div>
                    <br>
                    <div id="product-function">
                        <label class="labelInput" for="prodfunction">Função do produto</label>
                        <input type="text" class="inputSpace" value="<?php echo $row['function'];?>" id="prodfunction" name="function"
                            placeholder="Digite aqui" required>
                    </div>
                    <hr>
                    <br>
                    <div class="reservation" id="prod-reservation">
                        <label>Alocado para algum paciênte? </label>
                        <input class="radioInput" type="radio" id="yes" name="reservation" value="sim"
                            required>
                        <label for="yes">Sim</label>
                        <input class="radioInput" type="radio" id="no" name="reservation" value="não"
                            required checked>
                        <label for="no">Não</label>
                    </div>
                    <br>
                    <div id="lote-expiration">
                        <label for="loteexpiration">Validade do lote</label>
                        <input type="date" placeholder="dd-mm-yyyy" value="<?php echo $row['expiration'];?>" class="inputData" id="loteexpiration" name="expiration" required>
                        <input type="date" value="<?php echo $row['expiration'];?>" class="inputData" id="loteexpiration" name="expiration" required>
                    </div>
                                     <script>
                        function preventSubmitError(event){
                            rawInputDate = document.querySelector('[class="inputData"]').value
                            splittedInputDate = rawInputDate.split('-');
                            
                            var alertMsg =`Tem certeza que deseja cadastrar esse produto?\n\nNome: ${document.querySelector('[id="prodname"]').value}\nLote: ${document.querySelector('[id="lotenumber"]').value}\nFunção: ${document.querySelector('[id="prodfunction"]').value}\nData de validade: ${splittedInputDate[2]}/${splittedInputDate[1]}/${splittedInputDate[0]}`
                            
                            if (!confirm(alertMsg)) {
                                event.preventDefault();
                                return alert('Seu produto não foi cadastrado!');
                            }
                        }
                    </script>
                    <script>
                        function validations(inputDate,inputText){
                            
                            function dateValidation(inputDate){
                                rawInputDate = document.querySelector('[class="inputData"]').value
                                splittedInputDate = rawInputDate.split('-');
    
                                rawTodayDate = new Date().toLocaleDateString();
                                splittedTodayDate = rawTodayDate.split('/');
                                j = 2;
                                for(var i=0;i<2;i++){
                                    if(splittedInputDate[j--] < splittedTodayDate[i++]){
                                        return inputDate = false;
                                    }
                                }
                            }
                            
                            function inputWordValidation(inputText){
                                splittedProdName = (document.querySelector('[id="prodname"]').value.trim()).split('')
                                splittedProdFunction = (document.querySelector('[id="prodfunction"]').value.trim()).split('');

                                if(splittedProdName.length < 2 || splittedProdFunction.length < 2){
                                    return inputText = false;
                                }
                            }

                            if(inputWordValidation(inputText) == false && dateValidation(inputDate) == false){
                                event.preventDefault();
                                return alert("O nome e função do produto devem conter no minimo 2 letras!\nA data também não pode estar expirada!");
                            }
                            else if(inputWordValidation(inputText) == undefined && dateValidation(inputDate) == false){
                                event.preventDefault();
                                return alert("A data não pode estar expirada!");
                            }
                            else if(inputWordValidation(inputText) == false && dateValidation(inputDate) == undefined){
                                event.preventDefault();
                                return alert("O nome e função do produto devem conter no minimo 2 letras!");
                            }
                            else{
                                preventSubmitError(event)
                            }
                            
                        }
                            
                    </script>
                </div>
                <br><br>
            </fieldset>
            <div class="form-buttons">
                <button type="submit" onclick="validations(event)">Enviar</button>
                <button type="reset">Limpar</button>
            </div>
        </form>
    </div>
    <div class="scripts-page">
    </div>
</body>

</html>