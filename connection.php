<?php
    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbnome = "blackandwhite";
	
    $mysqli = mysqli_connect($servidor, $usuario, $senha, $dbnome);
    $select =  mysqli_select_db($mysqli, $dbnome); 
?>