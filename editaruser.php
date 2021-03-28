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

    $cpf = $_GET["cpf"] or die(mysqli_error($mysqli));
    $dados = "SELECT * from usuario WHERE cpfUser = '$cpf'";
    $rows = mysqli_query($mysqli, $dados);
    $verif = mysqli_fetch_assoc($rows);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Editar produto</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="css/stylecontrol.css" />
</head>
<body>
	<div class="header1">
		<div class="linha">
			<header>
			<div class="logo">
				<img src="img/bwlogo.png" width="120px" height="auto" alt="Procura a logo mermao" /> 
			</div>
			<div class="search">
				<form>
					<input class="barracs" type="text" value="" placeholder="O que você procura?" required />
				</form>
            </div>
            <div class="camplogin">
				<?php
					if(isset($_SESSION["emailUser"])){
						$email = $_SESSION['emailUser'];
						$eu = "SELECT * from usuario WHERE emailUser = '$email'";
						$opa = mysqli_query($mysqli, $eu);
						$verif = mysqli_fetch_assoc($opa);
						echo("Seja bem-vindo ".$verif['nomeUser']);
						echo("<br /><a href='logout.php'>Logout</a>");
					}
				?>
			</div>
			</header>
		</div>
	</div>
	<div class="header2">
		<div class="linha">
			<ul>
            <li><a href="index.php">Home</a></li>
				<li><a href="produtos.php">Produtos</a></li>
				<li><a href="informa.php">Sobre Nos</a></li>
				<?php
				if(!isset($_SESSION["emailUser"])){
					echo("<li><a href='cadastro.php'>Cadastro</a></li>
					<li><a href='login.php'>Login</a></li>");	
				}
				$email = $_SESSION['emailUser'];
				$eu = "SELECT * from usuario WHERE emailUser = '$email'";
				$opa = mysqli_query($mysqli, $eu);
				while($verif = mysqli_fetch_assoc($opa)) {
					$admin = $verif['idTipoUser']; 
					if($admin == 1){
						echo("<li><a href='controle.php'>Controle</a></li>");
					}
			}
				?>
			</ul>
		</div>
	</div>
<div class="linha center">
    <h1 align="center">Edite o Usuário</h1>
    <div class="col7 cadastroprod">
        <?php
            $id = $_GET["cpf"] or die(mysqli_error($mysqli));
            $dados = "SELECT * from usuario WHERE cpfUser = '$cpf'";
            $rows = mysqli_query($mysqli, $dados);
            $verif = mysqli_fetch_assoc($rows);
        ?>
            <form action="editausuario.php" method="POST">
                <label>Nome do Usuário:</label><br />
                <input type="text" name="nome" value="<?php echo $verif['nomeUser']; ?>" /><br />
                <label>CPF:</label><br />
                <input type="text" name="cpf" value="<?php echo $verif['cpfUser']; ?>" readonly/><br />
                <label>Email:</label><br />
                <input type="text" name="email" value="<?php echo $verif['emailUser']; ?>" /><br />
                <label>Senha:</label><br />
                <input type="text" name="senha" value="<?php echo $verif['senhaUser']; ?>" /><br />
                <label>Id Tipo Usuário:</label><br />
                <input type="number" name="tipouser" value="<?php echo $verif['idTipoUser']; ?>" /><br />
                <input type="submit" value="Editar" />
            </form>
</div>	
</body>
</html>