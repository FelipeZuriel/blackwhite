<?php
    include_once("connection.php");
    session_start();

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipousuario = $_POST["tipouser"];

    $update = "UPDATE usuario SET nomeUser='$nome', emailUser='$email', senhaUser='$senha', idTipoUser='$tipousuario' WHERE cpfUser='$cpf'";
    $updateuser = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

    if(mysqli_affected_rows($mysqli)){
        header("Location: controle.php");
    }else{
        echo "Não foi possível realizar a edição do usuário";
    }
?>