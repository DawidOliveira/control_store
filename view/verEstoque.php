<?php
	session_start();
	if(!isset($_SESSION['logado']) or !$_SESSION['logado']){
		header('Location: index');
	}
?>
<?php
	require("../controllers/productController.php");
	$pc = new ProductController();
	$dados = $pc->todosDados();
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Material Design for Bootstrap fonts and icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

	<link rel="shortcut icon" href="../assets/list.png" type="image/x-icon">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">

	<title>Estoque</title>
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
					<li class="nav-item text-white">Estoque</li>
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
				<li class=" active list-group-item">
					<a href="verEstoque" class="text-white">Estoque</a>
				</li>
				<li class="list-group-item">
					<a href="verFuncionario">Funcionários</a>
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
									Estoque
								</div>
								<div class="col text-left font-weight-light">
									<a type="button" class="btn btn-raised btn-primary" href="cadProduto">
										Cadastrar novo produto
									</a>
								</div>
							</div>
						</div>
						<div class="card-subtitle text-muted mb-4">Visualize e altere o estoque do sistema</div>
						<?php
							foreach($dados as $product){
						?>
						<div class="card-body gradiente">
							<div class="row mt-3">
								<div class="col-1">
									<img src="../assets/list.png" alt="produto" width="64" height="64">
								</div>
								<div class="col">
									<div class="card">
										<div class="card-title h5 font-weight-bold mx-2 my-2">
											<?php echo $product[1]; ?>
										</div>
										<div class="card-body mr-3">
											<div class="row">
												<div class="col">
													<span class="font-weight-bold">Valor</span>
													<p class="font-weight-light"><?php echo $product[2]; ?></p>
												</div>
												<div class="col">
													<span class="font-weight-bold">Quantidade no estoque</span>
													<p class="font-weight-light"><?php echo $product[3]; ?></p>
												</div>
												<div class="col">
													<span class="font-weight-bold">Código</span>
													<p class="font-weight-light"><?php echo $product[0]; ?></p>
												</div>
											</div>
											<div class="row">
												<div class="col-11" style="height: 100%">
													<div class="card bg-primary">
														<div class="card-title font-weight-bold mx-2 my-2 text-left text-white">
															Descrição do produto
														</div>
														<div class="card-body text-light">
															<?php echo $product[4]; ?>
														</div>
													</div>
												</div>
												<div class="col-1">
													<div class="row">
														<div class="col">
															<button type="button" class="btn btn-outline btn-primary" data-target="#deleteProduto<?php echo $product[0]; ?>" aria-expanded="false" aria-controls="deleteProduto" data-toggle="collapse"><i class="material-icons">
																	delete
																</i></button>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<button type="button" class="btn btn-outline btn-primary" data-target="#editProduto<?php echo $product[0]; ?>" aria-expanded="false" aria-controls="editProduto" data-toggle="collapse"><i class="material-icons">
																	edit
																</i></button>
														</div>
													</div>
												</div>
											</div>
											<form action="#" method="post">
												<div class="row mt-3">
													<div class="col">
														<div class="collapse" id="deleteProduto<?php echo $product[0]; ?>">
															<div class="card card-body">
																<span class="text-warning font-weight-bold">
																	Digite sua senha para confirmar a exclusão do produto
																</span>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/lock.png" alt="lock" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" readonly value="<?php echo $product[0]; ?>" aria-label="Senha" name="codDelete" aria-describedby="basic-addon1">
																		</div>
																	</div>
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/lock.png" alt="lock" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Senha" aria-label="Senha" name="password<?php echo $product[0]; ?>" aria-describedby="basic-addon1">
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
														<div class="collapse" id="editProduto<?php echo $product[0]; ?>">
															<div class="card card-body">
																<span class="font-weight-bold">
																	Editar informações do produto
																</span>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/edit.png" alt="edit" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Nome" aria-label="Nome" name="name<?php echo $product[0]; ?>"
																			value="<?php echo $product[1]; ?>"
																			aria-describedby="basic-addon1">
																		</div>
																	</div>
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/price.png" alt="price" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Valor" aria-label="Valor" name="price<?php echo $product[0]; ?>" value="<?php echo $product[2]; ?>" aria-describedby="basic-addon1">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/more.png" alt="quantity" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Quantidade" aria-label="Quantidade" name="quantity<?php echo $product[0]; ?>" value="<?php echo $product[3]; ?>"aria-describedby="basic-addon1">
																		</div>
																	</div>
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/lock.png" alt="password" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Senha" aria-label="Senha" name="password<?php echo $product[0]; ?>" aria-describedby="basic-addon1">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-6">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/more.png" alt="Description" width="32px" height="32px"></div>
																				<textarea type="text" class="form-control" placeholder="Descrição" aria-label="Descricao" name="desc<?php echo $product[0]; ?>" aria-describedby="basic-addon1"><?php echo $product[4]; ?></textarea>
																		</div>
																	</div>
																</div>
																
																<div class="row">
																	<div class="col">
																		<button type="submit" name="editarInfo" class="btn btn-raised btn-primary btn-lg btn-block" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" data-toggle="snackbar" data-style="toast" data-content="A alteração do produto foi realizada">
																			Confirmar
																		</button>
																	</div>
																</div>
																<?php
																	// adaptar função para confirmar senha
																	if(isset($_POST['editarInfo'])){
																		$pc->editarProduto($product[0],(string)$_POST['name'.$product[0]],(string)$_POST['price'.$product[0]],$_POST['quantity'.$product[0]],(string)$_POST['desc'.$product[0]]);
																		echo "<script>location.href='verEstoque';</script>";
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
						<?php
							// adaptar função para confirmar senha
								if(isset($_POST['enviarSenha'])){
									$d = $_POST['codDelete'];
									$pc->deletarProduto($d);
									echo "<script>location.href='verEstoque';</script>";
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