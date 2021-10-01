<!DOCTYPE html>
<?php 
	include("conexao.php");
	session_start();
	//Numero de itens da pagina

	$itens_por_pagina = 10;

	//pagina atual
	if(!isset($_GET['pagina'])){
		$pagina = 0;
	}else{
		$pagina = intval($_GET['pagina']);
	}
	$itens = $itens_por_pagina * $pagina;


	//Puxar nome do aluno, descricao da pergunta, turma do aluno e codigo para exibir as respostas do banco
	$sql_code = "select nome_aluno, descricao_pergunta, turma_aluno,cod_pergunta,tempo_pergunta,data_pergunta from aluno inner join pergunta on aluno.rm_aluno = pergunta.rm_aluno where tema_pergunta like 'html5' order by cod_pergunta desc;";
	$execute = $mysqli->query($sql_code) or die($mysqli->error);
	$produto = $execute->fetch_assoc();
	$num = $execute->num_rows;


	//Paginação
	$total_objetos = $mysqli->query("select nome_aluno, descricao_pergunta, turma_aluno,cod_pergunta from aluno inner join pergunta on aluno.rm_aluno = pergunta.rm_aluno where tema_pergunta like 'materias';")->num_rows;

	$num_paginas= ceil($total_objetos/$itens_por_pagina);


	//Selecionar as respostas para as perguntas
	$sql_code2 = "select cod_pergunta,cod_resposta,descricao_resposta,nome_aluno,turma_aluno,tempo_resposta,data_resposta from resposta inner join aluno on aluno.rm_aluno = resposta.rm_aluno order by cod_resposta desc;";
	$execute2 = $mysqli->query($sql_code2) or die($mysqli->error);
	$produto2 = $execute2->fetch_assoc();
	$num2 = $execute2->num_rows;
 	

?>
<html>
	<head>
		<title>GitETEC</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 	
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<script type="text/javascript">
			//Mostrar ou ocultar respostas
			function mostra(id){
				if (document.getElementById(id).style.display == 'none') {
					document.getElementById(id).style.display = 'block';
				}
				else{
					document.getElementById(id).style.display = 'none';
				}
			}
		</script>
	</head>
	<body>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   		 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



		<div id="index">
				<header>
					<div class="conteudo">
						<div id="logos">
							<div id="imagens-logos1">
								<h1>
									<img src="img/logo.png">
								</h1>
							</div>
							<div  id="imagens-logos2">
								<img src="img/etec.png">
								
							</div>
						</div>

						<nav id="navegacao-principal">
							
							<ul>
								<li class="index"><a href="index.html">Home</a></li>
								<li class="loginn"><a href="login.php">Login</a></li>
								<li class="cadastro"><a href="cadastro.php">Cadastro</a></li>
							</ul>

							<div id="nome">
								<h3><?php if(isset($_SESSION['nome_aluno'])){echo $_SESSION['nome_aluno']," / ", $_SESSION['sala'];}?></h3>
								<?php if(isset($_SESSION['nome_aluno'])){?>
									<form method="POST" action="sair.php">
										<button type="submit" class="btn btn-secondary btn-sm" >Sair</button>
									</form>
								<?php }?>
							</div>
						</nav>
					</div>
				</header>

				<div id="corpo">

					<div class="conteudo">
						<div id="navegacao-lateral">
							<h2>Fóruns</h2>
							<ul>
								<li class="html"><a href="#">Html</a></li>
								<li class="css"><a href="pagina-css.php">CSS</a></li>
							</ul>
						</div>

						<div id="conteudo-principal">
							<form method="POST" autocomplete="off" action="cadastrar-pergunt.php" id="pergunte">
								<div class="perguntar">
									<input type="text" autocomplete="off" name="pergunta" placeholder="Faça uma pergunta.">
								</div>
								<div class="titulo-tema">
									<label class="tema">Tema da pergunta:</label>
								</div>
								<select name="opcao">
									<option value="html5">Html</option>
									<option value="css2">Css</option>
								</select>
								<?php if(!empty($_SESSION['nome_aluno'])){?>
									<button type="submit" class="btn btn-secondary btn-sm" >Perguntar</button>
								<?php }else{?>
									<button type="submit" class="btn btn-secondary btn-sm" disabled>Perguntar</button>
								<?php }?>
							</form>

								<?php
						  		if (isset($_SESSION['falta-info2'])) {
						  			echo $_SESSION['falta-info2'];
						  			unset($_SESSION['falta-info2']);
						  		}

						  		if (isset($_SESSION['msg2'])) {
						  			echo $_SESSION['msg2'];
						  			unset($_SESSION['msg2']);
						  		}

						  		if (isset($_SESSION['msg3'])) {
											  			echo $_SESSION['msg3'];
											  			unset($_SESSION['msg3']);
											  		}
								if (isset($_SESSION['falta-info3'])) {
						  			echo $_SESSION['falta-info3'];
						  			unset($_SESSION['falta-info3']);
						  		}



						  	?>


							<?php 
								if($num>0){
									do{
							?>
								<div id="postagem">
									<div class="info">
										<h3><?php echo $produto['nome_aluno'];
										echo " ";
										echo $produto['turma_aluno'] ?></h3>
										<p><?php echo $produto['tempo_pergunta'];
										echo " do dia: 	";
										echo $produto['data_pergunta']; ?></p>
									</div>
									<div class="conteudo-info">
										<p>
											<?php echo $produto['descricao_pergunta'] ?>
										</p>
										<div>
											<div class="respostas">
												<?php 
													$cont =0;
													if($num>0){
														do{
															if ($produto['cod_pergunta']==$produto2['cod_pergunta']) {
																?>
																<div id="aluno-turma">
																	<h3><?php
																	echo $produto2['nome_aluno'];
																	echo " ";
																	echo $produto2['turma_aluno'];
																	?>
																	</h3>
																	<h6><?php echo $produto2['tempo_resposta'];
																	echo " do dia: ";
																	echo $produto2['data_resposta'] ?></h6>
																</div>
																<p><?php
																	echo $produto2['descricao_resposta'];
																	$cont++;
																?></p><?php
															}
														?>

														<?php
														}while($produto2 = $execute2->fetch_assoc());
														$execute2 = $mysqli->query($sql_code2) or die($mysqli->error);
														$produto2 = $execute2->fetch_assoc();

														}else{
															echo "n tem conteudo.";
														} 
														?>
											</div>

											<form id="responda" autocomplete="off" method="POST" action="cadastrar-resposta.php">
												<input type="text" name="resposta" autocomplete="off" class="form-control"  placeholder="Digite uma resposta">
												<input type="checkbox" name="checar" checked value="<?php echo $produto['cod_pergunta'];?>">
												<?php if(!empty($_SESSION['nome_aluno'])){?>
													<button type="submit" class="btn btn-secondary btn-sm" >Responder</button>
												<?php }else{?>
													<button type="submit" class="btn btn-secondary btn-sm" disabled>Responder</button>

												<?php }
													

												?>
											</form>
										</div>
									</div>
									<div>
										
									</div>
								</div>
							<?php
									}while($produto = $execute->fetch_assoc());
									$execute = $mysqli->query($sql_code) or die($mysqli->error);
									$produto = $execute->fetch_assoc();

								}else{
									echo "n tem conteudo.";
								} 
							?>
						</div>

						<div class="clear">
							
						</div>
					</div>

				</div>

		</div>




	</body>
</html>