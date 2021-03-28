<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Black&White</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<script type="text/javascript" src="js/jscript.js"></script>
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
			</header>
		</div>
	</div>
	<div class="header2">
		<div class="linha">
			<ul>
			    <li><a href="index.php">Home</a></li>
				<li><a href="produtos.php">Produtos</a></li>
				<li><a href="informa.php">Sobre Nos</a></li>
				<li><a href="cadastro.php">Cadastro</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</div>
	</div>
	<div class="linha center">
		<h2>Faca seu Cadastro</h2>	
		<div class="coluna col10 cadastro">
			<form action="processar.php" method="POST">
				<input type="text" name="nome" placeholder="Nome Completo" required /><br />
		<!--	<input type="text" name="user" id="inputuser" placeholder="Nome de Usuario" required /> -->
				<input type="password" name="senha" minlenght="7" maxlenght="12" placeholder="Senha" required /><br />
				<input type="email" name="email" placeholder="Email" required /><br />
				<input type="text" name="CPF" placeholder="CPF" minlenght="7" maxlenght="12" required /><br />
		<!--	<input type="text" name="cep" id="cep" value="" placeholder="CEP" onblur="pesquisacep(this.value);" required />	
				<input type="text" name="rua" id="rua" placeholder="Rua" required />
				<input type="text" name="bairro" id="bairro" placeholder="Bairro"/>
				<input type="text" name="cidade" id="cidade" placeholder="Cidade" />
				<input type="text" name="uf" id="uf" placeholder="UF"/> -->
				<input type="submit" id="botaocadastro" value="Cadastrar" />
			</form>
		</div>
	<!--	<div class="coluna col5 cadastroimg">
			<img style="padding-top: 33px;" src="img/geek.png" />
		</div>-->
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