<?php

    include("../banco_conexao.php");

    $nome = $_POST['nome'];
    $qntd = $_POST['qntd'];
    $valor = $_POST['valor'];

    $sql = "INSERT INTO produto(qntd, nome, valor) 
            VALUES ('$qntd', '$nome', '$valor')";

    if(mysqli_query($conexao, $sql)){
        echo "Produto Cadastrado!";
    }else{
        echo "Erro " .mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);

    header("Location:produto.html");
    exit;       
?>