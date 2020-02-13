<?php
    include('../model/userModel.php');
    $user = new UserModel();

    include('../model/productModel.php');
    $product = new ProductModel();

    include('../model/saleModel.php');
    $sale = new SaleModel();

    include('../controllers/userController.php');
    $userController = new UserController();

    // $user->signUp("222.222.222-22","d","123","123","100","12.123-11","funcionario");
    // $product->cadastrarProduto('gel','10',20,'refrescante');
    // $sale->cadastrarVenda(2,'111.111.111-11',5);
    // var_dump($user->signIn("222.222.222-22","123"));
    // $user->editarFuncionario("222.222.222-22","d","100","12.123-11","funcionario");
    // $user->deletarFuncionario("222.222.222-22");
    // var_dump($product->dadosProduto(1));
    // $product->editarProduto(1,'gel','10',20,'refrescante');
    // $product->deletarProduto(1);
    // $userController->signIn('222.222.222-22','123');
?>

































