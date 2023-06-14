<?php
    include("banco_conexao.php");

    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sql = "SELECT * FROM pedido WHERE id LIKE '%$data%' OR id_usu LIKE '%$data%' OR detalhes LIKE '%$data%' OR total LIKE '%$data%' OR taxa LIKE '%$data%' OR frete LIKE '%$data%' OR formaPag ORDER BY id DESC";
    }
    else{
        $sql ="SELECT * FROM pedido ORDER BY id DESC";
    }
    
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"></style>
    <title>Consulta</title>
</head>
<body>
    <div class="divBusca">
        <input type="search" id="inputBusca" autocomplete="off" placeholder="Pesquisar">
        <button onclick="searchData()" id="btnBusca">Buscar</button>
    </div>
<table>
    <tr>
        <th>ID</th>
        <th>ID de usuário</th>
        <th>Data</th>
        <th>Detalhes</th>
        <th>Frete</th>
        <th>Taxa</th>
        <th>Total</th>
        <th>Valor à Vista</th>
        <th>Sinal d/ Pagamento</th>
        <th>Valor d/ parcelas</th>
        <th>Qntd d/ Parcelas</th>
        <th>Forma d/ Pagamento</th>
    </tr>
    <?php
        while($user_data = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$user_data['id']. "</td>";
            echo "<td>" .$user_data['id_usu']. "</td>";
            echo "<td>" .$user_data['dataa']. "</td>";
            echo "<td>" .$user_data['detalhes']. "</td>";
            echo "<td>" .$user_data['frete']. "</td>";
            echo "<td>" .$user_data['taxa']. "</td>";
            echo "<td>" .$user_data['total']. "</td>";
            echo "<td>" .$user_data['aVista']. "</td>";
            echo "<td>" .$user_data['sinal']. "</td>";
            echo "<td>" .$user_data['parcelas']. "</td>";
            echo "<td>" .$user_data['qntdParcelas']. "</td>";
            echo "<td>" .$user_data['formaPag']. "</td>";
            echo 
            "<td>
                <a class='btnTrash' href='delete_pedido.php?id=$user_data[id]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                    </svg>
                </a>
            </td>";
            echo "</tr>";
        }   
    ?>
</table><br>
<button class="btn" onclick="location.href='pedido.html'">Retornar</button>
</body>
<script>
    var search = document.getElementById('inputBusca');

    search.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            searchData();
        }
    });

    function searchData(){
        window.location = 'consulta_pedido.php?search='+search.value;
    }
</script>
</html>

