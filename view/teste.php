<?php
    include('../model/userModel.php');
    $user = new UserModel();

    include('../model/productModel.php');
    $product = new ProductModel();

    include('../model/saleModel.php');
    $sale = new SaleModel();

    // $user->signUp("222.222.222-22","d","123","123","100","12.123-11","funcionario");
    // $product->cadastrarProduto('gel','10',20,'refrescante');
    // $sale->cadastrarVenda(1,'222.222.222-22',5);
    var_dump($user->signIn("222.222.222-22","123"));
?>