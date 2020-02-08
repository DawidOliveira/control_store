<?php
    
    class ProductModel {

        private $db,$conn;
        
        function __construct(){
            require_once('../connection/connection.php');
            $this->db = new ConexaoDB();
            $this->conn = $this->db->mysqli;
        }

        function cadastrarProduto($nome,$valor,$quantidade,$descricao){

            try{

                $query = $this->conn->query("INSERT into produtos (nome,valor,quantidade,descricao) values ('$nome','$valor',$quantidade,'$descricao');");

                return true;

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

                return false;

            }

            return true;

        }


    }

?>