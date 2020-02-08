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

	<title>Cadastrar funcionário</title>
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
					<li class="nav-item text-white">Cadastrar produtos</li>
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
					<a href="verFuncionario">Funcionários</a>
				</li>
			</ul>
		</div>
		<main class="bmd-layout-content">
			<div class="container">
				<div class="card mt-3">
					<div class="card-body">
						<div class="card-title display-4">
							Cadastrar produto
						</div>
						<div class="card-subtitle text-muted mb-4">Cadastre um novo produto no sistema</div>
						<div class="card-body">
							<form action="#" method="POST">
								<div class="row">
									<div class="col">
										<div class="input-group mb-3">
											<div class="input-group-prepend mx-4 my-2 ">
												<img src="../assets/edit.png" alt="edit" width="32px" height="32px">
											</div>
											<input type="text" class="form-control" placeholder="Nome" aria-label="Nome" value="" name="name" aria-describedby="basic-addon1">
										</div>
									</div>
									<div class="col">
										<div class="input-group mb-3">
											<div class="input-group-prepend mx-4 my-2 ">
												<img src="../assets/price.png" alt="user" width="32px" height="32px"> </div>
											<input type="text" class="form-control" placeholder="Preço" aria-label="price" name="price" aria-describedby="basic-addon1">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="input-group mb-3">
											<div class="input-group-prepend mx-4 my-2 ">
												<img src="../assets/more.png" alt="quantity" width="32px" height="32px"> </div>
											<input type="text" class="form-control" placeholder="Quantidade" aria-label="quantidade" name="quantity" aria-describedby="basic-addon1">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="input-group mb-3">
											<div class="input-group-prepend mx-4 my-2 ">
												<img src="../assets/list.png" alt="user" width="32px" height="32px"> </div>
											<textarea class="form-control" rows="4" placeholder="Descrição do produto" aria-label="description" name="description"></textarea>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-outline-primary btn-lg btn-block">Cadastrar produto</button>
							</form>
						</div>
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