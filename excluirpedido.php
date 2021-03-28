<script language="javascript">
    function sucesso(){
        alert("Pedido deletado com sucesso!");
        setTimeout("window.location = 'controle.php'",);
    }
    function meio(){
        alert("Pedido NÃO foi deletado com sucesso!");
        setTimeout("window.location = 'controle.php'",);
    }
    function erro(){
        alert("Selecione um pedido para deletar");
        setTimeout("window.location = 'controle.php'",);
    }
</script>
<?php
    include_once("connection.php");
    session_start();

    $id = $_GET['idpedido'];
    $cepex = "SELECT * from pedido WHERE idPedido='$id'";
    $executa = mysqli_query($mysqli, $cepex);
    $ceep = mysqli_fetch_assoc($executa);
    $cep = $ceep["cep"];

    $delete2 = "DELETE from enderecopedido WHERE cep = '$cep'";
    $acao2 = mysqli_query($mysqli, $delete2);

    if(!empty($id)){
        $delete = "DELETE from pedido WHERE idPedido = '$id'";
        $acao = mysqli_query($mysqli, $delete);

        if(mysqli_affected_rows($mysqli)){
            echo "<script language='javascript'> sucesso();</script>";
        }else{
            echo "<script language='javascript'> meio();</script>";
        }
    }else{
        echo "<script language='javascript'> failed();</script>";
    }
?>