<?php
	session_start();
	if(isset($_SESSION['logado']) and $_SESSION['logado']){
		header('Location: verEstoque');
	}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Material Design for Bootstrap fonts and icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

	<link rel="shortcut icon" href="../assets/user.png" type="image/x-icon">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">

	<title>Fazer login</title>
</head>

<body class="gradiente">
      <div class="container">
				<div class="card d-flex align-items-center vertical">
					<div class="card-body">
						<div class="card-title display-4">
							Fazer login
						</div>
						<div class="card-subtitle text-muted mb-4">Faça seu login para acessar o sistema</div>
						<div class="card-body">
							<form action="#" method="POST">
								<div class="row">
									<div class="col">
										<div class="input-group mb-3">
											<div class="input-group-prepend mx-4 my-2 ">
												<img src="../assets/user.png" alt="user" width="32px" height="32px"> </div>
											<input type="text" class="form-control"  placeholder="CPF" aria-label="CPF" name="cpf" aria-describedby="basic-addon1" maxlength="11" required/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="input-group mb-3">
											<div class="input-group-prepend mx-4 my-2 ">
												<img src="../assets/lock.png" alt="user" width="32px" height="32px"> </div>
											<input type="password" class="form-control" placeholder="Senha" aria-label="Senha" name="password" aria-describedby="basic-addon1" required/>
										</div>
									</div>
								<button name="login" type="submit" class="btn btn-raised btn-primary btn-lg btn-block">login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
</body>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/bootstrap-material-design.min.js"></script>

<script>
	$(document).ready(function() {
		$('body').bootstrapMaterialDesign();
	});
</script>

</html>

<?php
	require('../controllers/userController.php');
	$userController = new UserController();
	if(isset($_POST['login'])){
		$userController->signIn((string)$_POST['cpf'],(string)$_POST['password']);
		header('Location: verEstoque');
	}
?>