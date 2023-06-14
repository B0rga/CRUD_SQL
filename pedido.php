<?php

    include("banco_conexao.php");

    $id_usu = $_POST['id_usu'];
    $dataa = $_POST['dataa'];
    $detalhes = $_POST['detalhes'];
    $frete = $_POST['frete'];
    $taxa = $_POST['taxa'];
    $total = $_POST['total'];
    $aVista = $_POST['aVista'];
    $sinal = $_POST['sinal'];
    $parcelas = $_POST['parcelas'];
    $qntdParcelas = $_POST['qntdParcelas'];
    $formaPag = $_POST['formaPag'];

    $sql = "INSERT INTO pedido(id_usu, dataa, detalhes, frete, taxa, total, aVista, sinal, parcelas, qntdParcelas, formaPag) 
            VALUES ('$id_usu', '$dataa', '$detalhes', '$frete', '$taxa', '$total', '$aVista', '$sinal', '$parcelas', '$qntdParcelas', '$formaPag')";

    if(mysqli_query($conexao, $sql)){
        echo "Pedido Cadastrado!";
    }else{
        echo "Erro " .mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);

    header("Location:pedido.html");
    exit;       
?>