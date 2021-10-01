<?php
session_start();
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];
$rm = $_POST['RM'];
$turma = $_POST['turma'];

if(empty($email) || empty($nome) || empty($senha) || empty("rm") || empty("turma")){
	$_SESSION['falta_info'] = "Campos não preenchidos!!!";
	header('Location: cadastro.php');
	exit;
}

if ($senha != $senha2) {
	$_SESSION['falta_info'] = "Senhas não coincidem!!!";
	header('Location: cadastro.php');
	exit;
}

$sql = "select count(*) as total from aluno where email_aluno = '$email'";
$result = $mysqli->query($sql) or die ($mysqli->error);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = "Email já cadastrado!!!";
	header('Location: login.php');
	exit;
}

$sql = "select count(*) as total from aluno where rm_aluno = '$rm'";
$result = $mysqli->query($sql) or die ($mysqli->error);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = "RM já cadastrado!!!";
	header('Location: login.php');
	exit;
}





$sql = "INSERT INTO aluno (nome_aluno,turma_aluno, email_aluno, senha_aluno, rm_aluno ) VALUES ('$nome', '$turma', '$email', '$senha', '$rm')";

$resultado = mysqli_query($conn,$sql);

if ($resultado) {
	$_SESSION['msg'] = "Usuario cadastrado com sucesso";
	header('Location: login.php');
	exit;
}else{

}



?>