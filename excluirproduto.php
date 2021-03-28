<?php
    include_once("connection.php");
    session_start();
    $email = $_SESSION['emailUser'];
    $eu = "SELECT * from usuario WHERE emailUser = '$email'";
    $opa = mysqli_query($mysqli, $eu);
    $linha = mysqli_num_rows($opa);
    while($verif = mysqli_fetch_assoc($opa)) {
        $admin = $verif['idTipoUser']; 
        if($admin == 2){
            header("Location: index.php");
        }
}
?>
<script language="javascript">
    function sucesso(){
        alert("Produto deletado com sucesso!");
        setTimeout("window.location = 'controle.php'",);
    }
    function meio(){
        alert("Produto NÃO foi deletado com sucesso!");
        setTimeout("window.location = 'controle.php'",);
    }
    function erro(){
        alert("Selecione um produto para deletar");
        setTimeout("window.location = 'controle.php'",);
    }
</script>
<?php
    $id = $_GET["id"];
    if(!empty($id)){
        $delete = "DELETE FROM produto WHERE idProd = '$id'";
        $exclusao = mysqli_query($mysqli, $delete);
        if(mysqli_affected_rows($mysqli)){
            echo "<script language='javascript'> sucesso();</script>";
        }else{
            echo "<script language='javascript'> meio();</script>";
        }
    }else{
        echo "<script language='javascript'> erro();</script>";
    }
?>