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
        
        function todosDados(){
            try{
                $dados = $this->produtomodel->todosDados();
                
                return $dados;
            }catch(Exception $e){
                echo("<script>alert('Erro ao inserir dados no banco!')</script>");
            }

        }
		
		function deletarProduto($cod){			
			if($this->produtomodel->verificarProduto($cod)){
				$this->produtomodel->deletarProduto($cod);
				echo("<script>alert('Produto deletado com sucesso!')</script>");
			}else{
				echo("<script>alert('O produto não foi encontrado!')</script>");
			}
		}
		
		function editarProduto($cod,$nome,$valor,$quantidade,$descricao){
			if($this->produtomodel->verificarProduto($cod)){
				$this->produtomodel->editarProduto($cod,$nome,$valor,$quantidade,$descricao);
				echo("<script>alert('Produto alterado com sucesso!')</script>");
			}else{
				echo("<script>alert('Código do produto não existe!')</script>");
				
			}
		}
		
    }
?>