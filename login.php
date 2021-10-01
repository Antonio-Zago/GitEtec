	<!DOCTYPE html>
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



		<div id="loginn">
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
								<li class="loginn"><a href="">Login</a></li>
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
						<form method="POST" action="valida.php" class="w-50 container" id="login">
						  <div class="form-group">
						    <label for="Email">Email:</label>
						    <input type="email" name="email"class="form-control" id="Email">
						  </div>
						  <div class="form-group">
						    <label for="Senha">Senha:</label>
						    <input name="senha"type="password" class="form-control" id="Senha">
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
						  		if (isset($_SESSION['usuario_existe'])) {
						  			echo $_SESSION['usuario_existe'];
						  			unset($_SESSION['usuario_existe']);
						  		}

						  		if (isset($_SESSION['msg'])) {
						  			echo $_SESSION['msg'];
						  			unset($_SESSION['msg']);
						  		}
						  	?>
						  </p>
						  <button type="submit" class="btn btn-primary">Enviar</button>
						</form>
						

						
							
						
					</div>

				</div>

		</div>




	</body>
</html>