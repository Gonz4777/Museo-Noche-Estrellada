<?php 
	$servidorBD ="mysql:host=localhost;dbname=bdmuseo2022";
	$usuario ="root";
	$password="";

	try
	{
		$pdo = new PDO($servidorBD, $usuario, $password);

		$pdo->exec("SET CHARACTER SET utf8");

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(Exception $e)
	{
		die("ERROR en conexion al servidor ".$e->getMessage());
	}

?>