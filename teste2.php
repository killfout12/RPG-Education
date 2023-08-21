<?php 

session_start();


$dadoC = usucli("SELECT id FROM clientes WHERE nome =".$_SESSION['nome'])

if(isset($_GET["excluir"])){
    //Excluir o usuário
    ExecutaSQL("DELETE FROM clientes WHERE id = ".$_GET["excluir"]);
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre</title>
</head>
<body>

    <div style="margin-left: 10px; padding: 10px;">
    <h2>Meu perfil</h2>
    
    <a href="teste2.php?excluir=<?php print($dadoC["id"]); ?>"> teste<a>
    </div>
    
</body>
</html>