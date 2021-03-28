<?php
    include_once("connection.php");
    session_start();

	$email = $_SESSION['emailUser'];
	$dados = "SELECT * from usuario WHERE emailUser = '$email'";
    $rows = mysqli_query($mysqli, $dados);
    $verif = mysqli_fetch_assoc($rows);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Black&White</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
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
					echo("Seja bem-vindo ".$verif['nomeUser']);
					echo("<br /><a href='logout.php'>Logout</a>");
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
				}else{
				$email = $_SESSION['emailUser'];
				$eu = "SELECT * from usuario WHERE emailUser = '$email'";
				$opa = mysqli_query($mysqli, $eu);
				while($verif = mysqli_fetch_assoc($opa)) {
					$admin = $verif['idTipoUser']; 
					if($admin == 1){
						echo("<li><a href='controle.php'>Controle</a></li>");
					}else{
						echo("<li><a href='usuarioedita.php'>Editar</a></li>");
						echo("<li><a href='seepedidouser.php'>Carrinho</a></li>");
					}
			}
		}
				?>
			</ul>
		</div>
	</div>

	<div class="linha dstlg">
		<h2 align="center">Edite Suas Informações</h2>
		<p align="center">Apague a informação que deseja mudar e escreva a nova.</p>
		<div class="coluna col7 login">
			<form action="useredita.php" method="POST"><?php
			$email = $_SESSION['emailUser'];
			$dados = "SELECT * from usuario WHERE emailUser = '$email'";
			$rows = mysqli_query($mysqli, $dados);
			$verif = mysqli_fetch_assoc($rows);
	?>
				<label>Nome:</label><br />
				<input type="text" name="nome" value="<?php echo $verif['nomeUser']; ?>" /><br />
				<label>Email:</label><br />
				<input type="text" name="email" value="<?php echo $verif['emailUser']; ?>" /><br />
				<label>Senha:</label><br />
				<input type="password" name="senha" value="<?php echo $verif['senhaUser']; ?>" /><br />
				<input type="submit" value="Editar" />
			</form>
		</div>
	</div>	

	<div class="footer">
		<div class="linha center">
			<h2>Quer receber promoções exclusivas?</h2>		
			<div class="search2">
				<form>
					<input class="barracs" type="text" value="" placeholder="O que você procura?" required />
				</form>
			</div>
		</div>
		<div class="linha">
				<div class="colfoo">
						<ul>
							<li>Cartao Debito</li>
							<li>Cartao Credito</li>
							<li>Cheque</li>
							<li>Boleto</li>
						</ul>
					</div>
					<div class="colfoo">
						<ul>
							<li>Cartao Debito</li>
							<li>Cartao Credito</li>
							<li>Cheque</li>
							<li>Boleto</li>
						</ul>
					</div>
					<div class="colfoo">
						<ul>
							<li>Felps</li>
							<li>Bibis</li>
							<li>Zap</li>
							<li>Telegram</li>
						</ul>
					</div>
		</div>
	</div>


</body>
</html>