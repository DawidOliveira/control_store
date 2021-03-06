<?php
	session_start();
	if(!isset($_SESSION['logado']) or !$_SESSION['logado']){
		header('Location: index');
	}
?>
<?php
	require("../controllers/userController.php");
	$uc = new UserController();
	$dados = $uc->todosFuncionarios();
	$i=0;
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
			<?php require('header.php');?>
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
								<?php if($_SESSION["dados"]["cargo"]=="Gerente"){ ?>
								<div class="col text-left font-weight-light">
									<a type="button" class="btn btn-raised btn-primary" href="cadFuncionario">
										Cadastrar novo funcionário
									</a>
								</div>
								<?php } ?>
							</div>
						</div>
						<div class="card-subtitle text-muted mb-4">Visualize<?php if($_SESSION["dados"]["cargo"]=="Gerente"){ ?> e altere <?php } ?> informações dos funcionários no sistema</div>
						<div class="gradiente">
							<?php $count = 0; foreach ($dados as $funcionario) { $i++;?>
								<div class="card-body">
									<div class="row mt-3">
										<div class="col-1">
											<img src="../assets/user.png" alt="funcionario" width="64" height="64">
										</div>
										<div class="col">
											<div class="card">
												<div class="card-title h5 font-weight-bold mx-2 my-2">
													<?php echo $funcionario[1]; ?>
												</div>
												<div class="card-body mr-3">
													<div class="row">
														<div class="col">
															<span class="font-weight-bold">Cargo</span>
															<p class="font-weight-light"><?php echo $funcionario[5]; ?></p>
														</div>
														<div class="col">
															<span class="font-weight-bold">Salário</span>
															<p class="font-weight-light"><?php echo $funcionario[3]; ?></p>
														</div>
														<div class="col">
															<span class="font-weight-bold">CPF</span>
															<p class="font-weight-light"><?php echo $funcionario[0]; ?></p>
														</div>
													</div>
													<div class="row">
														<div class="col-11">
															<span class="font-weight-bold">Data de contratação</span>
															<p class="font-weight-light">Contratado em: <?php echo $funcionario[6]; ?></p>
														</div>
														<?php if($_SESSION["dados"]["cargo"]=="Gerente"){ ?>
														<div class="col-1">
															<div class="row">
																<div class="col">
																	<button type="button" class="btn btn-outline btn-primary" data-target="#deleteProduto<?php echo $i; ?>" aria-expanded="false" aria-controls="deleteProduto" data-toggle="collapse"><i class="material-icons">
																			delete
																		</i></button>
																</div>
															</div>
															<div class="row">
																<div class="col">
																	<button type="button" class="btn btn-outline btn-primary" data-target="#editProduto<?php echo $i; ?>" aria-expanded="false" aria-controls="editProduto" data-toggle="collapse"><i class="material-icons">
																			edit
																		</i></button>
																</div>
															</div>
														</div>
														<?php } ?>
													</div>
													<form action="#" method="post">
														<div class="row mt-3">
															<div class="col">
																<div class="collapse" id="deleteProduto<?php echo $i; ?>">
																	<div class="card card-body">
																		<span class="text-warning font-weight-bold">
																			Digite sua senha para confirmar a exclusão do funcionário
																		</span>
																		<div class="row">
																			<div class="col">
																				<div class="input-group mb-3">
																					<div class="input-group-prepend mx-4 my-2 ">
																						<img src="../assets/lock.png" alt="lock" width="32px" height="32px"> </div>
																					<input type="text" class="form-control" placeholder="CPF" readonly value="<?php echo $funcionario[0]; ?>" aria-label="cpf" name="cpfDelete" aria-describedby="basic-addon1">
																				</div>
																			</div>
																			<div class="col">
																				<div class="input-group mb-3">
																					<div class="input-group-prepend mx-4 my-2 ">
																						<img src="../assets/lock.png" alt="lock" width="32px" height="32px"> </div>
																					<input type="password" class="form-control" placeholder="Senha" aria-label="Senha" name="password" aria-describedby="basic-addon1">
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
																<div class="collapse" id="editProduto<?php echo $i; ?>">
																	<div class="card card-body">
																		<span class="font-weight-bold">
																			Editar informações do funcionário
																		</span>
																		<div class="row">
																			<div class="col">
																				<div class="input-group mb-3">
																					<div class="input-group-prepend mx-4 my-2 ">
																						<img src="../assets/user.png" alt="edit" width="32px" height="32px"> </div>
																					<input type="text" class="form-control" placeholder="CPF" value="<?php echo $funcionario[0]; ?>" readonly aria-label="CPF" name="cpf" aria-describedby="basic-addon1">
																				</div>
																			</div>
																			<div class="col">
																				<div class="input-group mb-3">
																					<div class="input-group-prepend mx-4 my-2 ">
																						<img src="../assets/edit.png" alt="edit" width="32px" height="32px"> </div>
																					<input type="text" class="form-control" placeholder="Nome" value="<?php echo $funcionario[1]; ?>" aria-label="Nome" name="name" aria-describedby="basic-addon1">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col">
																				<div class="input-group mb-3">
																					<div class="input-group-prepend mx-4 my-2 ">
																						<img src="../assets/price.png" alt="salary" width="32px" height="32px"> </div>
																					<input type="number" class="form-control" placeholder="Salário" pattern="[0-9]*" title="Digite apenas números" value="<?php echo $funcionario[3]; ?>" aria-label="Salário" name="salary" aria-describedby="basic-addon1">
																				</div>
																			</div>
																			<div class="col">
																				<div class="input-group mb-3">
																					<div class="input-group-prepend mx-4 my-2 ">
																						<img src="../assets/wheel.png" alt="user" width="32px" height="32px"></div>
																					<select class="form-control" required name="cargo">
																						<div class="my-4">
																							<option class="form-control">Selecione um cargo</option>
																							<option class="form-control" value="Funcionário" <?php if($funcionario[5]=="Funcionário"){ ?>selected<?php } ?> >Funcionário</option>
																							<option class="form-control" value="Gerente" <?php if($funcionario[5]=="Gerente"){ ?>selected<?php } ?>>Gerente</option>
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
																					<input type="password" class="form-control" placeholder="Senha" aria-label="Senha" name="password" aria-describedby="basic-addon1">
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
																		<?php
																			if(isset($_POST['editarInfo'])){
																				if($_SESSION['dados']['senha'] == md5($_POST['password'])){
																					$uc->editarFuncionario((string)$_POST['cpf'],(string)$_POST['name'],(string)$_POST['salary'],(string)$funcionario[4],(string)$_POST['cargo']);
																					echo "<script>location.href='verFuncionario';</script>";
																				}
																				else{
																					if($count == 0){
																						echo "<script>window.alert('Digite uma senha válida');</script>";
																						$count++;
																					}
																				}
																			}
																		?>
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
							<?php } ?>
						</div>
						<?php
							if(isset($_POST['enviarSenha'])){
								if($_SESSION['dados']['senha'] == md5($_POST['password'])){
									$uc->deletarFuncionario((string)$_POST['cpfDelete']);
									echo "<script>location.href='verFuncionario';</script>";
								}
								else{
									if($count == 0){
										echo "<script>window.alert('Digite uma senha válida');</script>";
										$count++;
									}
								}
							}
						?>
						
					</div>
				</div>
			</div>
		</main>
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