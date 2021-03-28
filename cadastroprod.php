<script language="javascript">
        function sucesso(){
            alert ("Produto Cadastrado com sucesso.");
            setTimeout("window.location = 'controle.php' ",);
        }
        function failed(){
            alert ("Produto Não Cadastrado, Tente novamente.");
            setTimeout("window.location = 'controle.php' ",);
        }
        </script>
<?php
    include_once("connection.php");
    session_start();
    $email = $_SESSION['emailUser'];
    $eu = "SELECT * from usuario WHERE emailUser = '$email'";
    $opa = mysqli_query($mysqli, $eu);
    while($verif = mysqli_fetch_assoc($opa)) {
        $admin = $verif['idTipoUser']; 
        if($admin == 2){
            header("Location: index.php");
        }
}
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
    $descricao = $_POST['desc'];
    $qtd = $_POST['qtd'];
    $info = $_POST['info'];
    $preco = $_POST['preco'];
    $idtipoprod = $_POST['id'];

   /* if($imagem != "none"){
        $fp = fopen($imagem, $tamanho);
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);

        $sql = "INSERT into produto(imagem, nome_imagem, tamanho_imagem, tipo_imagem, descProd, qtdProd, infoAddProd, precoUnit, idTipoProd) values ('$imagem', '$nome', '$tamanho', '$tipo', '$imagem', '$descricao', '$qtd', '$info', '$preco', '$idtipoprod')";
        $inserir = mysqli_query($mysqli, $sql);
    }*/

    $sql = "INSERT into produto(imagem, descProd, qtdProd, infoAddProd, precoUnit, idTipoProd) values ('$imagem', '$descricao', '$qtd', '$info', '$preco', '$idtipoprod')";
    $inserir = mysqli_query($mysqli, $sql);

    if(mysqli_affected_rows($mysqli)){
        echo "<script>sucesso();</script>";
    }else{
        echo "<script>failed();</script>";
    }
?>