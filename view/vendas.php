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
			<?php require('header.php');?>
			<ul class="list-group pt-0">
				<li class="active list-group-item">
					<a href="vendas" class="text-white">Vendas</a>
				</li>
				<li class="list-group-item">
					<a href="verEstoque">Estoque</a>
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
									Vendas
								</div>
							</div>
						</div>
						<div class="card-subtitle text-muted mb-4">Realizar vendas no sistema</div>
						<div class="gradiente">
							<div class="card-body">
                                <form action="#" method="post">
									<div id="item">
										 <div class="row mt-3">   
											 <div class="col-1">   
												 <img src="../assets/list.png" alt="produto" width="64" height="64">   
											 </div>   
											 <div class="col">   
												 <div class="card">   
													 <div class="card-title h5 mx-2 my-2">   
														 <div class="input-group">   
															 <select class="form-control" name="produto">   
																 <div class="my-4">   
																	 <option class="form-control" value="Produto">Produto</option>   
																 </div>   
															 </select>   
														 </div>   
													 </div>   
													 <div class="card-body mr-3">   
														 <div class="row">   
															 <div class="col">   
																 <span class="font-weight-bold">Quantidade</span>   
																 <div class="input-group mb-3">   
																	 <input type="number" class="form-control" placeholder="Quantidade" title="Digite apenas números" aria-label="quantidade" name="quantity" aria-describedby="basic-addon1">   
																 </div>   
															 </div>   
															 <div class="col">   
																 <span class="font-weight-bold">Valor</span>   
																 <p class="font-weight-light">valor do produto</p>   
															 </div>   
														 </div>   
													 </div>   
												 </div>   
											 </div>   
										 </div> 
									</div>
									<div class="mt-4">
										<button type="submit" class="btn btn-raised btn-primary btn-lg btn-block" id="finalizarVenda">Finalizar Venda</button>
									</div>
								</form>
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
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/bootstrap-material-design.min.js"></script>

<script>
	$(document).ready(function() {
		$('body').bootstrapMaterialDesign();
	});
</script>

</html>