<script languege="javascript">
    function sucesso(){
            alert("Tudo Certo. \nFaça Login novamente.");
            setTimeout("window.location = 'logout.php' ",);
        }
        function failed(){
            alert("Erro. Não foi possível fazer a edição. \nTente novamente.");
            setTimeout("window.location = 'usuarioedita.php' ",);
        }
</script>
<?php
    include_once("connection.php");
    session_start();

    $email = $_SESSION['emailUser'];
    $nome = $_POST["nome"];
    $emaila = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * from usuario WHERE emailUser='$email'";
    $dados = mysqli_query($mysqli, $sql);
    $verif = mysqli_fetch_assoc($dados);
    $cpf = $verif["cpfUser"];
    $tipousuario = $verif["idTipoUser"];

    $update = "UPDATE usuario SET nomeUser='$nome', emailUser='$emaila', senhaUser='$senha', idTipoUser='$tipousuario' WHERE cpfUser='$cpf'";
    $updateuser = mysqli_query($mysqli, $update) or die(mysqli_error($mysqli));

    if(mysqli_affected_rows($mysqli)){
        echo ("<script>sucesso();</script>");
    }else{
        echo ("<script>failed();</script>");
    }
?>