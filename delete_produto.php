<?php
    if(!empty($_GET['id'])){
        include("banco_conexao.php");

        $id = $_GET['id'];
        $sqlSelect ="SELECT * FROM produto WHERE id = $id"; 
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            $sqlDelete = "DELETE FROM produto WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: consulta_produto.php');
?>