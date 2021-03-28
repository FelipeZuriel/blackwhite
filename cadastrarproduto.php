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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Cadastrar produto</title>
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
		<h2>Cadastre o produto</h2>
        <ul>
            <li>Id tipo Produto:</li>
            <li>1 - Livro</li>
            <li>2 - Geeks</li>
        </ul>
    </div>
    <div class="linha center">
		<div class="col7 cadastroprod" >
			<form action="cadastroprod.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="imagem" required /><br />
                <input type="text" name="desc" placeholder="Nome do Produto" /><br />
                <input type="number" name="qtd" placeholder="Quantidade" /><br />
                <textarea name="info" placeholder="Informações Adicionais"></textarea><br />
                <input type="number" step=".01" name="preco" placeholder="Preço" /><br />
                <input type="number" name="id" placeholder="Tipo do Produto" /><br />
                <input type="submit" value="Cadastrar" />
			</form>
		</div>
	</div>
</body>
</html>