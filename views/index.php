<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Material Design for Bootstrap fonts and icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-material-design.min.css">

  <title>Hello, world!</title>
</head>

<body>

    <div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
      <header class="bmd-layout-header">
        <div class="navbar navbar-light bg-faded">
          <button class="navbar-toggler" type="button" data-toggle="drawer" data-target="#dw-s2">
            <span class="sr-only">Toggle drawer</span>
            <i class="material-icons">menu</i>
          </button>
          <ul class="nav navbar-nav">
            <li class="nav-item">Title</li>
          </ul>
        </div>
      </header>
      <div id="dw-s2" class="bmd-layout-drawer bg-faded bg-primary">
        <header>
          <a class="navbar-brand">Title</a>
        </header>
        <ul class="list-group">
          <a class="list-group-item">Link 1</a>
          <a class="list-group-item">Link 2</a>
          <a class="list-group-item">Link 3</a>
        </ul>
      </div>
      <main class="bmd-layout-content">
        <div class="container">
          <p>Main content</p>
        </div>
      </main>
    </div>

</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap-material-design.min.js"></script>

<script>$(document).ready(function() { 
  $('body').bootstrapMaterialDesign();
});
</script>

</html>