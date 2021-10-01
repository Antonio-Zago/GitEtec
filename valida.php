<?php

	session_start();
	include("conexao.php");
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$query = "select * from aluno where email_aluno like '$email' and senha_aluno like '$senha' LIMIT 1;";
	$busca = $mysqli->query($query) or die ($mysqli->error);
	$resultado = $busca->fetch_assoc();

	if (empty($email) || empty($senha)) {
		$_SESSION['login-erro'] = "Usuário ou senha inválido";
		header("Location: login.php");


	}else{
		if (($email == $resultado['email_aluno']) && ($senha == $resultado['senha_aluno'])) {
			$_SESSION['nome_aluno'] = $resultado['nome_aluno'];
			$_SESSION['sala'] = $resultado['turma_aluno'];
			$_SESSION['rm'] = $resultado['rm_aluno'];
			header("Location: index.php");
		}
		else{
			$_SESSION['login-erro'] = "Usuários ou senha inválido";
			header("Location: login.php");
		}
	}
?>