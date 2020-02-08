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
							<a href="#" class="h5 font-weight-bold text-white">Usuário</a>
							<p class=" font-weight-light text-light">
								Gerente
							</p>
							<a href="#" class="small text-white">Sair</a>
						</div>
					</div>
				</div>
			</header>
			<ul class="list-group pt-0">
				<li class="list-group-item">
					<a href="index">Home</a>
				</li>
				<li class=" list-group-item">
					Vendas
				</li>
				<li class=" active list-group-item">
					<a href="verEstoque" class="text-white">Estoque</a>
				</li>
				<li class="list-group-item">
					Funcionários
				</li>
			</ul>
		</div>
		<main class="bmd-layout-content">
			<div class="container">
				<div class="card mt-3">
					<div class="card-body">
						<div class="card-title display-4">
							Estoque
						</div>
						<div class="card-subtitle text-muted mb-4">Visualize e altere o estoque do sistema</div>
						<div class="card-body">
							<div class="row mt-3">
								<div class="col-1">
									<img src="../assets/bank.png" alt="produto" width="64" height="64">
								</div>
								<div class="col">
									<div class="card">
										<div class="card-title h5 font-weight-bold mx-2 my-2">
											Nome do produto
										</div>
										<div class="card-body mr-3">
											<div class="row">
												<div class="col">
													<span class="font-weight-bold">Valor</span>
													<p class="font-weight-light">valor do produto aqui</p>
												</div>
												<div class="col">
													<span class="font-weight-bold">Quantidade no estoque</span>
													<p class="font-weight-light">quantidade do produto aqui</p>
												</div>
												<div class="col">
													<span class="font-weight-bold">Código</span>
													<p class="font-weight-light">código do produto aqui</p>
												</div>
											</div>
											<div class="row">
												<div class="col-11" style="height: 100%">
													<div class="card bg-primary">
														<div class="card-title font-weight-bold mx-2 my-2 text-left text-white">
															Descrição do produto
														</div>
														<div class="card-body text-light">
															Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae corporis asperiores eos nemo dolores, eius veniam ipsam voluptatem nulla magni exercitationem possimus nam harum earum voluptatum velit cupiditate quos dignissimos!
														</div>
													</div>
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
																	Digite sua senha para confirmar a exclusão do produto
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
																		<button type="button" class="btn btn-raised btn-primary" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" data-toggle="snackbar" data-style="toast" data-content="A exclusão do produto foi realizada">
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
																	Editar informações do produto
																</span>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/edit.png" alt="edit" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Nome" aria-label="Nome" name="name" aria-describedby="basic-addon1">
																		</div>
																	</div>
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/price.png" alt="price" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Valor" aria-label="Valor" name="price" aria-describedby="basic-addon1">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col">
																		<div class="input-group mb-3">
																			<div class="input-group-prepend mx-4 my-2 ">
																				<img src="../assets/more.png" alt="quantity" width="32px" height="32px"> </div>
																			<input type="text" class="form-control" placeholder="Quantidade" aria-label="Quantidade" name="quantity" aria-describedby="basic-addon1">
																		</div>
																	</div>
																	<div class="col">
																		<button type="button" class="btn btn-raised btn-primary btn-lg btn-block" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" data-toggle="snackbar" data-style="toast" data-content="A alteração do produto foi realizada">
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