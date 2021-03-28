<script language='javascript'>
    window.history.pushState("", "", "/localhost/TccBW/testes.php");
</script>
<?php 
    include_once("connection.php");
    session_start();
    
    $idproduto = $_GET['id'];

    $sql = "SELECT * from produto WHERE idProd = '$idproduto'";
    echo $idproduto;
?>