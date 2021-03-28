<script language="javascript">
        function sucesso(){
            setTimeout("window.location = 'login.php' ",);
        }
        function failed(){
            setTimeout("window.location = 'cadastro.php' ",);
        }
        </script>
<?php
    include_once ("connection.php");

        $nomeCli = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $CPF = $_POST["CPF"];

        $inserir = "INSERT into usuario (nomeUser, emailUser, cpfUser, senhaUser, idTipoUser) VALUES ('$nomeCli', '$email', '$CPF', '$senha', '2')";
        
        if($executa = mysqli_query($mysqli, $inserir)){
            echo "<script language='javascript'> 
            alert('Você foi cadastrado com sucesso!');
            sucesso(); </script>";
        }else{
            echo "<script language='javascript'> 
            alert('Usuário ja existente');
            failed(); </script>";
        }

    ?>