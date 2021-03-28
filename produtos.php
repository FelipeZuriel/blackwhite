<?php include_once'connection.php' ?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Black&White</title>
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

	<div class="linha">
		<h2 align="center">Livros</h2>
		<?php

    $sql = "SELECT * from produto WHERE idTipoProd = '1'";
	$prod = mysqli_query($mysqli, $sql);
 
	if(mysqli_num_rows($prod)){
		while($listagem = mysqli_fetch_assoc($prod)) {
			echo ('<div class="coluna col3 prod" style="margin-bottom: 50px;">');
			echo ('<img src="data:image/png;base64,'.base64_encode($listagem["imagem"]).'" /><br />');									
			echo ("<p>Descrição: " .$listagem['descProd'] . "</p>");
		//	echo ("Informação Adicional: " .$listagem['infoAddProd'] . "")
			echo ("<p>R$ " .$listagem['precoUnit'] . "</p>");
			echo ("<a href='proddeta.php?id=" . $listagem['idProd'] . "'><button>Comprar</button></a>");
			echo ("</div>");
		}
	}
	?>
	</div>
	<hr>
	<div class="linha">
		<h2 align="center">Produtos Geeks</h2>
		<?php

    $sql = "SELECT * from produto WHERE idTipoProd = '2'";
	$prod = mysqli_query($mysqli, $sql);
 
	if(mysqli_num_rows($prod)){
		while($listagem = mysqli_fetch_assoc($prod)) {
			echo ('<div class="coluna col3 prod" style="margin-bottom: 50px;">');
			echo ('<img src="data:image/png;base64,'.base64_encode($listagem["imagem"]).'" /><br />');									
			echo ("<p>Descrição: " .$listagem['descProd'] . "</p>");
		//	echo ("Informação Adicional: " .$listagem['infoAddProd'] . "");
			echo ("<p>R$ " .$listagem['precoUnit'] . "</p>");
			echo ("<a href='proddeta.php?id=" . $listagem['idProd'] . "'><button>Comprar</button></a>");
			echo ("</div>");
		}
	}
	?>
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