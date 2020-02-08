<?php
    include('../models/userModel.php');
    $user = new UserModel();

    include('../models/productModel.php');
    $product = new ProductModel();

    include('../controllers/userController.php');
    $userteste = new userController();
    // $user->signUp("222.222.222-22","d","123","100","12.123-11","funcionario");
    // $product->cadastrarProduto('gel','10',20,'refrescante');
    $userteste->signUp("444.444.44-44","maria","13123","100","12.123-11","gerente");
?>