<?php
    include_once("connection.php");
    session_start();

    $id = $_POST["id"];
    $desc = $_POST["desc"];
    $qtd = $_POST["qtd"];
    $info = $_POST["info"];
    $preco = $_POST["preco"];
    $tipoprod = $_POST["idtipoprod"];

    $update = "UPDATE produto SET descProd='$desc', qtdProd='$qtd', infoAddProd='$info', precoUnit='$preco' WHERE idProd='$id'";
    $updateprod = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

    if(mysqli_affected_rows($mysqli)){
        header("Location: controle.php");
    }else{ 
        echo "Não foi possível realizar a edição do Produto";
    }
?>