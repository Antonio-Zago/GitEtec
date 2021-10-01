<?php
session_start();
include("conexao.php");
date_default_timezone_set('America/Argentina/Buenos_Aires');

$pergunta = $_POST['pergunta'];
$tema = $_POST['opcao'];
$rm = $_SESSION['rm'];
$data = date("d/m/y");
$tempo = date("H:i");

if(empty($pergunta) || empty($tema)){
	$_SESSION['falta-info2'] = "Campos não preenchidos!!!";
	header('Location: index.php');
	exit;
}





$sql = "INSERT INTO pergunta (descricao_pergunta,rm_aluno,tema_pergunta,data_pergunta,tempo_pergunta ) VALUES ('$pergunta','$rm','$tema','$data','$tempo')";

$resultado = mysqli_query($conn,$sql);

if ($resultado) {
	$_SESSION['msg2'] = "Pergunta cadastrada";
	header('Location: index.php');
	exit;
}else{

}



?>