<?php
    include_once('../model/saleModel.php');
    include_once('../model/userModel.php');

    class SaleController {

        private $sale;
        private $produtct;
        private $user;

        function __construct(){
            $this->sale = new SaleModel();
            $this->user = new UserModel();
            $this->product = new ProductModel();
        }

        function cadastrarVenda($cod_produtoFK,$cpf_funcionarioFK,$quantidade){
            if($this->user->funcExiste($cpf_funcionarioFK) && $this->product->verificarProduto($cod_produtoFK)){
                $qtd = $this->product->dadosProduto($cod_produtoFK);

                if($quantidade > 0){                
                    if($qtd['quantidade'] >= $quantidade){
                        $qtdTotal = $qtd['valor']*$quantidade;
                        echo("<script>var opc = alert('Valor total da venda: R$ $qtdTotal!')</script>");
                        $this->sale->cadastrarVenda($cod_produtoFK, $cpf_funcionarioFK, $quantidade);
                        echo("<script>alert('Venda bem sucedida!')</script>");
                    } else {
                        echo("<script>alert('Produto/Quantidade indisponível!')</script>");
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