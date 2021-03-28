<?php	include_once('connection.php');
	session_start();
//	if(!isset($_SESSION["emailUser"]) || (!isset($_SESSION["senhaUser"]))){
//		header("Location: login.php");
//		exit;
//	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Black&White</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="css/slick.css"/>
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
		<div class="anuncio">
				<img src="img/anuncio.png" />
				<img src="img/livro.jpg" />
		</div>
	<hr>
	<div class="linha center"><br />
		<h1>O que você pode encontrar aqui?</h1> <br />
		<p>Livros, colecionaveis, souveniers, produtos de seus filmes e animes favoritos, tudo aqui, é só entrar e comprar!!</p>
	</div>
	
	<div class="linha">
			<div class="fotopro col">
				<h3>Geeks</h3>
				<img src="img/camisa.jpg" alt="" />
			</div>
			<div class="fotopro col">
				<h3>Souveniers</h3>
				<img src="img/camiha.jpg" alt="" />
			</div>
			<div class="fotopro col">
				<h3>Livros</h3>
				<img src="img/hq.jpg" alt="" />
			</div>
			<div class="fotopro col">
				<img src="img/camiha.jpg" alt="" />
			</div>
			<div class="fotopro col">
				<img src="img/chaveiropj.jpg" alt="" />
			</div>
			<div class="fotopro col">
				<img src="img/livrojv.jpg" alt="" />
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

	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="js/slick.min.js"></script>
	<script type="text/javascript" src="js/java.js"></script>
</body>
</html>