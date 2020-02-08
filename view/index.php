<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Material Design for Bootstrap fonts and icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
  <link rel="stylesheet" href="css/bootstrap-material-design.min.css">

  <title>Hello, world!</title>
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
          <li class="nav-item text-white">Cadastrar funcionários</li>
        </ul>
      </div>
    </header>
    <div id="dw-s2" class="bmd-layout-drawer bg-faded">
      <header class="drawer-header bg-primary">
        <div class="container">
          <div class="row">
            <div class="col-sm d-flex align-items-sm-center">
              <img src="assets/account.png" class="img-fluid" alt="Usuário">
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
      <ul class="list-group">
        <li class="active list-group-item">
          Vendas
        </li>
        <li class="list-group-item">
          Estoque
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
              Cadastrar funcionário
            </div>
            <div class="card-subtitle text-muted">Cadastre um novo funcionário no sistema</div>
          </div>
        </div>
      </div>
    </main>
  </div>

</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap-material-design.min.js"></script>

<script>
  $(document).ready(function() {
    $('body').bootstrapMaterialDesign();
  });
</script>

</html>