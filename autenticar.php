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
    </script>

<?php
    include_once ("connection.php");

      $emailUser = $_POST["user"];
      $senhaUser = $_POST["senha"];

      $consulta = "SELECT * FROM usuario WHERE emailUser = '$emailUser' AND senhaUser = '$senhaUser'";
      $ler = mysqli_query($mysqli, $consulta);
      $linhas = mysqli_num_rows($ler);

        if($linhas > 0){
            while($verifica = mysqli_fetch_assoc($ler)){
                $adm = $verifica["idTipoUser"];
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
            }

        }else{
            echo ("<script language='javascript'>
                alert('Email ou Senha Inválidos!'');
                failed()</script>"); 
        }
    ?>