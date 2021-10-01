<?php
session_start();
include("conexao.php");
date_default_timezone_set('America/Argentina/Buenos_Aires');

$resposta = $_POST['resposta'];
$rm = $_SESSION['rm'];
$cod_pergunta = $_POST['checar'];
$data = date("d/m/y");
$tempo = date("H:i");

if(empty($resposta)){
	$_SESSION['falta_info3'] = "Campos não preenchidos!!!";
	header('Location: pagina-css.php');
	exit;
}





$sql = "INSERT INTO resposta (cod_pergunta,descricao_resposta,rm_aluno,tempo_resposta,data_resposta ) VALUES ('$cod_pergunta','$resposta','$rm','$tempo','$data')";

$resultado = mysqli_query($conn,$sql);

if ($resultado) {
	$_SESSION['msg3'] = "Resposta cadastrada";
	header('Location: pagina-css.php');
	exit;
}else{

}



?>