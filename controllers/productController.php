<?php

    include_once('../model/productModel.php');
    
    class ProductController{

        private $produtomodel;

        function __construct(){
            $this->produtomodel = new ProductModel();
            //$nome = $_POST["nomeCampo"];
            //$valor = $_POST["valorCampo"];
            //$quantidade = $_POST["quantidadeCampo"];
            //$descricao = $_POST["descricaoCampo"];
        }
        

        function cadastrarProduto($nome, $valor, $quantidade, $descricao){
            if($this->produtomodel->cadastrarProduto($nome, $valor, $quantidade, $descricao)){
                return true;
            } else {
                return false;
            }
        }

        function dadosProduto($cod){
            if($this->produtomodel->verificarProduto($cod)){
                $output = $this->produtomodel->dadosProduto($cod);
                return $output;
            }
            return null;
        }
    }
?>