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
								<div class="col text-left font-weight-light">
									<button type="button" id="addProduto" class="btn btn-raised btn-primary" >
										Adicionar produto à venda
									</button>
								</div>
							</div>
						</div>
						<div class="card-subtitle text-muted mb-4">Realizar vendas no sistema</div>
						<div class="gradiente">
							<div class="card-body">
                                <div id="item">
                                </div>
							</div>
						</div>
						<?php
							// adaptar função para confirmar senha
								if(isset($_POST['enviarSenha'])){
									$d = $_POST['codDelete'];
									$pc->deletarProduto($d);
									echo "<script>location.href='verEstoque';</script>";
								}
						?>
						<?php
							if(isset($_POST['editarInfo'])){
								if($_SESSION['dados']['senha'] == md5($_POST['password'])){
									$pc->editarProduto($product[0],(string)$_POST['name'.$product[0]],(string)$_POST['price'.$product[0]],$_POST['quantity'.$product[0]],(string)$_POST['desc'.$product[0]]);
									echo "<script>location.href='verEstoque';</script>";
								}
								else{
									echo "<script>window.alert('Digite uma senha válida');</script>";
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
        $('#addProduto').click(function(){
            let content =           '<div class="row mt-3">'+
                                        '<div class="col-1">'+
                                            '<img src="../assets/list.png" alt="produto" width="64" height="64">'+
                                        '</div>'+
                                        '<div class="col">'+
                                            '<div class="card">'+
                                                '<div class="card-title h5 font-weight-bold mx-2 my-2">'+
                                                    'Nome do produto'+
                                                '</div>'+
                                                '<div class="card-body mr-3">'+
                                                    '<div class="row">'+
                                                        '<div class="col">'+
                                                            '<span class="font-weight-bold">Valor</span>'+
                                                            '<p class="font-weight-light">valor do produto</p>'+
                                                        '</div>'+
                                                        '<div class="col">'+
                                                            '<span class="font-weight-bold">Quantidade no estoque</span>'+
                                                            '<p class="font-weight-light">quantidade</p>'+
                                                        '</div>'+
                                                        '<div class="col">'+
                                                            '<span class="font-weight-bold">Código</span>'+
                                                            '<p class="font-weight-light">codigo</p>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'

            let lista = []
            lista.push(content)
        })
        for(let i=0; i<lista.length;i++){
            document.getElementById("item").innerHTML += content
        }
	});
</script>

</html>