<!--<script language='javascript'>
    window.history.pushState("", "", "/localhost/TccBW/proddeta.php");
</script>-->
<script language="javascript">
        function fonata(){
			alert("Para comprar algo realize primeiro um login");
            setTimeout("window.location = 'login.php' ",);
        }
    </script>
<?php include_once'connection.php' ?>
<?php
	session_start();
	if(!isset($_SESSION["emailUser"]) || (!isset($_SESSION["senhaUser"]))){
		echo "<script>fonata()</script>";
		exit;
	}
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
        <div class="">
    <?php
        $idproduto = $_GET['id'];

        $sql = "SELECT * from produto WHERE idProd = '$idproduto'";
        $prod = mysqli_query($mysqli, $sql);
        $listagem = mysqli_fetch_assoc($prod);

                echo ('<div class="colvisual1 col5 visualprod">');
                echo ('<img src="data:image/png;base64,'.base64_encode($listagem["imagem"]).'" /></div><br />');
        
                echo ('<div class="colvisual2 col6 prod"');									
                echo ("<p><h1>" .$listagem['descProd'] . "</h1></p><br />");
            	echo ("" .$listagem['infoAddProd'] . "<br /><br />");
                echo ("<p>R$ " .$listagem['precoUnit'] . "</p>");
			//	echo ("<a href='criapedido.php?id=" . $listagem['idProd'] . "'><button>Comprar</button></a><br />");
				echo ('<form action="criapedido.php" method="POST">
				<input type="text" name="cep" id="cep" value="" placeholder="CEP" onblur="pesquisacep(this.value);" required />
				<input type="hidden" name="id" value="'.$listagem["idProd"].'" /><br />
				<input type="text" name="rua" id="rua" placeholder="Rua" required /><br />
				<input type="number" name="num" id="num" placeholder="Numero"/><br />
				<input type="text" name="bairro" id="bairro" placeholder="Bairro"/><br />
				<input type="text" name="cidade" id="cidade" placeholder="Cidade" /><br />
				<input type="text" name="uf" id="uf" placeholder="UF"/><br />
				<input type="submit" id="botaocadastro" value="Comprar" />
			</form> </div>');


?>

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
	<script type="text/javascript" src="js/jscript.js"></script>
</body>
</html>