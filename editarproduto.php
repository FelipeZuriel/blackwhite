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

    $id = $_GET["id"] or die(mysqli_error($mysqli));
    $dados = "SELECT * from produto WHERE idProd = '$id'";
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
    <h1 align="center">Edite seu Produto</h1>
    <div class="col7 cadastroprod">
        <?php
            $id = $_GET["id"] or die(mysqli_error($mysqli));
            $dados = "SELECT * from produto WHERE idProd = '$id'";
            $rows = mysqli_query($mysqli, $dados);
            $verif = mysqli_fetch_assoc($rows);
        ?>
            <form action="editaproduto.php" method="POST">
                <label>Id:</label><br />
                <input type="text" name="id" value="<?php echo $verif['idProd']; ?>" readonly/><br />
                <label>Nome:</label><br />
                <input type="text" name="desc" value="<?php echo $verif['descProd']; ?>" /><br />
                <label>Quantidade:</label><br />
                <input type="number" name="qtd" value="<?php echo $verif['qtdProd']; ?>" /><br />
                <label>Informações adicionais<br />(Caso não mudar, digitar o que já estava):</label><br />
                <textarea name="info" placeholder="<?php echo $verif['infoAddProd']; ?>"></textarea><br />
                <label>Preço:</label><br />
                <input type="text" name="preco" step=".01" value="<?php echo $verif['precoUnit']; ?>" /><br />
                <label>Id Tipo Produto:</label><br />
                <input type="number" name="idtipoprod" value="<?php echo $verif['idTipoProd']; ?>" /><br /><br />
                <input type="submit" value="Editar" />
            </form>
</div>	
</body>
</html>