<script language="javascript">
    function sucesso(){
        alert("Pedido Realizado com Sucesso");
        setTimeout("window.location = 'index.php'");
    }
    function failed(){
        alert("Não foi possível realizar o cadastro");
        setTimeout("window.location = 'index.php'", 10000);
    }
</script>
<?php
    include_once("connection.php");
    session_start();

    $id = $_POST["id"];
    $email = $_SESSION['emailUser'];
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $num = $_POST["num"];

    $sqlende = "INSERT into enderecopedido (cep, rua, bairro, cidade, uf, numero) values ('$cep', '$rua', '$bairro', '$cidade', '$uf', '$num')";
    $endereco = mysqli_query($mysqli, $sqlende);

    $dadoscli = "SELECT * from usuario WHERE emailUser = '$email'";
    $row = mysqli_query($mysqli, $dadoscli);
    $verifica = mysqli_fetch_assoc($row);
    $cpf = $verifica['cpfUser'];

    $dadosprod = "SELECT * from produto WHERE idProd = '$id'";
    $row2 = mysqli_query($mysqli, $dadosprod);
    $verificacao = mysqli_fetch_assoc($row2);
    $preco = $verificacao['precoUnit'];

    $sql= "INSERT into pedido (dataPedido, valorTotal, cpfUser, idProd, cep) values (NOW(), '$preco', '$cpf', '$id', '$cep')";
    $pedido = mysqli_query($mysqli, $sql);

    if(mysqli_affected_rows($mysqli)){
        echo "<script>sucesso()</script>";
    }else{ 
        echo "<script>failed()</script>";
    }
?>