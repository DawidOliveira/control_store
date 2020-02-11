<?php
    include_once('../model/saleModel.php');
    include_once('../model/userModel.php');

    class SaleController {

        private $sale;
        private $produtct;
        private $user;

        function __construct(){
            $this->sale = new saleModel();
            $this->user = new userModel();
            $this->product = new productModel();
        }

        function cadastrarVenda($cod_produtoFK,$cpf_funcionarioFK,$quantidade){
            if($this->user->funcExiste($cpf_funcionarioFK) && $this->product->verificarProduto($cod_produtoFK)){
                $qtd = $this->product->dadosProduto($cod_produtoFK);

                if($quantidade > 0){                
                    if($qtd['quantidade'] >= $quantidade){
                        $this->sale->cadastrarVenda($cod_produtoFK, $cpf_funcionarioFK, $quantidade);
                        echo("<script>alert('Venda bem sucedida!')</script>");
                    } else {
                        echo("<script>alert('Produto fora de estoque!')</script>");
                    }
                } else {
                    echo("<script>alert('Quantidade inválida!')</script>");
                }
            } else {
                echo("<script>alert('Funcionário ou produto inexistentes!')</script>");
            } 
        }

        function deletarVenda($cod){
            if($this->sale->verificarVenda($cod)){
                if($this->sale->deletarVenda($cod)){
                    echo("<script>alert('Venda deletada com sucesso!')</script>");                    
                } 
            } else {
                echo("<script>alert('Código inexistente para venda!')</script>");
            }
        }
    }
?>

