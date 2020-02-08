<?php
    
    class SaleModel {

        private $db,$conn;
        
        function __construct(){
            require_once('../connection/connection.php');
            $this->db = new ConexaoDB();
            $this->conn = $this->db->mysqli;
        }

        function cadastrarVenda($cod_produtoFK,$cpf_funcionarioFK,$quantidade){

            try{

                $prod = $this->conn->query("SELECT valor,quantidade from produtos where cod = $cod_produtoFK;");

                $valor_total = $quantidade * $prod->fetch_array()["valor"];
                
                $query = $this->conn->query("INSERT into venda (cod_produtoFK,cpf_funcionarioFK,quantidade,valor_total) values ($cod_produtoFK,'$cpf_funcionarioFK',$quantidade,'$valor_total');");
                
                $nova_quantidade = $prod->fetch_array()["quantidade"] - $quantidade;

                $atualizarProd = $this->conn->query("UPDATE produtos SET quantidade = $nova_quantidade WHERE cod = $cod_produtoFK;");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

            return false;

        }


    }

?>