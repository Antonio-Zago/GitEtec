<?php
	session_start();
	unset($_SESSION['nome_aluno']);
	unset($_SESSION['sala']);
	header("Location: index.php");
?>