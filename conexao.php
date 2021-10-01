<?php
	$host='localhost';
	$usuario='root';
	$senha='';
	$bd='gitetec';
	$conn = mysqli_connect($host,$usuario,$senha,$bd);

	$mysqli= new mysqli($host,$usuario,$senha,$bd);

	if($mysqli->connect_errno){
		echo "Falha na conexão: ("+$mysqli->connect_errno;+")"+$mysqli->connect_error;
	}
?>