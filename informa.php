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
            <div class="coluna col6 texto">
                <h2>Ola Visitante</h2>
                <p>Vamos conversar um pouco? Vamo começar por quem nós somos. Eu sou Felipe Zuriel. E eu Gabriel Norato. Sim, antes que pergunte, somos somente nós dois. Nos conhecemos no colégio onde estudamos juntos por 4 anos e agora estamos aqui com nossa empresa/e-commerce Black&White</p>
                <p>A ideia surgiu de um sonho nossa em criar uma empresa, e pensamos: Sobre o que ela vai ser? Ideias vão e vem e decidimos então fazer de nossa empresa a junção daquilo que mais gostamos, ou seja, livros e tudo relacionado ao mundo Nerd, o mundo Geek, e então a partir dessa ideia começamos a nos moldar e hoje estamos aqui.</p>
                <p>Tentamos sempre fazer o melhor atendimento para que você possa aproveitar seu produto, e aproveitá-lo. Às vezes há emprevistos é claro, mas quem é perfeito: Somo todos humanos, erramos sempre. Mas estamos lutando para ser cada vez melhores e sermos uma empresa de bom atendimento e seriedade.</p>
                <p>Espero que você nos ajude a crescer e seja parte dessa família Preta e Branca, onde o único limite é a imaginação.</p>
            </div>
            <div class="coluna col12">
                <p align="center">_______________________________________________________________________________________</p>
            <h2 align="center">Caso queira entra em contato</h2>
            </div>
            <div class="coluna col4 yoyo">
                <h2>Felipe Zuriel</h2>
                <ul>
                    <li>Email: felipezuriel@hotmail.com</li>
                    <li>Telefone: (45)99999-9999</li>
                    <li></li>
                </ul>
            </div>  
            <div class="coluna col4 yoyo">
            <h2>Gabriel Norato</h2>
                <ul>
                    <li>Email: gabrielnorato@hotmail.com</li>
                    <li>Telefone: (45)99999-9999</li>
                    <li></li>
                </ul>
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