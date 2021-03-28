<script language="javascript">
        function sucesso(){
            setTimeout("window.location = 'index.php' ",);
        }
        function sucessoadm(){
            setTimeout("window.location = 'controle.php' ",);
        }
        function failed(){
            setTimeout("window.location = 'login.php' ",);
        }
        function falho(){
            alert("Email ou Senha Invalidos");
            setTimeout("window.location = 'login.php' ",);
        }
    </script>
<?php
    include_once("connection.php");

    $email = $_POST['user'];
    $senha = $_POST['senha'];

    if(!$email || !$senha){
        echo "<script>alert ('Você deve digitar sua senha e login!');
        failed();
        </script>";
    }

    $sql = "SELECT * from usuario WHERE emailUser='$email'";
    $lei = mysqli_query($mysqli, $sql);
    $leitura = mysqli_fetch_assoc($lei);

    if($email == $leitura['emailUser'] && $senha == $leitura['senhaUser']){
            $adm = $leitura["idTipoUser"];
            if($adm == 1){
                session_start();
                $_SESSION["emailUser"] = $_POST["user"];
                $_SESSION["senhaUser"] = $_POST["senha"];
                echo ("<script language='javascript'>
                alert('Seja Bem-Vindo Ademir');
                sucessoadm();</script>");
            }else{
                session_start();
                $_SESSION["emailUser"] = $_POST["user"];
                $_SESSION["senhaUser"] = $_POST["senha"];
                echo ("<script language='javascript'>
                alert('Você foi logado com sucesso!');
                sucesso()</script>");
        }
    }else{
        echo ("<script>falho();</script>");
    }

?>