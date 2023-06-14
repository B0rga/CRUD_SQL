<?php

    include("banco_conexao.php");

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $servico = $_POST['servico'];
    $conheceuComo = $_POST['conheceuComo'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO usuario(nome, telefone, celular, email, endereco, cep, servico, conheceuComo, descricao) 
            VALUES ('$nome', '$telefone', '$celular', '$email', '$endereco', '$cep', '$servico', '$conheceuComo', '$descricao')";

    if(mysqli_query($conexao, $sql)){
        echo "Usuário Cadastrado!";
    }else{
        echo "Erro " .mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);

    header("Location:usuario.html");
    exit;       
?>