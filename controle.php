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
	<title>Black&White</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/stylecontrol.css" />
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
	<div class="linha">
    <?php

    $dados = "select * from usuario"; 
	$linhas = mysqli_query($mysqli, $dados); 
while($pesquisa = mysqli_fetch_assoc($linhas)) {
	echo "<div class='coluna col3 user'>";
    echo ("<table border='1'>
    </tr>");
    echo ("<td>Cpf: " .$pesquisa['cpfUser'] . "</td><br />"); 
    echo "</tr></tr>";
    echo ("<td>Nome: " .$pesquisa['nomeUser'] . "</td>");
    echo "</tr></tr>";
    echo ("<td>E-mail: " .$pesquisa['emailUser'] . "</td>");
    echo "</tr></tr>";
    echo ("<td>Senha: " .$pesquisa['senhaUser'] . "</td>");
    echo "</tr></tr>";
    echo ("<td>Tipo Usuário: " .$pesquisa['idTipoUser'] . "</td>");   
    echo "</tr></tr>";
	echo "<td>
	<a href='editaruser.php?cpf=" . $pesquisa['cpfUser'] . "'>Editar</a></td>";
	echo "</tr></tr>";
	echo "<td><a href='excluiruser.php?cpf=" .$pesquisa['cpfUser'] . "'>Apagar</a></td>";
	echo "</tr></table></div>";
}
    ?>
</div>
<hr>
<div class="linha">
	<div class="coluna col12 botprod center">
		<a href="cadastrarproduto.php">Cadastrar novo produto</a><br/><br />
	</div>
	</div>
	<div class="linhaa">
    <?php

    $sql = "SELECT * from produto";
	$prod = mysqli_query($mysqli, $sql);
 
	if(mysqli_num_rows($prod)){
		while($listagem = mysqli_fetch_assoc($prod)) {
			echo "<div class='coluna col3 prod'>";
			echo ("<table border='1'>
			</tr>");
			echo ('<td>Imagem Prod:<br /> <img src="data:image/png;base64,'.base64_encode($listagem["imagem"]).'" /></td><br />');									
			echo "</tr></tr>";
			echo ("<td>Id Produto: " .$listagem['idProd'] . "</td><br />"); 
			echo "</tr></tr>";
			echo ("<td>Descrição: " .$listagem['descProd'] . "</td>");
			echo "</tr></tr>";
			echo ("<td>Quantidade: " .$listagem['qtdProd'] . "</td>");
			echo "</tr></tr>";
			echo ("<td>Informação Adicional: " .$listagem['infoAddProd'] . "</td>");
			echo "</tr></tr>";
			echo ("<td>Preço: " .$listagem['precoUnit'] . "</td>");   
			echo "</tr></tr>";
			echo ("<td>ID Tipo: " .$listagem['idTipoProd'] . "</td>");   
			echo "</tr></tr>";
			echo "<td>
			<a href='editarproduto.php?id=" . $listagem['idProd'] . "'>Editar</a></td>";
			echo "</tr></tr>";
			echo "<td><a href='excluirproduto.php?id=" .$listagem['idProd'] . "'>Apagar</a></td><br />";
			echo "</tr></table></div>";
		}
	}else{
		echo "<h3>Não há produtos cadastrados</h3>";
	}
    ?>

</div>

<hr>

<div class="linha">
<div class="coluna col12 center">
		<h1>Pedidos</h1>
	</div>
	<?php

	
    $sql = "SELECT * from pedido"; 
	$pedido = mysqli_query($mysqli, $sql); 
	
	if(mysqli_num_rows($pedido)){
		while($verificacao = mysqli_fetch_assoc($pedido)) {
			echo "<div class='coluna col3 user'>";
			echo ("<table border='1'>
			</tr>");
			echo ("<td>Id Pedido: " .$verificacao['idPedido'] . "</td><br />"); 
			echo "</tr></tr>";
			echo ("<td>Data: " .$verificacao['dataPedido'] . "</td>");
			echo "</tr></tr>";
			echo ("<td>Valor: R$ " .$verificacao['valorTotal'] . "</td>");
			echo "</tr></tr>";
			echo ("<td>CPF Usuario: " .$verificacao['cpfUser'] . "</td>");
			echo "</tr></tr>";
			echo ("<td>CEP entrega: " .$verificacao['cep'] . "</td>");   
			echo "</tr></tr>";
			echo ("<td>Id Produto: " .$verificacao['idProd'] . "</td>");   
			echo "</tr></tr>";
			echo "<td><a href='excluirpedido.php?idpedido=" .$verificacao['idPedido'] . "'>Apagar</a></td>";
			echo "</tr></table></div>";
	}
}else{
	echo "<h3>Não há pedido</h3>";
}
    ?>
</div>
</body>
</html>