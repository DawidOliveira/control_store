<?php
	session_start();
	if(!isset($_SESSION['logado']) or !$_SESSION['logado']){
		header('Location: index');
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

	<title>Funcionários</title>
</head>

<body>

	<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
		<header class="bmd-layout-header">
			<div class="navbar navbar-light bg-primary">
				<button class="navbar-toggler btn btn-outline-white d-flex" type="button" data-toggle="drawer" data-target="#dw-s2">
					<span class="sr-only">Toggle drawer</span>
					<i class="material-icons text-white">menu</i>
				</button>
				<ul class="nav navbar-nav">
					<li class="nav-item text-white">Funcionários</li>
				</ul>
			</div>
		</header>
		<div id="dw-s2" class="bmd-layout-drawer bg-faded">
			<header class="drawer-header bg-primary">
				<div class="container">
					<div class="row">
						<div class="col-sm d-flex align-items-sm-center">
							<img src="../assets/account.png" class="img-fluid" alt="Usuário">
						</div>
						<div class="col-lg">
							<a href="#" class="h5 font-weight-bold text-white"><?php echo $_SESSION['dados']['nome'] ?></a>
							<p class=" font-weight-light text-light">
								<?php echo $_SESSION['dados']['cargo'] ?>
							</p>
							<a href="?func=logout" class="small text-white">Sair</a>
							<?php
								if(isset($_GET['func']) and $_GET['func']='logout'){
									require('../controllers/userController.php');
									$uc = new UserController();
									$uc->logout();
								}
							?>
						</div>
					</div>
				</div>
			</header>
			<ul class="list-group pt-0">
				<li class="list-group-item">
					<a href="vendas">Vendas</a>
				</li>
				<li class="list-group-item">
					<a href="verEstoque">Estoque</a>
				</li>
				<li class="active list-group-item">
					<a href="verFuncionario" class="text-white">Funcionários</a>
				</li>
			</ul>
		</div>
		<main class="bmd-layout-content">
			<div class="container">
				<div class="card mt-3">
					<div class="card-body">
						<div class="card-title">
							<div class="row">
								<div class="col-9 display-4">
									Lista de funcionários
								</div>
								<div class="col text-left font-weight-light">
									<a type="button" class="btn btn-raised btn-primary" href="cadFuncionario">
										Cadastrar novo funcionário
									</a>
								</div>
							</div>
						</div>
						<div class="card-subtitle text-muted mb-4">Visualize e altere informações do usuário do sistema</div>
						<div class="card-body gradiente">
							<div class="row mt-3">
								<div class="col-1">
									<img src="../assets/user.png" alt="funcionario" width="64" height="64">
								</div>
								<div class="col">
									<div class="card">
										<div class="card-title h5 font-weight-bold mx-2 my-2">
											Nome do funcionário
										</div>
										<div class="card-body mr-3">
											<div class="row">
												<div class="col">
													<span class="font-weight-bold">Cargo</span>
													<p class="font-weight-light">cargo do funcionário aqui</p>
												</div>
												<div class="col">
													<span class="font-weight-bold">Salário</span>
													<p class="font-weight-light">salário do funcionário aqui</p>
												</div>
												<div class="col">
													<span class="font-weight-bold">CPF</span>
													<p class="font-weight-light">CPF do funcionário aqui</p>
												</div>
											</div>
											<div class="row">
												<div class="col-11">
													<span class="font-weight-bold">Data de contratação</span>
													<p class="font-weight-light">Contratado em: dd/mm/yyyy</p>
												</div>
												<div class="col-1">
													<div class="row">
														<div class="col">
															<button type="button" class="btn btn-outline btn-primary" data-target="#deleteProduto" aria-expanded="false" aria-controls="deleteProduto" data-toggle="collapse"><i class="material-icons">
																	delete
																</i></button>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<button type="button" class="btn btn-outline btn-primary" data-target="#editProduto" aria-expanded="false" aria-controls="editProduto" data-toggle="collapse"><i class="material-icons">
																	edit
																</i></button>
														</div>
													</div>
												</div>
											</div>
											<form action="#" method="post">
												<div class="row mt-3">
													<div class="col">
														<div class="collapse" id="deleteProduto">
															<div class="card card-body">
																<span class="text-warning font-weight-bold">
																	Digite sua senha para confirmar a exclusão do funcionário
																</span>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/lock.png" alt="lock" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Senha" aria-label="Senha" name="password" aria-describedby="basic-addon1">
																		</div>
																	</div>
																	<div class="col-auto">
																		<button type="submit" name="enviarSenha" class="btn btn-raised btn-primary" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" data-toggle="snackbar" data-style="toast" data-content="A exclusão do produto foi realizada">
																			Confirmar
																		</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
											<form action="#" method="post">
												<div class="row">
													<div class="col">
														<div class="collapse" id="editProduto">
															<div class="card card-body">
																<span class="font-weight-bold">
																	Editar informações do funcionário
																</span>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/user.png" alt="edit" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="CPF" readonly aria-label="CPF" name="cpf" aria-describedby="basic-addon1">
																		</div>
																	</div>
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/edit.png" alt="edit" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Nome" aria-label="Nome" name="name" aria-describedby="basic-addon1">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/price.png" alt="salary" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Salário" aria-label="Salário" name="salary" aria-describedby="basic-addon1">
																		</div>
																	</div>
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/wheel.png" alt="user" width="32px" height="32px"></div>
																			<select class="form-control" name="cargo">
																				<div class="my-4">
																					<option class="form-control">Cargo do funcionário</option>
																					<option class="form-control" value="func">Funcionário</option>
																					<option class="form-control" value="manager">Gerente</option>
																				</div>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/lock.png" alt="password" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Senha" aria-label="Senha" name="password" aria-describedby="basic-addon1">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<button type="submit" name="editarInfo" class="btn btn-raised btn-primary btn-lg btn-block">
																			Confirmar
																		</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

</body>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="https://cdn.rawgit.com/FezVrasta/snackbarjs/1.1.0/dist/snackbar.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/bootstrap-material-design.min.js"></script>

<script>
	$(document).ready(function() {
		$('body').bootstrapMaterialDesign();
	});
</script>

</html>