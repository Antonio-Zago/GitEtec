
<?php 

	session_start();
?>
<html>
	<head>
		<title>GitETEC</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 	
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
	<body>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   		 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



		<div id="cadastro">
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
								<li class="index"><a href="index.php">Home</a></li>
								<li class="loginn"><a href="login.php">Login</a></li>
								<li class="cadastro"><a href="cadastro.php">Cadastro</a></li>
							</ul>

						</nav>
					</div>
				</header>

				<div id="corpo">

					<div class="conteudo">
						<div id="perfil">
							<img src="img/perfil.png">
						</div>
						<form method="POST" action="cadastrar.php" class="w-50 container" id="login">
						  <div class="form-group">
						    <label for="Email">Email:</label>
						    <input type="email" name="email"class="form-control" id="Email">
						  </div>
						  <div class="form-group">
						    <label for="Senha">Senha:</label>
						    <input name="senha"type="password" class="form-control" id="Senha">
						  </div>
						   <div class="form-group">
						    <label for="Senha2">Repita a Senha:</label>
						    <input name="senha2"type="password" class="form-control" id="Senha2">
						  </div>
						   <div class="form-group">
						    <label for="Nomeu">Nome:</label>
						    <input name="nome" class="form-control" id="Nomeu">
						  </div>
						   <div class="form-group">
						    <label for="exampleFormControlSelect1">Turma</label>
						    <select name="turma" class="form-control" id="exampleFormControlSelect1">
						      <option value="1ADS">1º DS</option>
						      <option value="2ADS">2º DS</option>
						      <option value="3ADS">3º DS</option>
						    </select>
						  </div>
						     <div class="form-group">
						    <label for="RM">RM:</label>
						    <input type="number" name="RM" class="form-control" id="RM">
						  </div>

						  <p class="text-center text-danger">
						  	<?php
						  		if (isset($_SESSION['login-erro'])) {
						  			echo $_SESSION['login-erro'];
						  			unset($_SESSION['login-erro']);
						  		}



						  	?>


						  </p>
						   <p class="text-center text-danger">
						  	<?php
						  		if (isset($_SESSION['falta_info'])) {
						  			echo $_SESSION['falta_info'];
						  			unset($_SESSION['falta_info']);
						  		}


						  	?>


						  </p>
						  <button type="submit" class="btn btn-primary">Enviar</button>
						</form>
						</div>	
					</div>

				</div>

		</div>
	</body>
</html>